<!-- component -->
<style>
      /* Compiled dark classes from Tailwind */
      .dark .dark\:divide-gray-700> :not([hidden])~ :not([hidden]) {
          border-color: rgba(55, 65, 81);
      }

      .dark .dark\:bg-gray-50 {
          background-color: rgba(249, 250, 251);
      }

      .dark .dark\:bg-gray-100 {
          background-color: rgba(243, 244, 246);
      }

      .dark .dark\:bg-gray-600 {
          background-color: rgba(75, 85, 99);
      }

      .dark .dark\:bg-gray-700 {
          background-color: rgba(55, 65, 81);
      }

      .dark .dark\:bg-gray-800 {
          background-color: rgba(31, 41, 55);
      }

      .dark .dark\:bg-gray-900 {
          background-color: rgba(17, 24, 39);
      }

      .dark .dark\:bg-red-700 {
          background-color: rgba(185, 28, 28);
      }

      .dark .dark\:bg-green-700 {
          background-color: rgba(4, 120, 87);
      }

      .dark .dark\:hover\:bg-gray-200:hover {
          background-color: rgba(229, 231, 235);
      }

      .dark .dark\:hover\:bg-gray-600:hover {
          background-color: rgba(75, 85, 99);
      }

      .dark .dark\:hover\:bg-gray-700:hover {
          background-color: rgba(55, 65, 81);
      }

      .dark .dark\:hover\:bg-gray-900:hover {
          background-color: rgba(17, 24, 39);
      }

      .dark .dark\:border-gray-100 {
          border-color: rgba(243, 244, 246);
      }

      .dark .dark\:border-gray-400 {
          border-color: rgba(156, 163, 175);
      }

      .dark .dark\:border-gray-500 {
          border-color: rgba(107, 114, 128);
      }

      .dark .dark\:border-gray-600 {
          border-color: rgba(75, 85, 99);
      }

      .dark .dark\:border-gray-700 {
          border-color: rgba(55, 65, 81);
      }

      .dark .dark\:border-gray-900 {
          border-color: rgba(17, 24, 39);
      }

      .dark .dark\:hover\:border-gray-800:hover {
          border-color: rgba(31, 41, 55);
      }

      .dark .dark\:text-white {
          color: rgba(255, 255, 255);
      }

      .dark .dark\:text-gray-50 {
          color: rgba(249, 250, 251);
      }

      .dark .dark\:text-gray-100 {
          color: rgba(243, 244, 246);
      }

      .dark .dark\:text-gray-200 {
          color: rgba(229, 231, 235);
      }

      .dark .dark\:text-gray-400 {
          color: rgba(156, 163, 175);
      }

      .dark .dark\:text-gray-500 {
          color: rgba(107, 114, 128);
      }

      .dark .dark\:text-gray-700 {
          color: rgba(55, 65, 81);
      }

      .dark .dark\:text-gray-800 {
          color: rgba(31, 41, 55);
      }

      .dark .dark\:text-red-100 {
          color: rgba(254, 226, 226);
      }

      .dark .dark\:text-green-100 {
          color: rgba(209, 250, 229);
      }

      .dark .dark\:text-gray-400 {
          color: rgba(96, 165, 250);
      }

      .dark .group:hover .dark\:group-hover\:text-gray-500 {
          color: rgba(107, 114, 128);
      }

      .dark .group:focus .dark\:group-focus\:text-gray-700 {
          color: rgba(55, 65, 81);
      }

      .dark .dark\:hover\:text-gray-100:hover {
          color: rgba(243, 244, 246);
      }

      .dark .dark\:hover\:text-gray-500:hover {
          color: rgba(59, 130, 246);
      }

      /* Custom style */
      .header-right {
          width: calc(100% - 3.5rem);
      }

      .sidebar:hover {
          width: 16rem;
      }

      @media only screen and (min-width: 768px) {
          .header-right {
              width: calc(100% - 16rem);
          }
      }


      /* Custom scrollbar styles */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: transparent; 
}

::-webkit-scrollbar-thumb {
    background-color:whitesmoke; /* bg-sky-900 with 70% opacity */
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background-color: rgba(7, 89, 133, 0.9); /* bg-sky-900 with 90% opacity on hover */
}
  </style>











<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
 <div x-data="setup()" :class="{ 'dark': isDark }">
 <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-700 dark:bg-gray-700 text-black dark:text-white">
<!-- Header -->
<div class="fixed w-full flex items-center justify-between h-14 bg-gray-800 dark:bg-gray-800 text-white z-10">
   <!-- Logo and Admin Info -->
   <div class="flex items-center pl-3 w-14 md:w-64 h-14 bg-gray-800 dark:bg-gray-800 border-none">
        <img id="admin-avatar" class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden cursor-pointer" src="../assets/img/preview.webp" alt="Admin Avatar" />
        <input type="file" id="file-input" style="display:none;" accept="image/*" />
        <span class="hidden md:block text-white">ADMIN</span>
    </div>


    <!-- Search and Actions -->
    <div class="flex items-center justify-between h-14 bg-gray-800 dark:bg-gray-800 header-right">
        <!-- Search Bar -->
        <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
            <button class="outline-none focus:outline-none">
                <i class="fas fa-search w-5 h-5 text-gray-600 cursor-pointer"></i>
            </button>
            <input type="search" placeholder="Search" class="w-full pl-3 text-sm text-black bg-transparent outline-none" />
        </div>
        
        <!-- Action Icons -->
        <ul class="flex items-center justify-end space-x-3">
        <!-- Logout -->
        <li>
            <a href="logout.php" class="flex items-center text-white px-10 hover:text-gray-100">
                <i class="fas fa-sign-out-alt w-5 h-5 mr-1"></i>
                Logout
            </a>
        </li>
    </ul>
    </div>
</div>
<!-- ./Header -->

<!-- Sidebar -->
<div class="fixed top-14 left-0 w-14 hover:w-64 md:w-64 z-50 bg-gray-900 dark:bg-gray-900 h-full text-white transition-all duration-300 z-10 sidebar">
    <div class="flex flex-col h-full">
        <!-- Sidebar Header -->
        <div class="px-5 py-4 hidden md:block text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>

        <!-- Sidebar Links -->
        <ul class="flex flex-col py-6 space-y-1 flex-grow">
            <li>
                <a href="dashboard.php" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800 <?php echo $current_page == 'dashboard.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fas fa-tachometer-alt w-5 h-6 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="leader_boad.php" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800 <?php echo $current_page == 'leader_boad.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-solid fa-trophy w-5 h-6 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Leader boad</span>
                </a>
            </li>
            <li>
                <a href="players.php" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800 <?php echo $current_page == 'players.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-solid fa-users w-5 h-5 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Users</span>
                    <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium text-gray-500 bg-indigo-50 rounded-full">New</span>
                </a>
            </li>
            <li>
                <a href="winning.php" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800 <?php echo $current_page == 'winning.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-solid fa-circle-dollar-to-slot w-5 h-5 text-xl"></i> 
                    <span class="ml-5 text-sm tracking-wide truncate">Winning</span>
                </a>
            </li>
            <li>
                <a href="gamingcount.php" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800 <?php echo $current_page == 'gamingcount.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-solid fa-gamepad w-5 h-5 text-xl"></i> 
                    <span class="ml-5 text-sm tracking-wide truncate">Game statistics</span>
                </a>
            </li>
            <li class="px-5 py-4 hidden md:block text-sm font-light tracking-wide text-gray-400 uppercase">Settings</li>
            <li>
                <a href="users.php"   class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800  <?php echo $current_page == 'referral.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-solid fa-sitemap w-5 h-5 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Referral</span>
                </a>
            </li>
            <li>
                <a href="payment_history.php"   class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800  <?php echo $current_page == 'payment_history.php' ? 'bg-gray-500 border-white' : ''; ?>">
                    <i class="fa-brands fa-hackerrank w-5 h-5 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Payment History</span>
                </a>
            </li>
            <li>
                <a href="#" class="relative flex items-center h-11 px-4 hover:bg-gray-800 dark:hover:bg-gray-600 text-white hover:text-white border-l-4 border-transparent hover:border-gray-500 dark:hover:border-gray-800">
                    <i class="fas fa-cog w-5 h-5 text-xl"></i>
                    <span class="ml-5 text-sm tracking-wide truncate">Settings</span>
                </a>
            </li>
        </ul>

        <!-- Sidebar Footer -->
        <div class="py-4 text-sm font-light text-gray-400">
            <a href="#" class="flex items-center justify-center text-white hover:text-gray-400 dark:hover:text-gray-500">
                <i class="fas fa-power-off w-5 h-5"></i>
            </a>
        </div>
    </div>
</div>
<!-- ./Sidebar -->







