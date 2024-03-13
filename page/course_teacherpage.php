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
                                                    <span class="text-lg font-semibold ">Add An Announcement</span>

                                                    <button data-modal-target="crud-modal-post" data-modal-toggle="crud-modal-post" class="block text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                        Add Lesson
                                                    </button>

                                                    <div id="crud-modal-post" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                        Add Lesson
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-post">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <form class="p-4 md:p-5 space-y-4" id="lessonForm" action="../Academic/system/addmaterial.php?course_id=<?= $course_id ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="col-span-2">
                                                                        <label for="postrole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                                                        <select id="postrole" name="postrole" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" onchange="posttoggleFields()">
                                                                            <option value="" disabled selected>Select Type
                                                                            </option>
                                                                            <option value="material">Material</option>
                                                                            <option value="post">Post</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-4 hidden" id="postmaterialField">
                                                                        <label for="lessonTitle" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson
                                                                            Material</label>
                                                                        <select id="postmaterial" name="postmaterial" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                            <option value="">Select a material</option>
                                                                            <?php
                                                                            $course_id1 = $_GET['course_id'];
                                                                            $sql = "SELECT * FROM material WHERE course_id = $course_id1 AND material_name != 'Quiz' AND material_name != 'Assignment'";
                                                                            $result = $db->query($sql);

                                                                            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                                                echo '<option value="' . $row['material_id'] . '">' . $row['material_name'] . '</option>';
                                                                            }
                                                                            ?>

                                                                        </select>



                                                                    </div>

                                                                    <div class="mb-4 hidden" id="posttitleField">
                                                                        <label for="lessonTitle" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson
                                                                            Title</label>
                                                                        <input type="text" id="lessonTitle" name="lessonTitle" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>

                                                                    <div class="mb-4 hidden" id="postcontentField">
                                                                        <label for="lessonContent" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson
                                                                            Content</label>
                                                                        <textarea id="lessonContent" name="lessonContent" class="input-field h-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                                    </div>

                                                                    <div class="mb-4 hidden" id="postfileField">
                                                                        <label for="lessonFile" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson
                                                                            File</label>
                                                                        <input type="file" id="lessonFile" name="lessonFile" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>

                                                                    <!-- <div class="grid grid-cols-2 gap-4 hidden" id="postfileField">

                                                                        <label for="lessonFile" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson File</label>
                                                                        <input type="file" id="lessonFile" name="lessonFile" accept=".pdf, .epub" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                                                    </div> -->

                                                                    <div class="mb-4 hidden" id="materialField">
                                                                        <label for="materialname" class="block text-sm font-medium text-white dark:text-white">Material</label>
                                                                        <input type="text" id="materialname" name="materialname" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>

                                                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        Submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button data-modal-target="crud-modal-assignment" data-modal-toggle="crud-modal-assignment" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-8 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                        Add Assignments
                                                    </button>

                                                    <div id="crud-modal-assignment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                        Add Assignments
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-assignment">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <form class="p-4 md:p-5 space-y-4" id="assignForm" action="../Academic/system/addassignment.php?course_id=<?= $course_id ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="col-span-2">
                                                                        <label for="assignTitle" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                            Title</label>
                                                                        <input type="text" id="assignTitle" name="assignTitle" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>

                                                                    <div class="mb-4" id="desAssign">
                                                                        <label for="assignDescription" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                            Description</label>
                                                                        <textarea id="assignDescription" name="assignDescription" class="input-field h-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                                    </div>

                                                                    <div class="mb-4" id="fileAssign">
                                                                        <label for="assignFile" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                            File</label>
                                                                        <input type="file" id="assignFile" name="assignFile" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>
                                                                    <div class="mb-4 grid lg:grid-cols-2 gap-2 grid-cols-1" id="dateAssign">
                                                                        <div>
                                                                            <label for="assignDate" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                                Date Due</label>
                                                                            <input type="date" id="assignDate" name="assignDate" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                        </div>
                                                                        <div>
                                                                            <label for="assignTime" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                                Time Due</label>
                                                                            <input type="time" id="assignTime" name="assignTime" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-4  " id="scoreField">
                                                                        <label for="totalscore" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                                                                            Score</label>
                                                                        <input type="text" id="assignscore" name="assignscore" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>
                                                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        Submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="regquiz.php" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-8 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Add Quiz
                                                    </a>



                                                </div>
                                                <!-- Modal toggle -->


                                            </div>
                                            <div class="flex flex-col justify-center border rounded-md border-grey gap-6 w-full lg:w-3/4 h-full">
                                                <?php
                                                $course_id = $_GET['course_id'];

                                                $sql = "(SELECT topic.topic_id, topic.topic_title, topic.topic_description, topic.material_id, topic.date_upload, topic.topic_file, topic.user_id, user.firstname, user.lastname, user.profile_picture, material.material_name
                                                        FROM topic
                                                        INNER JOIN user ON topic.user_id = user.user_id
                                                        INNER JOIN material ON topic.material_id = material.material_id
                                                        WHERE material.course_id = '$course_id')
                                                        UNION
                                                        (SELECT assignment.assignment_id, assignment.assignment_title, assignment.description, assignment.material_id, assignment.start_date AS date_upload, assignment.file_attachment AS topic_file, assignment.user_id, user.firstname, user.lastname, user.profile_picture, material.material_name
                                                        FROM assignment
                                                        INNER JOIN user ON assignment.user_id = user.user_id
                                                        INNER JOIN material ON assignment.material_id = material.material_id
                                                        WHERE material.course_id = '$course_id')
                                                        UNION
                                                        (SELECT quiz.quiz_id, quiz.title, quiz.description, quiz.file_attachment, quiz.start_date AS date_upload, null AS topic_file, quiz.teacher_id AS user_id, null AS firstname, null AS lastname, null AS profile_picture, material.material_name
                                                        FROM quiz
                                                        INNER JOIN material ON quiz.material_id = material.material_id
                                                        WHERE material.course_id = '$course_id')
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
                                                    // Use $row['column_name'] to access the column values
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

                                    mysqli_close($conn) ?>
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
    <script type="module" src="components.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>