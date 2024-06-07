<?php
if (isset($_SESSION['user']['Username'])) { ?>
<nav class="flex justify-center items-center bg-gradient-to-r from-gray-700 via-gray-600 to-gray-500 p-3">
    <div class="flex items-center space-x-3">
        <a href="/"><img src="../../public/images/logo2.png" alt="Logo" class="rounded-sm bg-gray-500 transition duration-500 ease-in-out transform hover:bg-gray-300 hover:scale-110 h-16 w-auto"></a>
        <a href="/project" class="text-white btn bg-gray-700 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-gray-600 hover:scale-110">
          Reservation</a>
        <a href="/calander" class="text-white btn bg-gray-700 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-gray-600 hover:scale-110">
          Calendar</a>
        <a href="/user/userSettings" class="text-white btn bg-gray-700 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-gray-600 hover:scale-110">
          User settings</a>
    </div>
</nav>
<?php } else { ?>
<nav class="flex justify-center items-center bg-gradient-to-r from-gray-400 via-gray-500 to-gray-300 p-3">
    <div class="flex items-center space-x-4">
        <a href="/"><img src="../../public/images/logo2.png" alt="Logo" class="rounded-md bg-gray-500 transition duration-500 ease-in-out transform hover:bg-gray-300 hover:scale-110 h-16 w-auto"></a>
        <a href="/user/register" class="text-white btn bg-gray-700 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-gray-600 hover:scale-110">Register</a>
        <a href="/user/login" class="text-white btn bg-gray-700 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-gray-600 hover:scale-110">Login</a>
    </div>
</nav>
<?php } ?>
