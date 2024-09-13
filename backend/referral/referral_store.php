<?php
include "../.././db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure the referral code and email are retrieved from the POST data
    $referral_code = isset($_POST['referral_code']) ? trim($_POST['referral_code']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (!empty($referral_code) && !empty($email)) {
        // Prepare SQL statement to insert referral code and email into the database
        $sql = "INSERT INTO installations (referral_code, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing SQL statement: " . $conn->error);
        }

        $stmt->bind_param("ss", $referral_code, $email);

        if ($stmt->execute()) {
            echo "<script>
            window.location.href = 'https://play.google.com/store/apps/details?id=com.lead_chess';
          </script>";
            exit();
        } else {
            echo "Error executing SQL statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
    }
} else {
    echo "Invalid request method. Please use POST.";
}

$conn->close();
