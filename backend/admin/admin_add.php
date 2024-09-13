<?php
include "../../db_conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $category = $_POST['category'];

    $sql = "INSERT INTO admins (name, email, password, category) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $category);

    if ($stmt->execute()) {
        echo 'Success';
    } else {
        echo 'Error'; 
    }

    $stmt->close();
}
?>