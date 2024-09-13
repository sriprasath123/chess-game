<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./comman_page/link.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
</head>
<body>
<?php include "./comman_page/sidebar.php"; ?>

<div class="h-full ml-14 mt-16 mb-10 md:ml-64">
    <div class="w-full mx-auto max-w-5xl p-6 bg-white rounded-2xl shadow-2xl transition-shadow hover:shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-extrabold text-black">Payment History</h2>
            <div class="flex items-center space-x-4">
                <!-- Refresh Button -->
                <button id="refreshButton" aria-label="Refresh" class="text-gray-600 hover:text-gray-800 focus:outline-none p-2 rounded-lg transition-colors duration-300">
                    <i class="fa-solid fa-sync-alt text-xl"></i> Refresh
                </button>
                <!-- Search Bar -->
                <input id="searchInput" type="text" placeholder="Search..." aria-label="Search" class="p-1 border rounded-lg text-gray-700 focus:outline-none shadow-lg focus:ring-2 focus:ring-blue-500" />
                <!-- Filter Dropdown -->
                <div class="relative">
                    <button id="filterButton" aria-haspopup="true" aria-expanded="false" class="text-gray-600 hover:text-gray-800 flex items-center">
                        <span>Filter</span>
                        <i class="fa-solid fa-caret-down ml-2"></i>
                    </button>
                    <div id="filterMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                        <ul>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 filter-option" data-filter="date">Date</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 filter-option" data-filter="amount">Amount</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 filter-option" data-filter="category">Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transactions -->
        <div id="transactions">
            <!-- Today's Transactions -->
            <div class="transaction-item mb-6" data-date="2022-05-09" data-amount="25.90" data-category="AP">
                <p class="text-sm text-gray-700 mb-2">Today</p>
                <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-100 to-gray-100 rounded-lg mb-4 hover:bg-gray-200 transition-all duration-300 shadow-lg">
                    <div class="flex items-center">
                        <span class="bg-orange-500 text-white p-3 rounded-full text-sm font-bold shadow-lg">AP</span>
                        <div class="ml-4">
                            <p class="font-semibold text-black text-lg">Apple Store</p>
                            <p class="text-xs text-gray-500">9 May 2022</p>
                        </div>
                    </div>
                    <p class="font-semibold text-black text-lg">$25.90</p>
                </div>
                <!-- Additional transaction items here -->
            </div>

            <!-- Yesterday's Transactions -->
            <div class="transaction-item" data-date="2022-05-12" data-amount="720.90" data-category="SA">
                <p class="text-sm text-gray-700 mb-2">Yesterday</p>
                <div class="flex justify-between items-center p-4 bg-gradient-to-r from-gray-100 to-gray-100 rounded-lg mb-4 hover:bg-gray-200 transition-all duration-300 shadow-lg">
                    <div class="flex items-center">
                        <span class="bg-blue-500 text-white p-3 rounded-full text-sm font-bold shadow-lg">SA</span>
                        <div class="ml-4">
                            <p class="font-semibold text-black text-lg">Salary to Designer</p>
                            <p class="text-xs text-gray-500">12 May 2022</p>
                        </div>
                    </div>
                    <p class="font-semibold text-black text-lg">$720.90</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Toggle filter menu visibility
    $('#filterButton').click(function() {
        $('#filterMenu').toggle();
        $(this).attr('aria-expanded', $('#filterMenu').is(':visible'));
    });

    // Filter options
    $('.filter-option').click(function() {
        var filterType = $(this).data('filter');
        $('#filterMenu').hide(); // Hide filter menu after selection
        $('#filterButton').attr('aria-expanded', 'false');

        $('.transaction-item').each(function() {
            var showItem = true;

            if (filterType === 'date') {
                var itemDate = $(this).data('date');
                var today = new Date().toISOString().split('T')[0];
                showItem = (itemDate === today);
            } else if (filterType === 'amount') {
                var itemAmount = $(this).data('amount');
                showItem = (itemAmount > 50); // Example condition
            } else if (filterType === 'category') {
                var itemCategory = $(this).data('category');
                showItem = (itemCategory === 'AP'); // Example condition
            }

            $(this).toggle(showItem);
        });
    });

    // Search functionality
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('.transaction-item').each(function() {
            var itemText = $(this).text().toLowerCase();
            $(this).toggle(itemText.includes(searchTerm));
        });
    });

    // Refresh functionality
    $('#refreshButton').on('click', function() {
        // Reload the transactions (example implementation)
        $('#transactions').load(location.href + ' #transactions > *');
    });
});
</script>
</body>
</html>
