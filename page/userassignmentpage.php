<?php include 'connectdatabase.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="style.css" rel="stylesheet">
    <title>Admin Panel</title>


</head>

<body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div id="sidenav-container"></div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        <div id="navbar-container"></div>
        <div class="p-6 mt-40">
            <div class="">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white border border-gray-100 shadow-md p-6 rounded-md lg:col-span-2 w-full">
                        <div class="flex flex-col lg:flex-row justify-between mb-4 items-start">
                            <div class="mx-auto bg-white p-8 border rounded-md shadow-md w-full">
                                <h2 class="text-2xl font-semibold mb-6">Assignment Page</h2>
                                <div class="flex flex-col lg:flex-row items-center gap-4  justify-center w-full">
                                    <div class="flex flex-col justify-center border rounded-md border-grey gap-6 w-full self-start lg:w-3/4 h-full">
                                        <div class="flex p-4 bg-white rounded-3xl w-full self-start">
                                            <!-- Icon Container -->
                                            <div class="bg-[#136C94] rounded-full w-20 h-20 flex items-center justify-center">
                                                <svg class="w-16 h-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13c-2.8-.8-4.7-1-8-1a1 1 0 0 0-1 1v11c0 .6.5 1 1 1 3.2 0 5 .2 8 1m0-13c2.8-.8 4.7-1 8-1 .6 0 1 .5 1 1v11c0 .6-.5 1-1 1-3.2 0-5 .2-8 1" />
                                                </svg>
                                            </div>

                                            <div class="flex flex-col w-full ml-4">
                                                <?php

                                                if (isset($_GET['assignment_id'])) {
                                                    $assignment_id = $_GET['assignment_id'];

                                                    $sql = "SELECT assignment.*, user.firstname, user.lastname 
                                                            FROM assignment 
                                                            INNER JOIN user ON assignment.user_id = user.user_id 
                                                            WHERE assignment.assignment_id = '$assignment_id'";

                                                    $result = $db->query($sql);

                                                    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                ?>
                                                        <div class="w-full">
                                                            <h1 class="text-[#136C94] text-3xl px-4 pt-2">
                                                                <?= $row['assignment_title'] ?>
                                                            </h1>

                                                            <h2 class="text-gray-600 text-base px-4 pt-1 pb-2">
                                                                <?= $row['firstname'] . ' ' . $row['lastname'] ?>
                                                            </h2>

                                                            <hr class="border-[#17A7CE] px-4">

                                                            <div class="px-4 mt-2">
                                                                <a href="../Academic/system/assignmentfile/<?= $row['file_attachment'] ?>" target="_blank" class="text-[#17A7CE] hover:underline" alt="<?= $row['file_attachment'] ?>">Read Assignment</a>
                                                                <p class="text-xl text-gray-900 mt-2">
                                                                    <?= $row['description'] ?>
                                                                </p>
                                                            </div>
                                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center self-start  border rounded-md border-grey gap-6 w-full lg:w-1/4 h-full">
                                        <form class="" id="addsubmit" action="../Academic/system/addsubmission.php?assignment_id=<?= $row['assignment_id'] ?>" method="POST" enctype="multipart/form-data">

                                            <div class="flex flex-col justify-center self-start bg-white rounded-md shadow-lg p-6 w-full h-full">
                                                <div class="flex justify-between">
                                                    <span class="text-[#17A7CE] text-left text-2xl">งานของฉัน</span>
                                                    <span class="text-[#17A7CE] text-left text-sm mt-2">status</span>
                                                </div>
                                                <div class="mt-4">
                                                    <input type="file" name="assignmentfile" id="assignmentfile" class="bg-[#17A7CE] text-white flex w-full px-4 py-2.5 rounded-md cursor-pointer hover:bg-blue-800 transition duration-300 " require>
                                                </div>

                                                <div class="w-full mt-4">
                                                    <div class="flex w-full px-4">
                                                        <button type="submit" id="submitBtn" class="w-full bg-[#17A7CE] text-white h-[50px] rounded-lg hover:bg-blue-800 transition duration-300">
                                                            <!-- <h1 class="text-white text-2xl">ส่งงาน</h1> -->ส่งงาน
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="" id="lessonForm" action="../Academic/system/deleteattemp.php?course_id=<?= $course_id ?>" method="POST" enctype="multipart/form-data">
                                            <div class="w-full mt-4">
                                                <div class="flex w-full px-4 ">
                                                    <button type="reset" id="cancle" onclick="cancleUpload()" class="w-full border-4 h-[50px] border-gray-200 rounded-lg hover:bg-gray-200">
                                                        <h1 class="text-gray-400 text-2xl ">ยกเลิกการส่ง</h1>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php
                                                    }
                                                } else {
                                                    // else what?
                                                }
                    ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </main>
    <script type="module" src="components.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        function cancelUpload() {

            document.getElementById('assignmentfile').value = '';
            alert('File upload canceled');
        }
    </script>


</body>

</html>