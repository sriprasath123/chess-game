<?php
include "../../db_conn.php";

// Query to fetch the relevant fields from both chess_user and coins tables, ordered by total_win
$query = "SELECT 
            a.name, 
            a.image_path, 
            a.total_win AS total_win 
          FROM chess_user a
          ORDER BY a.total_win DESC ";

// Execute the query
$result = mysqli_query($conn, $query);

// Initialize an empty array to hold the leaderboard data
$leaderboard = [];

// Check for errors in the query
if (!$result) {
    echo json_encode(['error' => mysqli_error($conn)]);
    exit;
}

// Fetch data and build the leaderboard array
while ($row = mysqli_fetch_assoc($result)) {
    $leaderboard[] = [
        'name' => $row['name'],
        'image_path' => $row['image_path'],
        'total_win' => $row['total_win']
    ];
}

// Return data as JSON
echo json_encode($leaderboard);
?>
