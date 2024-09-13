<?php
include "../../db_conn.php";

$html = '';

$sql = "SELECT id, betting_amount, winning_amount, imagepath, (betting_amount * 0.30) AS gst 
FROM online_game 
ORDER BY betting_amount ASC
";

$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) {
    $sno = 1; 
    while ($row = $result->fetch_assoc()) {
        $html .= '
            <tr class=" border-b   bg-gray-800 border-gray-700   hover:bg-gray-700">
                <td class="px-4 py-2 text-sm font-medium text-gray-200">' . htmlspecialchars($sno) . '</td>
                <td class="px-4 py-2 text-sm text-gray-300">
                    <img src="uploads/' . htmlspecialchars($row['imagepath']) . '" alt="Image" class="w-10 h-10 rounded-full object-cover">
                </td>
                <td class="px-4 py-2 text-sm text-gray-300">$' . htmlspecialchars($row['betting_amount']) . '</td>
                <td class="px-4 py-2 text-sm text-gray-300">$' . htmlspecialchars($row['gst']) . '</td>
                <td class="px-4 py-2 text-sm text-gray-300">$' . htmlspecialchars($row['winning_amount']) . '</td>
                <td class="px-8 py-2 text-sm text-gray-300 flex space-x-2">
                    <button class="edit-btn bg-white px-3 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500  hover:bg-blue-200  hover:shadow-lg transition-all duration-300 ease-in-out " data-id="' . htmlspecialchars($row['id']) . '"><i class="fa-solid fa-feather text-blue-600 font-bold   "></i>    </button>
                    <button class="delete-btn bg-white px-3 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 hover:bg-red-200  hover:shadow-lg transition-all duration-300 ease-in-out" data-id="' . htmlspecialchars($row['id']) . '"><i class="fa-solid fa-trash-can text-red-600 font-bold  "></i></button>
                </td>
            </tr>
        ';
        $sno++;
    }
} else {
    $html .= '
        <tr>
            <td colspan="6" class="px-4 py-2 text-center text-gray-700 dark:text-gray-300">No records found</td>
        </tr>
    ';
}

echo $html;

$conn->close();
?>
