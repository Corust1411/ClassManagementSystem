<?php include 'connectdatabase.php';

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
        <div class="p-6">
            <div class="">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white border border-gray-100 shadow-md p-6 rounded-md lg:col-span-2 w-full">
                        <div class="flex flex-col lg:flex-row justify-between mb-4 items-start">
                            <div class="mx-auto bg-white p-8 border rounded-md shadow-md w-full justify-center">
                                <h2 class="text-2xl font-semibold mb-6">ชั้นเรียน</h2>
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 mx-auto">
                                    <?php

                                    $sql = "SELECT * FROM course ORDER BY course_id DESC";
                                    $result = $db->query($sql);

                                    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                    ?>
                                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 hover:border-red-700">
                                            <a href="coursepage.php?course_id=<?= $row['course_id'] ?>">
                                                <img src="../Academic/system/imagecourse/<?= $row['course_image'] ?>" class="w-full max-w-96 max-h-96 h-60">

                                                <div class="p-5 flex flex-col">
                                                    <div>
                                                        <a href="#">
                                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                                <?= $row['course_name'] ?>
                                                            </h5>
                                                        </a>
                                                        <p class="mb-3 font-normal md:text-base text-xs text-gray-700 dark:text-gray-400">
                                                            <?= $row['course_description'] ?>
                                                        </p>
                                                    </div>


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
            </div>
        </div>


    </main>
    <script type="module" src="component.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var toggleFormsInitialized = false;

        function toggleForms() {
            var role = document.getElementById('role').value;
            var studentFields = document.getElementById('studentFields');
            var teacherFields = document.getElementById('teacherFields');
            console.log(role);

            if (role === 'empty') {
                studentFields.style.display = 'none';
                teacherFields.style.display = 'none';
            } else if (role === 'student') {
                studentFields.style.display = 'block';
                teacherFields.style.display = 'none';
            } else if (role === 'teacher') {
                studentFields.style.display = 'none';
                teacherFields.style.display = 'block';
            }
        }



        function redirectToCoursePage(courseId) {
            var url = 'coursepage.php?course_id=' + (courseId + 4);
            window.location.href = url;
        }
    </script>



</body>

</html>