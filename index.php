










<?php
session_start(); 

$emailError = "";
$passwordError = "";
$email = "";
$password = "";
   
include "./db_conn.php";

if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    }

    if (empty($emailError) && empty($passwordError)) {
        $sql = "SELECT * FROM admins WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();

            if (password_verify($password, $admin['password'])) {
                $_SESSION['email'] = $email;
                header("Location: dashboard.php");
                exit();
            } else {
                $passwordError = "Invalid email or password";
            }
        } else {
            $passwordError = "Invalid email or password";
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Login Page</title>
    <?php include "./comman_page/link.php"; ?>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-96">
        <div class="text-center mb-6">
            <img src="./assets/img/LC-logo1.png" alt="Chess Logo" class="w-24 mx-auto">
            <div class="flex justify-center items-end">
                <span class="text-indigo-800 font-bold text-5xl">L</span>
                <span class="text-white text-3xl">E</span>
                <span class="text-white text-3xl">A</span>
                <span class="text-white text-3xl">D</span>
                <span class="text-white text-3xl"></span>
                <span class="text-indigo-800 font-bold text-5xl">C</span>
                <span class="text-white text-3xl">H</span>
                <span class="text-white text-3xl">E</span>
                <span class="text-white text-3xl">S</span>
                <span class="text-white text-3xl">S</span>
            </div>
        </div>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300">E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="mt-1 block w-full px-3 py-2 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <?php if (!empty($emailError)): ?>
                    <span class="text-red-500 text-sm"><?php echo $emailError; ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <?php if (!empty($passwordError)): ?>
                    <span class="text-red-500 text-sm"><?php echo $passwordError; ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md font-medium">Login</button>
            <div class="mt-4 text-center">
                <a href="#" class="text-sm text-gray-400 hover:text-white">Forgot Password?</a>
                <a href="#" class="ml-4 text-sm text-gray-400 hover:text-white">Register</a>
            </div>
        </form>
    </div>
</body>
</html>
