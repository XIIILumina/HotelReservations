<?php
if (isset($_SESSION['user']['Username'])) 
{ ?>
<nav class="flex justify-between bg-gradient-to-r from-gray-400 from-10% via-gray-500 via-30% to-gray-300 to-90%  p-3">
    <div>
    <a href="/"><img src="../../public/images/logo2.png" alt="Logo" class="  rounded-md bg-gray-500 transition duration-500 ease-in-out transform hover:bg-gray-300 hover:scale-110 h-16 w-auto inline-block"></a>
    </div>
    <div>
      <a href="/project" class="text-black mx-2 btn inline-block bg-blue-100 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-blue-500 hover:scale-110">Projects</a>
      <a href="/calander" class="text-black mx-2 btn inline-block bg-blue-100 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-blue-500 hover:scale-110">Calander</a>
      <a href="/user/userSettings" class="text-black mx-2 btn inline-block bg-blue-100 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-blue-500 hover:scale-110">User settings</a>
    </div>
</nav>
<?php }else{?>
  <nav class="flex justify-between bg-gradient-to-r from-blue-300 from-10% via-blue-100 via-30% to-blue-300 to-90%  p-3">
    <div>
    <a href="/"><img src="../../public/images/logo2.png" alt="Logo" class="  rounded-md bg-gray-500 transition duration-500 ease-in-out transform hover:bg-gray-300 hover:scale-110 h-16 w-auto inline-block "></a>
    </div>
    <div>
      <a href="/user/register" class="text-black mx-2 btn inline-block bg-blue-100 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-blue-500 hover:scale-110">Register</a>
      <a href="/user/login" class="text-black mx-2 btn inline-block bg-blue-100 font-bold py-2 px-4 rounded transition duration-500 ease-in-out transform hover:bg-blue-500 hover:scale-110">Login</a>
    </div>
</nav>

<?php } ?>