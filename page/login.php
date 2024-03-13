<?php
session_start();
if (isset($_SESSION["Error"])) {
    $error_message = $_SESSION["Error"];
    unset($_SESSION["Error"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>
        @keyframes bgAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-r from-cyan-400 to-blue-400 relative overflow-hidden h-screen">
    <div class="absolute inset-0 z-0 bg-gradient-to-r from-cyan-400 to-blue-400 animate-bgAnimation"></div>
    <div class="z-10 flex items-center justify-center h-full">
        <div class="h-fit bg-white rounded-2xl p-8 shadow-md max-w-md w-full z-10">
            <div class="h-fit p-2 pl-0 mb-5">
                <h1 class="text-3xl justify-center font-bold">เข้าสู่ระบบ</h1>
            </div>
            <div>
            <form action="../system/logincheck.php" method="POST">
                <label for="email">
                    <h1>อีเมล: </h1>
                </label>
                <!-- Adding "rounded-full" class to make the input round -->
                <input type="text" name="email" class="w-full mb-5 rounded-full" id="email">
                <label for="password">
                    <h1>รหัสผ่าน: </h1>
                </label>
                <!-- Changing "text" type to "password" to hide the letters and adding "rounded-full" class -->
                <input type="password" name="password" class="w-full rounded-full" id="password"><br>
                <button type="submit" class="mt-8 p-3 bg-cyan-300 rounded-xl">ยืนยัน</button>
            </form>
            </div>
        </div>

</body>

</html>