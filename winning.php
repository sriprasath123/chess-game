<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Betting Management</title>
    <?php include "./comman_page/link.php"; ?>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Additional styling for better modal handling */
        .modal {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .modal.hidden {
            display: none;
        }
    </style>
</head>

<body class="overflow-x-hidden bg-indigo-100">
    <?php include "./comman_page/sidebar.php"; ?>

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
<!-- Button to Open Betting Amount Modal ----------------------------------------------------------------------------------->
        <button type="button" id="openwinningmodal" class="bg-gray-800 ml-4 mt-2 text-white border-white border-2 px-4 py-2 rounded-md hover:bg-gray-600 shadow-md focus:outline-none transition-transform transform hover:scale-105">
            <i class="fas fa-plus"></i> ADD Betting Amount
        </button>

        <!-- Betting Amount Modal -->
        <div id="winningmodel" class="modal hidden fixed z-50 inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg transform scale-95">
                <div class="modal-header flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Amount Control</h1>
                    <button id="close-winning-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none text-2xl">&times;</button>
                </div>
                <div class="modal-body mt-4">
                    <form id="adminForm" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="imagepath" class="block text-sm font-medium text-gray-700">Image:</label>
                            <input type="file" id="imagepath" name="imagepath" required
                                class="mt-1 block w-full px-3 py-2 text-black border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm bg-white">
                        </div>
                        <div class="mb-4">
                            <label for="betting_amount" class="block text-sm font-medium text-gray-700">Betting Amount:</label>
                            <input type="text" id="betting_amount" name="betting_amount" required class="mt-1 block w-full px-4 py-2 text-black border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="gst" class="block text-sm font-medium text-gray-700">GST (15%):</label>
                            <input type="text" id="gst" name="gst" readonly class="mt-1 block w-full px-4 py-2 border border-gray-300 text-black rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="winning_amount" class="block text-sm font-medium text-gray-700">Winning Amount:</label>
                            <input type="text" id="winning_amount" name="winning_amount" readonly required class="mt-1 block w-full px-4 py-2 text-black border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="modal-footer mt-6 flex justify-end space-x-2">
                            <button type="button" id="closewinningfooter" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none transition duration-200">Close</button>
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none transition duration-200">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Edit Modal----------------------------------------------------------------------------------------------------------->
        <div id="editModal" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-4 sm:mx-6 lg:mx-8">
                <h2 class="text-2xl font-semibold mb-6 text-gray-900">Edit Record</h2>
                <form id="editForm">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-4">
                        <label for="edit-betting-amount" class="block text-sm font-medium text-gray-700">Betting Amount</label>
                        <input type="text" id="edit-betting-amount" name="betting_amount"
                            class="mt-1 py-2 px-3 block w-full rounded-md border border-gray-300 text-black shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="edit-gst" class="block text-sm font-medium text-gray-700">GST (30%)</label>
                        <input type="text" id="edit-gst" name="gst"
                            class="mt-1 py-2 px-3 block w-full rounded-md border border-gray-300 text-black shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            readonly>
                    </div>
                    <div class="mb-6">
                        <label for="edit-winning-amount" class="block text-sm font-medium text-gray-700">Winning Amount</label>
                        <input type="text" id="edit-winning-amount" name="winning_amount"
                            class="mt-1 py-2 px-3 block w-full rounded-md border border-gray-300 text-black shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" id="closeModal"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

<!-- Betting Data Table----------------------------------------------------------------------------------------------------->
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-sm">
                <div class="relative h-72 overflow-auto">
                    <table class="min-w-full bg-gray-50 dark:bg-gray-900">
                        <thead class="sticky top-0 text-xs font-semibold  uppercase  bg-gray-900 text-gray-200 border-b border-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">S/No</th>
                                <th class="px-8 py-3 text-left">Image</th>
                                <th class="px-4 py-3 text-left">Betting Amount</th>
                                <th class="px-10 py-3 text-left">GST</th>
                                <th class="py-3 text-left">Winning Amount</th>
                                <th class="px-10 py-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody id="betting-data" class="bg-white divide-y dark:bg-gray-900 dark:divide-gray-700">
                            <!-- Table rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide  uppercase border-t border-gray-700  sm:grid-cols-9 text-gray-400 bg-gray-800">
                    <span class="flex items-center col-span-3"> Showing 21-30 of 100 </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 text-white dark:text-gray-800 transition-colors duration-150 bg-blue-600 dark:bg-gray-100 border border-r-0 border-blue-600 dark:border-gray-100 rounded-md focus:outline-none focus:shadow-outline-purple">3</button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                                </li>
                                <li>
                                    <span class="px-3 py-1">...</span>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </div>

<!-- Scripts ------------------------------------------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Fetch betting data---------------------------------------------------

        $(document).ready(function() {
            function fetchBettingData() {
                $.ajax({
                    url: 'backend/winnging/online_game_table_fetch.php',
                    method: 'GET',
                    success: function(response) {
                        $('#betting-data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch data:', error);
                        alert('Failed to fetch data. Please try again.');
                    }
                });
            }

            fetchBettingData();
        // Fetch betting data---------------------------------------------------


            // Show the betting amount modal-----------------------------------
            $('#openwinningmodal').on('click', function() {
                $('#winningmodel').removeClass('hidden').addClass('flex');
                $('#winningmodel').removeClass('scale-95').addClass('scale-100');
            });

-            $('#close-winning-modal, #closewinningfooter').on('click', function() {
                $('#winningmodel').removeClass('flex').addClass('hidden');
                $('#winningmodel').removeClass('scale-100').addClass('scale-95');
            });

-            $('#winningmodel').on('click', function(event) {
                if ($(event.target).is('#winningmodel')) {
                    $('#winningmodel').removeClass('flex').addClass('hidden');
                    $('#winningmodel').removeClass('scale-100').addClass('scale-95');
                }
            });
            // Show the betting amount modal-----------------------------------


            // Calculate GST and Winning Amount------------------------------
            $('#betting_amount').on('input', function() {
                const multiplier = 2;
                const gstRate = 0.15;

                const bettingAmount = parseFloat($(this).val()) || 0;
                const amountBeforeGST = bettingAmount * multiplier;
                const gst = amountBeforeGST * gstRate;
                const winningAmount = amountBeforeGST - gst;

                $('#gst').val(gst.toFixed(2));
                $('#winning_amount').val(winningAmount.toFixed(2));
            });


            // Show the edit modal------------------------------------
            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var bettingAmount = $(this).data('betting-amount');
                var winningAmount = $(this).data('winning-amount');

                $('#edit-id').val(id);
                $('#edit-betting-amount').val(bettingAmount);
                $('#edit-winning-amount').val(winningAmount);

                $('#editModal').removeClass('hidden');
            });

            // Close the edit modal------------------------------------
            $('#closeModal').on('click', function() {
                $('#editModal').addClass('hidden');
            });


            // Calculate GST and Winning Amount---------------------------
            $('#edit-betting-amount').on('input', function() {
                const multiplier = 2; 
                const gstRate = 0.15; // GST rate (15%)

                const bettingAmount = parseFloat($(this).val()) || 0;
                const amountBeforeGST = bettingAmount * multiplier;
                const gst = amountBeforeGST * gstRate;
                const winningAmount = amountBeforeGST - gst;

                $('#edit-gst').val(gst.toFixed(2));
                $('#edit-winning-amount').val(winningAmount.toFixed(2));
            });
            // Calculate GST and Winning Amount---------------------------




            // Handle edit form submission--------------------------------
            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'backend/winnging/update_betting.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            $('#editModal').addClass('hidden');
                            alert('Record updated successfully.');
                            fetchBettingData();
                        } else {
                            alert('Failed to update record.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Failed to update record. Please try again.');
                    }
                });
            });

            // Handle record deletion-------------------------------------------
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: 'backend/winnging/delete_betting.php',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response === 'success') {
                                alert('Record deleted successfully.');
                                fetchBettingData(); 
                            } else {
                                alert('Failed to delete record.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('Failed to delete record. Please try again.');
                        }
                    });
                }
            });

            // Submit the betting form via AJAX----------------------------------------------
            $('#adminForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'backend/winnging/save_betting.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response);
                        $('#winningmodel').removeClass('flex').addClass('hidden');
                    },
                    error: function() {
                        console.log('There was an error processing your request.');
                    }
                });
            });
        });
    </script>
</body>

</html>