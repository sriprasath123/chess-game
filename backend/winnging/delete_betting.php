<?php
include "../../db_conn.php";

$id = $_POST['id'];

$sql = "DELETE FROM online_game WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}

$stmt->close();
$conn->close();
?>
