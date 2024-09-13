<?php
include "../../db_conn.php";

// Fetch Esakkimuthu's data and order by highest points
$query = "SELECT chess_user.name, chess_user.email, chess_user.image_path, coins.total_amount 
          FROM chess_user 
          INNER JOIN coins ON chess_user.user_id = coins.user_id 
          -- WHERE chess_user.name = 'Esakkimuthu' 
          ORDER BY coins.total_amount DESC";

$result = mysqli_query($conn, $query);

// Initialize an array to hold leaderboard data
$leaderboard = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $leaderboard[] = $row;
    }
    // Return the leaderboard data as JSON
    echo json_encode($leaderboard);
} else {
    // Return an error if the query fails
    echo json_encode(['error' => 'Failed to fetch leaderboard data']);
}
?>
