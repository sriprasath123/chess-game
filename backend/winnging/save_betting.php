<?php
include "../../db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bettingAmount = $_POST['betting_amount'];
    $gst = $_POST['gst'];
    $winningAmount = $_POST['winning_amount'];

    // Handle file upload
    if (isset($_FILES['imagepath']) && $_FILES['imagepath']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['imagepath']['tmp_name'];
        $fileName = $_FILES['imagepath']['name'];
        $fileSize = $_FILES['imagepath']['size'];
        $fileType = $_FILES['imagepath']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileExtension, $allowedExts)) {
            // Define upload directory and move file
            $uploadDir = '../../uploads/';
            $destPath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // File successfully uploaded
                $sql = "INSERT INTO online_game (betting_amount, gst, winning_amount, imagepath) VALUES ('$bettingAmount', '$gst', '$winningAmount', '$fileName')";

                if ($conn->query($sql) === TRUE) {
                    echo 'Record store  successfully!';
                } else {
                    echo 'Failed to save data: ' . $conn->error;
                }
            } else {
                echo 'Failed to move uploaded file.';
            }
        } else {
            echo 'Unsupported file type.';
        }
    } else {
        echo 'No file uploaded or upload error.';
    }

    // Close connection
    $conn->close();
}
?>
