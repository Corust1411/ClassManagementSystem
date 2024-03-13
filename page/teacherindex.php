<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';
if (!isset($_SESSION['login'])) {
    header("Location: ./login.php");
    exit();
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
    <div id="navbar-container"></div>
    <div id="sidenav-container"></div>

    <div class="mt-20 ml-60">
        <!-- main page -->
        <div class="grid grid-cols-2 gap-10 p-10 ">

            <!-- profile -->
            <div class="bg-[#136C94] w-full h-full rounded-2xl">
                <div class="flex justify-center mt-10">
                    <!-- user img -->
                    <div class="py-4 w-80 h-80 bg-gray-900 mb-8 rounded-full overflow-hidden">
                        <?php

                        $user_id = $_SESSION["user_id"];
                        $role = $_SESSION["role"];
                        $sql = "SELECT * FROM user WHERE role = '$role' and user_id = $user_id";
                        $result = $db->query($sql);
                        $row = $result->fetchArray(SQLITE3_ASSOC);
                        ?>
                        <img class="w-full h-full object-cover" src="../Academic/system/profilepictures/<?= $row['profile_picture'] ?>" alt="Profile Image" />
                    </div>

                </div>

                <div class="text-center mb-10 text-[#FEFF86]">
                    <h1 class="text-3xl py-2">
                        <?= $row['firstname'] . " " . $row['lastname'] ?>
                    </h1>
                    <h2 class="text-2xl py-2">
                        <?= $row['user_id'] ?>
                    </h2>
                    <h3 class="text-xl py-2">
                        <?= $row['email'] ?>
                    </h3>
                    <h4 class="text-lg py-2">
                        <?= $row['role'] ?>
                    </h4>
                </div>
            </div>
            <!-- classes & calendar -->
            <div class="grid grid-rows-3 gap-2 w-full h-full rounded-2xl">

                <!-- class -->
                <div class="grid grid-cols-2">
                    <div class="lg:w-1/2">
                        <h1 class="text-3xl text-gray-900">ชั้นเรียนของฉัน</h1>
                    </div>

                    <div class="lg:w-1/2 flex justify-end">
                        <a href="teacherclasses.php" class="flex text-2xl text-[#136C94]">ดูชั้นเรียนทั้งหมด
                            <svg class="w-10 h-10 text-gray-800 dark:text-[#136C94]" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-2 col-span-2 grid-rows-2  py-4 gap-5 w-full max-h-64">
                        <?php
                        // var_dump($_SESSION);
                        $teacher_id = $_SESSION['teacher_id'];
                        $sql = "SELECT * FROM teacher_subject 
                                INNER JOIN course ON course.course_id = teacher_subject.course_id
                                INNER JOIN teacher ON teacher.teacher_id = teacher_subject.teacher_id
                                INNER JOIN user ON user.user_id = teacher.user_id
                                WHERE teacher_subject.teacher_id = $teacher_id";

                        $result = $db->query($sql);

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                        ?>
                            <div class="flex py-4 gap-5 w-full max-h-64">
                                <a href="course_teacherpage.php?course_id=<?= $row['course_id'] ?>" class="hover:ring-4 ring-white rounded-md w-full">
                                    <div id="class1" class="w-full bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                                        <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">
                                            <?php echo $row['course_name']; ?>
                                        </h1>
                                        <p class="text-l p-3 text-gray-600">
                                            <?php echo $row["firstname"] . $row["firstname"]; ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script type="module" src="./components.js"></script>
</body>

</html>