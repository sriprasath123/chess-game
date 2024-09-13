<?php
include "../.././db_conn.php";

// Fetch users from database
$sql = "SELECT user_id, name AS username, email, mobile AS phone, session_token AS status, image_path, is_online, action FROM chess_user";
$result = $conn->query($sql);

$html = '';

if ($result->num_rows > 0) {

    $count = 1; // Start counting from 1
    while ($row = $result->fetch_assoc()) {
        $statusClass = $row['status'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
        $statusText = $row['status'] ? 'Active' : 'Inactive';

        // Determine which button to show based on action column value
        $onButtonDisplay = $row['action'] == 1 ? '' : 'hidden';
        $offButtonDisplay = $row['action'] == 0 ? '' : 'hidden';

        $html .= '
            <tr class="bg-gray-800 hover:bg-gray-700 text-gray-400">
                <td class="px-4 py-3 text-sm">' . htmlspecialchars($count) . '</td>
                <td class="px-4 py-3 text-sm">
                    <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                            <img class="object-cover w-full h-full rounded-full" src="assets\img\sri.png' . htmlspecialchars($row['image_path']) . '" alt="User Image" loading="lazy" />
                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                            <p class="font-semibold">' . htmlspecialchars($row['username']) . '</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm">' . htmlspecialchars($row['email']) . '</td>
                <td class="px-4 py-3 text-sm">' . htmlspecialchars($row['phone']) . '</td>
                <td class="text-sm px-6 py-4 whitespace-nowrap">
                    <button id="on-btn-' . htmlspecialchars($row['user_id']) . '" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 ' . $onButtonDisplay . '" onclick="toggleAction(' . htmlspecialchars($row['user_id']) . ', 0)">On</button>
                    <button id="off-btn-' . htmlspecialchars($row['user_id']) . '" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 ' . $offButtonDisplay . '" onclick="toggleAction(' . htmlspecialchars($row['user_id']) . ', 1)">Off</button>
                </td>
                <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight ' . ($row['is_online'] == 1 ? 'text-green-500' : 'text-red-500') . '">' . ($row['is_online'] == 1 ? "Active" : "Inactive") . '</span>
                </td>
            </tr>
        ';

        $count++; // Increment count for the next row
    }
} else {
    echo "no record found";
}

// Return HTML
echo $html;

$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    function toggleAction(user_id, newAction) {
        $.ajax({
            url: './backend/player/update_action.php',
            type: 'POST',
            data: {
                user_id: user_id,
                action: newAction
            },
            success: function(response) {
                if (response === 'success') {
                    alert('Action updated successfully');
                    
                    // Toggle button visibility
                    $('#on-btn-' + user_id).toggleClass('hidden', newAction !== 1);
                    $('#off-btn-' + user_id).toggleClass('hidden', newAction === 1);

                } else {
                    alert('Failed to update action');
                }
                console.log(response);
            },
            error: function() {
                alert('Error in AJAX request');
            }
        });
    }
</script>
