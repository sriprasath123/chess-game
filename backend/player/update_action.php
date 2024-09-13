<?php
include '../../db_conn.php'; 

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$action = mysqli_real_escape_string($conn, $_POST['action']);

$query = mysqli_query($conn, "UPDATE chess_user SET action = '$action' WHERE user_id = '$user_id'"); 
if ($query) {
    echo "success";
} else { 
    echo "failed";
}

mysqli_close($conn);
?>
