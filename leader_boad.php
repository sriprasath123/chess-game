<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Podium Leaderboard</title>
  <?php include "./comman_page/link.php"; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    .table-container {
      height: 18rem;
      overflow-y: auto;
    }

    .sticky-header th {
      position: -webkit-sticky;
      position: sticky;
      top: 0;
      background-color: #1e293b;
      z-index: 10;
    }

    .loading-spinner {
      border: 4px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      border-top: 4px solid #fff;
      width: 24px;
      height: 24px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body class="bg-darkBlue-900 text-white">
  <?php include "./comman_page/sidebar.php"; ?>

  <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="min-h-screen p-4 text-center">
      <!-- Podium Section -->
      <div id="podium" class="grid grid-cols-2 md:grid-cols-3 gap-8 justify-center mb-8">
        <!-- Podium Players will be dynamically inserted here -->
      </div>

      <!-- Filter Option -->
      <div class="flex justify-center mb-4">
        <select id="filterOption" class="bg-gray-900 text-white p-2 rounded">
          <option value="total_amount">Total Points</option>
          <option value="total_match">Total Matches</option>
          <option value="total_win">Total Wins</option>
        </select>
      </div>

      <!-- Leaderboard Table -->
      <div class="table-container overflow-x-auto">
        <table class="min-w-full text-left table-auto bg-gray-900 rounded-lg shadow-lg">
          <thead class="sticky-header">
            <tr class="text-gray-300 text-sm h-14">
              <th class="px-4 py-2">Place</th>
              <th class="px-16 py-2">User</th>
              <th class="px-4 py-2">Total</th>
            </tr>
          </thead>
          <tbody id="leaderboard" class="text-sm divide-y divide-gray-700">
            <!-- Leaderboard entries will be dynamically inserted here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Loading Spinner -->
  <div id="loading" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="loading-spinner"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      function fetchLeaderboardData(filterType) {
        $('#loading').removeClass('hidden');  // Show loading spinner
        $('#filterOption').prop('disabled', true);  // Disable the dropdown during the fetch

        let url = '';
        if (filterType === 'total_amount') {
          url = 'backend/leaderboard/fetch_totalamount.php';
        } else if (filterType === 'total_match') {
          url = 'backend/leaderboard/totalmatch.php';
        } else if (filterType === 'total_win') {
          url = 'backend/leaderboard/totalwin.php';
        }

        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            if (data.error || data.length === 0) {
              $('#podium').html('<p>No data available</p>');
              $('#leaderboard').html('<p>No data available</p>');
              $('#loading').addClass('hidden');
              return;
            }

            let podiumHTML = '';
            let leaderboardHTML = '';

            $.each(data, function (index, player) {
              let statValue = player[filterType] || 0;

              if (index < 3) {
                let place = (index === 0) ? '1st' : (index === 1 ? '2nd' : '3rd');
                let crownColor = (index === 0) ? 'text-yellow-500' : (index === 1 ? 'text-orange-400' : 'text-gray-300');
                let borderColor = (index === 0) ? 'border-yellow-500' : (index === 1 ? 'border-gray-300' : 'border-orange-400');

                podiumHTML += `
                  <div class="bg-gray-900 text-white rounded-t-lg shadow-lg border-b-2 ${borderColor} hover:scale-105 p-4 transform transition duration-300 flex flex-col items-center">
                    <div class="p-2 rounded-full mb-2">
                      <i class="fas fa-crown ${crownColor} text-3xl"></i>
                    </div>
                    <img src="assets/img/${player.image_path || 'preview.webp'}" alt="avatar" class="w-12 h-12 rounded-full mb-2">
                    <div class="text-lg font-bold">@${player.name}</div>
                    <div class="bg-darkBlue-700 text-gray-200 rounded p-2 w-full text-center">
                      <h3 class="text-2xl font-bold">${place}</h3>
                    </div>
                    <div class="text-orange-400">${filterType === 'total_amount' ? 'Total points' : filterType === 'total_match' ? 'Total matches' : 'Total wins'}: ${statValue}</div>
                  </div>`;
              } else {
                leaderboardHTML += `
                  <tr class="text-white bg-gray-900 hover:bg-darkBlue-700 transition duration-200">
                    <td class="px-4 py-2">${index + 1}</td>
                    <td class="px-4 py-2 flex items-center">
                      <img src="assets/img/${player.image_path || 'default.png'}" onerror="this.src='assets/img/preview.webp'" alt="avatar" class="mx-2 w-10 h-10 rounded-full">
                      @${player.name}
                    </td>
                    <td class="px-4 py-2">${statValue}</td>
                  </tr>`;
              }
            });

            $('#podium').html(podiumHTML);
            $('#leaderboard').html(leaderboardHTML);
            $('#loading').addClass('hidden');
            $('#filterOption').prop('disabled', false);  // Re-enable dropdown
          },
          error: function (error) {
            console.error('Error fetching leaderboard data:', error);
            $('#loading').addClass('hidden');
            $('#filterOption').prop('disabled', false);  // Re-enable dropdown
          }
        });
      }

      // Initial fetch
      fetchLeaderboardData('total_amount');

      // Change event listener for filter dropdown
      $('#filterOption').change(function () {
        const selectedOption = $(this).val();
        fetchLeaderboardData(selectedOption);
      });
    });
  </script>

</body>

</html>
