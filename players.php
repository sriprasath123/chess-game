<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./comman_page/link.php"; ?>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<!-- Tailwind CSS Styles -->
<style>
    #toggle:checked+label {
        background-color: #0369a1;
        /* Change background color when toggled on */
    }

    #toggle:checked+label .dot {
        transform: translateX(100%);
        /* Slide the dot when toggled on */
    }
</style>
<?php include "./comman_page/sidebar.php"; ?>

<body class="overflow-x-hidden bg-indigo-100 ">

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <!-- Add search bar -->

        <div class="relative my-4 ml-5">
            <input type="text" id="searchBar" class="px-4 py-2 border border-gray-300 rounded-lg w-52 pr-10 text-black focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Search...">
            <i class="fas fa-search absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500"></i>
        </div>

<!-- player table ----------------------------------------------------------------------------------------------------- -->
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="relative h-72 overflow-auto">
                    <table class="w-full bg-gray-50 dark:bg-gray-900">
                        <thead class="sticky top-0 text-xs font-semibold z-40 tracking-wide text-left text-gray-50 uppercase bg-gray-900 dark:text-gray-50 dark:bg-gray-900">
                            <tr>
                                <th class="px-4 py-3">S/No</th>
                                <th class="px-4 py-3">Username</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Phone No</th>
                                <th class="px-4 py-3 ">Action</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class=" divide-y divide-gray-700">
                            <!-- Your rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide  uppercase   sm:grid-cols-9 text-gray-400 bg-gray-900">
                    <span class="flex items-center col-span-3" id="recordCount"> Showing 0-0 of 0 </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center" id="paginationControls">
                                <!-- Pagination buttons will be added here by jQuery -->
                            </ul>
                        </nav>
                    </span>
                </div>

            </div>
        </div>

        <!-- player table end ----------------------------------------------------------------------------------------------------- -->


        <!-- player table scripts ----------------------------------------------------------------------------------------------------- -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                function fetchData() {
                    $.ajax({
                        url: 'backend/player/player_table_fetch.php',
                        type: 'GET',
                        success: function(data) {
                            var tableBody = $('table tbody');
                            tableBody.empty();

                            tableBody.html(data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', status, error);
                        }
                    });
                }

                fetchData();

                // Function to update pagination controls
                function updatePaginationControls() {
                    var paginationHtml = '';

                    // Previous button
                    if (currentPage > 1) {
                        paginationHtml += '<li><button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" onclick="fetchData(' + (currentPage - 1) + ')"><i class="fa-solid fa-chevron-left"></i></button></li>';
                    } else {
                        paginationHtml += '<li><button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous" disabled><i class="fa-solid fa-chevron-left"></i></button></li>';
                    }

                    // Page numbers
                    for (var i = 1; i <= totalPages; i++) {
                        if (i === currentPage) {
                            paginationHtml += '<li><button class="px-3 py-1 text-white dark:text-gray-800 transition-colors duration-150 bg-blue-600 dark:bg-gray-100 border border-r-0 border-blue-600 dark:border-gray-100 rounded-md focus:outline-none focus:shadow-outline-purple">' + i + '</button></li>';
                        } else {
                            paginationHtml += '<li><button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" onclick="fetchData(' + i + ')">' + i + '</button></li>';
                        }
                    }

                    // Next button
                    if (currentPage < totalPages) {
                        paginationHtml += '<li><button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" onclick="fetchData(' + (currentPage + 1) + ')"><i class="fa-solid fa-chevron-right"></i></button></li>';
                    } else {
                        paginationHtml += '<li><button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next" disabled><i class="fa-solid fa-chevron-right"></i></button></li>';
                    }

                    $('#paginationControls').html(paginationHtml);
                }

                // filter search bar ------------------------------------------------------
                $(document).ready(function() {
                    $('#searchBar').on('input', function() {
                        var searchTerm = $(this).val().toLowerCase();
                        $('table tr').each(function() {
                            var row = $(this);
                            var cells = row.find('td');
                            var matched = false;
                            cells.each(function() {
                                var cellText = $(this).text().toLowerCase();
                                if (cellText.indexOf(searchTerm) > -1) {
                                    matched = true;
                                }
                            });
                            if (matched) {
                                row.show();
                            } else {
                                row.hide();
                            }
                        });
                    });
                });




            });
        </script>

        <!-- player table scripts end ----------------------------------------------------------------------------------------------------- -->


    </div>
    </div>
    </div>

</body>

</html>