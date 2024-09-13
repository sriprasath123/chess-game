<?php
include "./db_conn.php"; // Database connection

// Check if the referral code is provided
$referral_code = isset($_GET['code']) ? $_GET['code'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get email from the form
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    if ($email && $referral_code) {
        // Prepare and execute SQL query to insert data into installations table
        $sql = "INSERT INTO installations (email, referral_code) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $referral_code);

        if ($stmt->execute()) {
            // Redirect to Play Store or any other desired location
            header("Location: https://play.google.com/store/apps/details?id=com.lead_chess"); // Replace with your actual Play Store link
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please provide both email and referral code.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Entry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        /* Center the container within the viewport */
        .container {
            position: relative;
            z-index: 1;
        }

        .celebration {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
        }
    </style>
</head>

<body class="bg-gray-300 min-h-screen flex flex-col">

    <!-- Main Content Area -->
    <div class="h-full mt-8 mb-2 flex-grow flex flex-col justify-center items-center p-6 relative">
        <!-- Celebration Effect Container -->
        <div class="celebration"></div>

        <div class="container mx-auto text-center mb-4">
            <!-- Logo and Title -->
            <img src="./assets/img/lc-logo.png" alt="Chess Logo" class="w-32 h-auto mx-auto mb-4">
            <div class="flex justify-center items-end mb-4">
                <span class="text-indigo-800 font-bold text-5xl">L</span>
                <span class="text-gray-600 text-3xl">E</span>
                <span class="text-gray-600 text-3xl">A</span>
                <span class="text-gray-600 text-3xl">D</span>
                <span class="text-gray-600 text-3xl"> </span>
                <span class="text-indigo-800 font-bold text-5xl">C</span>
                <span class="text-gray-600 text-3xl">H</span>
                <span class="text-gray-600 text-3xl">E</span>
                <span class="text-gray-600 text-3xl">S</span>
                <span class="text-gray-600 text-3xl">S</span>
            </div>

            <!-- Header Section -->
            <header class="text-center mb-10">
                <h1 class="text-3xl font-bold text-gray-800">Enter Your Email to Complete Installation</h1>
                <p class="text-lg text-gray-600">Please enter your email to finish the setup and get redirected.</p>
                <p class="text-xl font-semibold text-gray-800 mt-4">Congratulations on reaching this step!</p>
            </header>
            <!-- Gift Box Image -->
            <div class="mt-8">
                <img src="./assets/img/gift-removebg-preview.png" alt="Gift Box" class="w-32 h-auto mx-auto">
            </div>
            <!-- Form Section -->
            <form id="email-form" action="" method="POST" class="space-y-6 mt-8">
                <!-- Email Input -->
                <input type="email" name="email" placeholder="Your Email" class="p-3 border border-gray-300 rounded-lg w-full max-w-md mx-auto focus:outline-none focus:ring-2 focus:ring-indigo-500" required>

                <!-- Hidden Referral Code Input -->
                <input type="hidden" name="referral_code" value="<?php echo htmlspecialchars($referral_code); ?>">
                <div class="">
                    <!-- Submit Button -->
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-200 ease-in-out">Installation</button>
                </div>
            </form>


        </div>
    </div>

    <!-- Confetti Effect Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                confetti({
                    particleCount: 200,
                    spread: 70,
                    origin: {
                        y: 0.6
                    }
                });
            }, 1000); 
        });
    </script>
</body>

</html>



































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Referral Link</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-300 min-h-screen flex flex-col">
    <div class="h-full mt-8 mb-2 flex-grow flex flex-col justify-center items-center p-6">
        <div class="container mx-auto text-center mb-4">
            <img src="./assets/img/lc-logo.png" alt="Chess Logo" class="w-32 h-auto mx-auto mb-4">
            <div class="flex justify-center items-end mb-4">
                <span class="text-indigo-800 font-bold text-5xl">L</span>
                <span class="text-gray-600 text-3xl">E</span>
                <span class="text-gray-600 text-3xl">A</span>
                <span class="text-gray-600 text-3xl">D</span>
                <span class="text-gray-600 text-3xl"> </span>
                <span class="text-indigo-800 font-bold text-5xl">C</span>
                <span class="text-gray-600 text-3xl">H</span>
                <span class="text-gray-600 text-3xl">E</span>
                <span class="text-gray-600 text-3xl">S</span>
                <span class="text-gray-600 text-3xl">S</span>
            </div>

            <header class="text-center mb-10">
                <h1 class="text-3xl font-bold text-gray-800">Generate Your Referral Link</h1>
                <p class="text-lg text-gray-600">Share this link to invite friends!</p>
            </header>

            <section class="text-center mt-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Generate Your Referral Link</h2>
                <button id="generate-referral-link" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-200 ease-in-out">Generate Referral Link</button>
                <p class="text-lg text-gray-600 mt-4">Your referral link: <a id="referral-link" href="#" class="text-blue-500 hover:underline"></a></p>
            </section>
        </div>
    </div>

    <script>
        document.getElementById('generate-referral-link').addEventListener('click', function() {
            const referralCode = Math.random().toString(36).substring(2, 12).toUpperCase(); 
            const referralLink = `http://localhost/chessgame/referral.php?code=${referralCode}`;
            document.getElementById('referral-link').href = referralLink;
            document.getElementById('referral-link').textContent = referralLink;
        });
    </script>
</body>
</html>