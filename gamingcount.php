<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./comman_page/link.php"; ?>
</head>
<?php include "./comman_page/sidebar.php"; ?>

<body>
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">


<!-- player  Data Table ---------------------------------------------------------------------------------------->
<div class="mt-4 mx-4">
    <div class="w-full overflow-hidden rounded-lg shadow-sm">
        <div class="relative h-72 overflow-auto">
            <table class="min-w-full bg-gray-50 dark:bg-gray-900">
                <thead class="sticky top-0 text-xs font-semibold uppercase bg-gray-900 text-gray-200 border-b border-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">S/No</th>
                        <th class="px-8 py-3 text-left">Date and Time</th>
                        <th class="px-4 py-3 text-left">Player A</th>
                        <th class="px-4 py-3 text-left">Player B</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Result</th>
                        <th class="px-4 py-3 text-center">player moves</th>
                    </tr>
                </thead>
                <tbody id="betting-data" class="bg-white divide-y dark:bg-gray-900 dark:divide-gray-700">
                    <!-- Table rows will be inserted here -->










                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
1
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    hari
                </td>
                <td class="px-6 py-4">
                    praveen
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="text-center py-4">
                <i class="fa-solid fa-circle-play text-green-600 "></i>
                </td>
               
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
2
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    arul
                </td>
                <td class="px-6 py-4">
                    praveen
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="text-center py-4">
                <i class="fa-solid fa-circle-play text-green-600 "></i>
                </td>
               
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
3
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    bala
                </td>
                <td class="px-6 py-4">
                    sathish
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="text-center py-4">
                <i class="fa-solid fa-circle-play text-green-600 "></i>
                </td>
               
            </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
4
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    kumar
                </td>
                <td class="px-6 py-4">
                    praveen
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="text-center py-4">
                <i class="fa-solid fa-circle-play text-green-600 "></i>
                </td>
               
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
5
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    arul
                </td>
                <td class="px-6 py-4">
                    praveen
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="text-center py-4">
                <i class="fa-solid fa-circle-play text-green-600 "></i>
                </td>
               
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
6
                </th>
                <td class="px-6 py-4">
                    7:00/14:08:2024
                </td>
                <td class="px-6 py-4">
                    myil
                </td>
                <td class="px-6 py-4">
                    sathish
                </td>
                <td class="px-6 py-4">
                    completed
                </td>
                <td class="px-6 py-4">
                    win
                </td>
                <td class="px-6 py-4">
                <i class="fa-solid fa-circle-play"></i>            
                </td>
               
            </tr>















                </tbody>
            </table>
        </div>
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t border-gray-700 sm:grid-cols-9 text-gray-400 bg-gray-800">
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













<!-- 
    data.forEach(function(item) {
        var row = `<tr>
            <td class="px-4 py-3">${item.id}</td>
            <td class="px-8 py-3">${item.datetime}</td>
            <td class="px-4 py-3">${item.playerA}</td>
            <td class="px-4 py-3">${item.playerB}</td>
            <td class="px-4 py-3">${item.status}</td>
            <td class="px-4 py-3">${item.result}</td>
            <td class="px-10 py-3">
                <button class="px-3 py-1 rounded-md text-white bg-blue-500 hover:bg-blue-600">Edit</button>
                <button class="px-3 py-1 rounded-md text-white bg-red-500 hover:bg-red-600">Delete</button>
            </td>
        </tr>`;
        $tbody.append(row);
    }); -->













</div>  
</body>
</html>