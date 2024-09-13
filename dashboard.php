

<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$userEmail = $_SESSION['email'];
$userRole = $_SESSION['role'] ?? 'User';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./comman_page/link.php"; ?>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php include "./comman_page/sidebar.php"; ?>

<body class="overflow-x-hidden bg-indigo-100">

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

 <!-- Statistics Cards ---------------------------------------------------------------------------------------------------->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            <!-- Visitors Card -->
            <div class="bg-gray-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i class="fas fa-users fa-2x text-gray-800 dark:text-gray-800"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl">1,257</p>
                    <p>Visitors</p>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="bg-gray-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i class="fas fa-box fa-2x text-gray-800 dark:text-gray-800"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl">557</p>
                    <p>Orders</p>
                </div>
            </div>

            <!-- Sales Card -->
            <div class="bg-gray-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i class="fas fa-chart-line fa-2x text-gray-800 dark:text-gray-800"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl">$11,257</p>
                    <p>Sales</p>
                </div>
            </div>

            <!-- Balances Card -->
            <div class="bg-gray-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-gray-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <i class="fas fa-wallet fa-2x text-gray-800 dark:text-gray-800"></i>
                </div>
                <div class="text-right">
                    <p class="text-2xl">$75,257</p>
                    <p>Balances</p>
                </div>
            </div>
        </div>
 <!-- ./Statistics Cards -------------------------------------------------------------------------------------------------->



<!-- Modal--------------------------------------------------------------------------------------------------------------- -->


        <button type="button" id="open-modal" class="bg-gray-800 ml-4 text-white px-4 py-2 rounded-md border-white border-2 hover:bg-gray-600 shadow-md focus:outline-none transition-transform transform hover:scale-105">
        <i class="fas fa-plus"></i>  ADD Admin
        </button>



        <!-- ADD Admin model -------------------------------------------------------------------------------------------------------------- -->

        <div id="exampleModal" class="modal hidden fixed z-50 inset-0 bg-black bg-opacity-50 transition-opacity duration-300 ease-in-out flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg transform transition-transform duration-300 scale-95">
        <div class="modal-header flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Add New Admin</h1>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none text-2xl">&times;</button>
        </div>
        <div class="modal-body mt-4">
            <form id="adminForm">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Username:</label>
                    <input type="text" id="name" name="name" required class="mt-1 block text-black w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="text" id="email" name="email" required class="mt-1 block text-black w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="text" id="password" name="password" required class="mt-1 text-black block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
                    <select id="category" name="category" required class="mt-1 block w-full px-4 text-black py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div class="modal-footer mt-6 flex justify-end space-x-2">
                    <button type="button" id="close-modal-footer" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none transition duration-200">
                        Close
                    </button>
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none transition duration-200">
                        ADD
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /Modal---------------------------------------------------------------------------------------------------------------- -->












    </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        // Open the modal when the "ADD Admin" button is clicked
        $('#open-modal').on('click', function() {
            $('#exampleModal').removeClass('hidden').addClass('flex');
            $('#exampleModal').removeClass('scale-95').addClass('scale-100');
        });

        // Close the modal when the "Close" button in the header is clicked
        $('#close-modal').on('click', function() {
            $('#exampleModal').removeClass('flex').addClass('hidden');
            $('#exampleModal').removeClass('scale-100').addClass('scale-95');
        });

        // Close the modal when the "Close" button in the footer is clicked
        $('#close-modal-footer').on('click', function() {
            $('#exampleModal').removeClass('flex').addClass('hidden');
            $('#exampleModal').removeClass('scale-100').addClass('scale-95');
        });

        // Optionally, you can remove this part to disable closing the modal by clicking outside of it
        // $('#exampleModal').on('click', function(event) {
        //     if ($(event.target).is('#exampleModal')) {
        //         $('#exampleModal').removeClass('flex').addClass('hidden');
        //         $('#exampleModal').removeClass('scale-100').addClass('scale-95');
        //     }
        // });

        $('#adminForm').submit(function(e) {
            e.preventDefault(); 
            $.ajax({
                type: 'POST',
                url: './backend/admin/admin_add.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    if (response.status === 'success') {
                        toggleModal(false);
                        $('#adminForm')[0].reset();
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                    console.log('AJAX Error:', xhr);
                }
            });
        });

        // Handle "Next" button click to reload content
        $('#next-button').on('click', function() {
            location.reload(); // Reloads the current page
        });


    });
</script>



</body>

</html>