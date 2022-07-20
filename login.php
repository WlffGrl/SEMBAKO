<?php
session_start();
if(isset($_SESSION['logged'])){
    header("location: home.php");
    die();
}

?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
    <section class="flex justify-center items-center h-screen bg-gray-800">
    <form class="max-w-md w-full bg-gray-900 rounded p-6 space-y-4" action="login_check.php" method="POST">

    <div class="max-w-md w-full bg-gray-900 rounded p-6 space-y-4">
        <div class="mb-4">
            <h2 class="text-xl text-center font-bold text-white">Login to dashboard</h2>
        </div>
        <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" name="username" type="text" placeholder="Username">
        </div>
        <div>
            <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" name="password" type="password" placeholder="Password">
        </div>
        <?php
            if(isset($_GET['error'])){
                switch($_GET['error']){
                    case '1':
                        echo '<p class="text-red-600">Error, username atau password tidak boleh kosong!</p>';
                        break;
                    case '2':
                        echo '<p class="text-red-600">Error, username atau password salah!</p>';
                        break;
                    default:
                    break;
                }
            }
        ?>
        <div>
            <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200">Sign In</button>
        </div>
    </div>
    </form>
    </section>
</body>
</html>