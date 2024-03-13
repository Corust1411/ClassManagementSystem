<?php include 'connectdatabase.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script type="module" src="./components.js"></script>
</head>

<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
    <div id="navbar-container"></div>
    <div id="sidenav-container"></div>

    <!-- end nav -->
    <main class="main-content ml-64 p-4">
        <div class="p-6 mt-16">
            <div class="">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white border border-gray-100 shadow-md p-6 rounded-md lg:col-span-2 w-full">
                        <div class="flex flex-col lg:flex-row justify-between mb-4 items-start">
                            <div class="mx-auto bg-white border rounded-md shadow-md w-full">
                                <?php

                                $course_id = $_GET['course_id'];
                                $sql = "SELECT * FROM course WHERE course_id = '$course_id' ";
                                $result = $db->query($sql);

                                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                ?>
                                    <div class="relative flex flex-col w-full">
                                        <img src="../Academic/system/imagecourse/<?= $row['course_image'] ?>" alt="Course Image" class="mb-4 rounded-md shadow-lg w-full h-52">


                                        <div class="flex flex-col items-start justify-end mb-4 gap-2 p-4 text-white border border-white bg-black bg-opacity-50">
                                            <h3 class="text-xl font-semibold">
                                                <?= $row['course_name'] ?>
                                            </h3>
                                            <!-- <p class="text-gray-700"><?= $row['course_description'] ?></p> -->
                                        </div>
                                        <div class="flex flex-col lg:flex-row items-center gap-4  justify-center w-full">

                                            <div class="flex flex-col justify-center self-start  border rounded-md border-grey gap-6 w-full lg:w-1/4 h-full">
                                                <div class="flex flex-col justify-center bg-white rounded-md shadow-lg p-6 w-full h-full">
                                                    <span class="text-lg font-semibold ">เพิ่มประกาศในชั้นเรียน</span>
                                                </div>
                                                <!-- Modal toggle -->
                                            </div>
                                            <div class="flex flex-col justify-center border rounded-md border-grey gap-6 w-full lg:w-3/4 h-full">
                                                <?php
                                                $course_id = $_GET['course_id'];
                                                $sql = "
    SELECT topic.topic_id, topic.topic_title, topic.topic_description, topic.material_id, topic.date_upload, topic.topic_file, topic.user_id, user.firstname, user.lastname, user.profile_picture, material.material_name
    FROM topic
    INNER JOIN user ON topic.user_id = user.user_id
    INNER JOIN material ON topic.material_id = material.material_id
    WHERE material.course_id = '$course_id'

    UNION

    SELECT assignment.assignment_id, assignment.assignment_title, assignment.description, assignment.material_id, assignment.start_date AS date_upload, assignment.file_attachment AS topic_file, assignment.user_id, user.firstname, user.lastname, user.profile_picture, material.material_name
    FROM assignment
    INNER JOIN user ON assignment.user_id = user.user_id
    INNER JOIN material ON assignment.material_id = material.material_id
    WHERE material.course_id = '$course_id'

    UNION

    SELECT quiz.quiz_id, quiz.title, quiz.description, quiz.file_attachment, quiz.start_date AS date_upload, null AS topic_file, quiz.teacher_id AS user_id, null AS firstname, null AS lastname, null AS profile_picture, material.material_name
    FROM quiz
    INNER JOIN material ON quiz.material_id = material.material_id
    WHERE material.course_id = '$course_id'

    ORDER BY date_upload DESC";


                                                $result = $db->query($sql);

                                                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                    $borderColor = ($row['topic_id'] !== null) ? '#FF0000' : '#17A7CE';

                                                    if ($row['material_name'] === 'Quiz') {
                                                        $link = "quizpage.php?quiz_id={$row['topic_id']}";
                                                    } elseif ($row['material_name'] === 'Assignment') {
                                                        $link = "assignmentpage.php?assignment_id={$row['topic_id']}";
                                                    } else {
                                                        $link = "topic.php?topic_id={$row['topic_id']}";
                                                    }
                                                ?>
                                                    <a href="<?= $link ?>" onclick="">

                                                        <div class="rounded-xl bg-white w-full ring-1 ring-<?= $borderColor ?> mb-6 mt-6">
                                                            <div class="flex flex-wrap p-6">
                                                                <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94]">
                                                                    <img src="../Academic/system/profilepictures/<?= $row['profile_picture'] ?>" class="rounded-full w-[40px] h-[40px]" />
                                                                </div>
                                                                <div class="px-4">
                                                                    <h2 class="dark:text-gray-900 text-2xl">
                                                                        <?= $row['firstname'] . ' ' . $row['lastname'] ?> POST :
                                                                        <?= $row['topic_title'] ?>
                                                                    </h2>
                                                                    <h3 class="text-gray-500 text-xl">
                                                                        <?= $row['date_upload'] ?>
                                                                    </h3>
                                                                    <h3 class="text-gray-500 text-xl">
                                                                        <?= $row['material_name'] ?>
                                                                    </h3>

                                                                </div>
                                                            </div>

                                                            <div role="separator" class="px-5 py-5">
                                                                <hr class="border-[#17A7CE]" />
                                                            </div>

                                                            <div class="">
                                                                <div class="py-2 px-5 pb-7">
                                                                    <p class="text-xl">
                                                                        <?= $row['topic_description'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php
                                                }
                                                ?>


                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>
    <script>
        function toggleFields() {
            var role = document.getElementById("category").value;
            var studentField = document.getElementById("studentField");
            var studentYearField = document.getElementById("studentYearField");
            var studentSecField = document.getElementById("studentSecField");
            var studentSemesterField = document.getElementById("studentSemesterField");
            var teacherSecField = document.getElementById("teacherSecField");
            var teacherField = document.getElementById("teacherField");
            var teacherYearField = document.getElementById("teacherYearField");

            studentField.style.display = "none";
            studentYearField.style.display = "none";
            studentSecField.style.display = "none";
            studentSemesterField.style.display = "none";
            teacherSecField.style.display = "none";
            teacherField.style.display = "none";
            teacherYearField.style.display = "none";

            if (role === "student") {
                studentField.style.display = "block";
                studentYearField.style.display = "block";
                studentSecField.style.display = "block";
                studentSemesterField.style.display = "block";
            } else if (role === "teacher") {
                teacherSecField.style.display = "block";
                teacherField.style.display = "block";
                teacherYearField.style.display = "block";
            }
        }

        function posttoggleFields() {
            var postrole = document.getElementById('postrole').value;
            var posttitleField = document.getElementById('posttitleField');
            var postcontentField = document.getElementById('postcontentField');
            var postfileField = document.getElementById('postfileField');
            var materialField = document.getElementById('materialField');
            var postmaterialField = document.getElementById('postmaterialField');

            posttitleField.style.display = "none";
            postcontentField.style.display = "none";
            postfileField.style.display = "none";
            materialField.style.display = "none";
            postmaterialField.style.display = "none";

            if (postrole === 'post') {
                posttitleField.style.display = "block";
                postcontentField.style.display = "block";
                postfileField.style.display = "block";
                postmaterialField.style.display = "block";
            } else if (postrole === 'material') {
                materialField.style.display = "block";

            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>