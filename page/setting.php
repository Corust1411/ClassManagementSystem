<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';

if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
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

</head>


<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
    <!-- end nav -->

    <div id="sidenav-container"></div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        <div id="navbar-container"></div>
        <div class="flex justify-center items-center mt-40 w-full">
            <!-- class display -->
            <div class="flex flex-col justify-center self-center gap-6 mb-6 mx-auto w-2/3">
                <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM user WHERE user_id = $user_id";
                $result = $db->query($sql);

                if ($result) {
                    $row = $result->fetchArray(SQLITE3_ASSOC);
                ?>
                    <div class="flex flex-col w-full">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <div class="border-b flex  border-gray-200 pb-4 mb-4">
                                <h2 class="text-lg font-semibold">ตั้งค่าโปรไฟล์</h2>
                                <img class="w-8 h-8 rounded-full ml-8" src="../Academic/system/profilepictures/<?= $row['profile_picture'] ?>" alt="Profile Image" />
                            </div>
                            <div class="text-sm text-gray-700">
                                <p class="mb-2"><strong>ไอดี:</strong>
                                    <?php echo $row['user_id']; ?>
                                </p>
                                <p class="mb-2"><strong>ชื่อจริง:</strong>
                                    <?php echo $row['firstname']; ?>
                                </p>
                                <p class="mb-2"><strong>ชื่อเล่น:</strong>
                                    <?php echo $row['lastname']; ?>
                                </p>
                                <p class="mb-2"><strong>อีเมล:</strong>
                                    <?php echo $row['email']; ?>
                                </p>
                                <p class="mb-2"><strong>รหัสผ่าน:</strong>
                                    <?php echo $row['password']; ?>
                                </p>
                                <p class="mb-2"><strong>วัน/เดือน/ปี เกิด:</strong>
                                    <?php echo $row['dob']; ?>
                                </p>
                                <p class="mb-2"><strong>เพศ:</strong>
                                    <?php echo $row['gender']; ?>
                                </p>
                                <p class="mb-2"><strong>เบอร์ติดต่อ:</strong>
                                    <?php echo $row['phonenum']; ?>
                                </p>
                                <p class="mb-2"><strong>ตำแหน่ง:</strong>
                                    <?php echo $row['role']; ?>
                                </p>
                                <!-- Add other user information fields as needed -->
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    echo "No user found!";
                }
                ?><button data-modal-target="crud-modal-assignment" data-modal-toggle="crud-modal-assignment" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-8 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    แก้ไขโปรไฟล์
                </button>

                <div id="crud-modal-assignment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    แก้ไขโปรไฟล์
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-assignment">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">ปิด</span>
                                </button>
                            </div>
                            <form class="p-4 md:p-5 space-y-4" id="assignForm" action="../system/editprofile.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-4" id="fileAssign">
                                    <label for="picture" class="block text-sm font-medium text-gray-900 dark:text-white">เปลี่ยนรูปโปรไฟล์</label>
                                    <input type="file" id="picture" name="picture" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>

                                <div class="mb-4  " id="password">
                                    <label for="oldpassword" class="block text-sm font-medium text-gray-900 dark:text-white">ใส่รหัสเก่า</label>
                                    <input type="text" id="oldpassword" name="oldpassword" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>

                                <div class="mb-4  " id="password">
                                    <label for="totalscore" class="block text-sm font-medium text-gray-900 dark:text-white">ใส่รหัสใหม่</label>
                                    <input type="text" id="newpassword" name="newpassword" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    ยืนยัน
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </main>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script type="module" src="./components.js"></script>

</html>