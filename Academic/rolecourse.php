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
                            <div class="mx-auto bg-white p-8 border rounded-md shadow-md w-full">
                                <h2 class="text-2xl font-semibold mb-6">เพิ่มสมาชิกในชั้นเรียน</h2>

                                <form action="../Academic/system/addselectcourse.php" method="POST" class="space-y-4"
                                    id="roleForm">
                                    <div class="mb-4">
                                        <label for="role" class="block text-sm font-medium text-gray-600">เลือกตำแหน่ง</label>
                                        <select id="role" name="category" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" onchange="toggleFields()">

                                            <option value="empty" selected>ยังไม่ได้เลือก</option>
                                            <option value="teacher">ผู้สอน</option>
                                            <option value="student">ผู้เรียน</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="course" class="block text-sm font-medium text-gray-600">เลือกชั้นเรียน</label>
                                        <select id="course" name="course" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                            <option value="empty">ยังไม่ได้เลือก</option> <?php
                                                                                            $sql = "SELECT * FROM course";
                                                                                            $result = $db->query($sql);

                                                                                            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                                                            ?>

                                                <option value=<?= $row['course_id'] ?>> <?= $row['course_name'] ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 hidden" id="studentField">
                                        <label for="faculty" class="block text-sm font-medium text-gray-600">เลือกห้อง</label>
                                        <select id="faculty" name="faculty" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                            <option value="empty">ยังไม่ได้เลือก</option> <?php
                                                                                            $sql = "SELECT * FROM faculty";
                                                                                            $result = $db->query($sql);

                                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                                                            ?>

                                                <option value=<?= $row['faculty_id'] ?>> <?= $row['faculty_name'] ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-4 hidden" id="studentsectionField">
                                        <label for="section" class="block text-sm font-medium text-gray-600">กลุ่มเรียน</label>
                                        <input type="text" id="section" name="section" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" >
                                    </div>
                                    <div class="mb-4 hidden" id="teachersectionField">
                                        <label for="section" class="block text-sm font-medium text-gray-600">กลุ่มเรียน</label>
                                        <input type="text" id="section" name="section" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" >
                                    </div>

                                    <div class="mb-4 hidden" id="semesterField">
                                        <label for="semester" class="block text-sm font-medium text-gray-600">เทอม</label>
                                        <input type="number" id="semester" name="semester" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" >
                                    </div>

                                    <div class="mb-6 hidden" id="studentyearField">
                                        <label for=" year" class="block text-sm font-medium text-gray-600">ชั้นปี</label>
                                        <input type="number" id="year" name="year" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" >
                                    </div>
                                    <div class="mb-6 hidden" id="teacheryearField">
                                        <label for=" year" class="block text-sm font-medium text-gray-600">ชั้นปี</label>
                                        <input type="number" id="year" name="year" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" >
                                    </div>
                                    <div class="mb-6 hidden" id="teacherField">
                                        <label for="teacher" class="block text-sm font-medium text-gray-600">รายชื่อผู้สอน</label>
                                        <?php
                                     
                                        $sql = "SELECT * FROM teacher INNER JOIN user ON teacher.user_id = user.user_id";
                                        $result = $db->query($sql);

                                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                            ?>
                                            <input type="checkbox" class="text-white" name="teacher_id[]"
                                                value="<?= $row['teacher_id'] ?>"
                                                id="<?= $row['firstname'] . $row['lastname'] ?>">
                                            <label class="text-gray-600" for="<?= $row['firstname'] . $row['lastname'] ?>">
                                                <?= $row['firstname'] . ' ' . $row['lastname'] ?>
                                            </label><br>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <button type="submit" class="w-full bg-[#f84525] text-white p-2 rounded-md hover:bg-[#f82525] focus:outline-none">ดำเนินการ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <script type="module" src="component.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function toggleFields() {
            var role = document.getElementById('role').value;
            var studentField = document.getElementById('studentField');
            var studentsectionField = document.getElementById('studentsectionField');
            var studentyearField = document.getElementById('studentyearField');
            var teachersectionField = document.getElementById('teachersectionField');
            var teacheryearField = document.getElementById('teacheryearField');
            var semesterField = document.getElementById('semesterField');
            var teacherField = document.getElementById('teacherField');


            studentField.style.display = 'none';
            semesterField.style.display = 'none';
            studentsectionField.style.display = 'none';
            studentyearField.style.display = 'none';
            teacherField.style.display = 'none';
            teachersectionField.style.display = 'none';
            teacheryearField.style.display = 'none';

            if (role === 'student') {
                studentField.style.display = 'block';
                semesterField.style.display = 'block';
                studentsectionField.style.display = 'block';
                studentyearField.style.display = 'block';
                teacherField.style.display = 'none';
                teachersectionField.style.display = 'none';
                teacheryearField.style.display = 'none';
            } else if (role === 'teacher') {
                studentField.style.display = 'none';
                semesterField.style.display = 'none';
                studentsectionField.style.display = 'none';
                studentyearField.style.display = 'none';
                teacherField.style.display = 'block';
                teachersectionField.style.display = 'block';
                teacheryearField.style.display = 'block';
            }


        }
    </script>
</body>

</html>