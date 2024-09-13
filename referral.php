<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Entry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
</head>

<body class="bg-sky-950 min-h-screen flex flex-col items-center justify-center overflow-hidden">
    <div class="h-full mt-2 mb-2 flex-grow flex flex-col justify-center items-center p-6 relative ">
        <div class="celebration"></div>

        <div class="container mx-auto text-center mb-4">
            <!-- Logo and Title -->
            <img src="./assets/img/LC-logo1.png" alt="Chess Logo" class="w-32 h-auto mx-auto mb-4">
            <div class="flex justify-center items-center mb-4">
                <span class="text-white font-bold text-4xl">LEAD</span>
                <span class="text-yellow-600 font-bold text-4xl">CHESS</span>
            </div>

            <!-- Header Section -->
            <header class="text-center mb-2">
                <h1 class="text-xl lg:text-2xl font-bold text-white">Enter Your Email to Complete Installation</h1>
                <!-- <p class="text-xl font-semibold text-white mt-4">Congratulations on reaching this step!</p> -->
            </header>

            <form id="ip-form" action="backend/referral/referral_store.php" method="POST" class="space-y-6 mt-4 flex flex-col items-center justify-center">
    <!-- Hidden Referral Code Input -->
    <input type="hidden" id="referral_code" name="referral_code" value="<?php echo htmlspecialchars(isset($_GET['code']) ? $_GET['code'] : ''); ?>">

    <!-- Email Input -->
    <div class="max-w-md mx-auto">
        <div class="relative w-full max-w-sm min-w-[200px] mt-2">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-slate-400"></i>
            </div>
            <input
                id="email"
                name="email"
                type="email"
                class="peer w-full h-10 bg-transparent text-white text-sm border border-slate-200 rounded pl-10 pr-10 py-2 transition focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                placeholder="e.g., yourname@example.com"
                required
            />
            <label for="email" class="absolute left-10 top-2.5 text-gray-900 text-sm transition-all peer-placeholder-shown:text-sm peer-focus:text-xs peer-focus:-top-6 peer-focus:scale-90">
            
            </label>
        </div>
    </div>

    <!-- Submit Button -->
    <div>
        <button type="submit" class="bg-white text-green-700 font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out">
            Install now <i class="fa-solid fa-cloud-arrow-down text-green-600"></i>
        </button>
    </div>
</form>


        </div>
    </div>

   

</body>

</html>
