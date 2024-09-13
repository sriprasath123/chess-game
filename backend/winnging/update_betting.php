<?php
include "../../db_conn.php";

$id = $_POST['id'];
$betting_amount = $_POST['betting_amount'];
$winning_amount = $_POST['winning_amount'];

$sql = "UPDATE online_game SET betting_amount = ?, winning_amount = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $betting_amount, $winning_amount, $id);

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}

$stmt->close();
$conn->close();
?>
