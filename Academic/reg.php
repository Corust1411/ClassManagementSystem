<?php include 'connectdatabase.php';
// class MyDB extends SQLite3
// {
//     function __construct()
//     {
//         $this->open('../Academic/database/education.db');
//     }
// }
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
                                <h2 class="text-2xl font-semibold mb-6">สมัครบัญชีเพิ่ม</h2>

                                <form action="../Academic/system/adduser.php" method="POST" class="space-y-4" enctype="multipart/form-data">

                                    <div class="mb-4">
                                        <label for="role" class="block text-sm font-medium text-gray-600">เลือกตำแหน่ง</label>
                                        <select id="role" name="role" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" onchange="toggleFaculty()">
                                            <option value="empty" selected>ยังไม่ได้เลือก</option>
                                            <option value="teacher">ผู้สอน</option>
                                            <option value="student">ผู้เรียน</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="firstname" class="block text-sm font-medium text-gray-600">ชื่อจริง</label>
                                        <input type="text" id="firstname" name="firstname" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="lastname" class="block text-sm font-medium text-gray-600">นามสกุล</label>
                                        <input type="text" id="lastname" name="lastname" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-600">อีเมล</label>
                                        <input type="text" id="email" name="email" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="dob" class="block text-sm font-medium text-gray-600">วัน/เดือน/ปี เกิด</label>
                                        <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="gender" class="block text-sm font-medium text-gray-600">เพศ</label>
                                        <select id="gender" name="gender" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                            <option value="empty" selected>ยังไม่ได้เลือก</option>
                                            <option value="male">ชาย</option>
                                            <option value="female">หญิง</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="phonenum" class="block text-sm font-medium text-gray-600">เบอร์ติดต่อ</label>
                                        <input type="tel" id="phonenum" name="phonenum" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" required>
                                    </div>
                                    <div class="mb-4 hidden" id="facultyContainer">
                                        <label for="faculty" class="block text-sm font-medium text-gray-600">เลือกห้อง</label>
                                        <select id="faculty" name="faculty" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                            <option value="empty" selected>ยังไม่ได้เลือก</option>
                                            <?php
                                            // $db = new MyDB();
                                            $sql = "SELECT * FROM faculty";
                                            $result = $db->query($sql);

                                            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                                                echo '<option value="' . $row['faculty_id'] . '">' . $row['faculty_name'] . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>


                                    <div class="mb-4">
                                        <label for="profile_picture" class="block text-sm font-medium text-gray-600">รูปโปรไฟล์:</label>
                                        <div class="mt-1 flex items-center">
                                            <input type="file" name="profile_picture" id="profile_picture" class="hidden">
                                            <label for="profile_picture" id="file-label" class="cursor-pointer bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">
                                                เลือกอัพโหลดรูป
                                            </label>
                                            <span class="ml-2" id="file-name">ใส่รูปที่ต้องการ</span>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full bg-[#f84525] text-white p-2 rounded-md hover:bg-[#f82525] focus:outline-none">สร้างบัญชี</button>
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
        const fileInput = document.getElementById('profile_picture');
        fileInput.addEventListener('change', function() {
            const fileName = this.files[0].name;
            const fileLabel = document.getElementById('file-label');
            const fileText = document.getElementById('file-name');

            if (fileName) {
                fileLabel.innerText = 'File uploaded';
                fileText.innerText = fileName;
            } else {
                fileLabel.innerText = 'Choose File';
                fileText.innerText = 'No file selected';
            }
        });

        function toggleFaculty() {
            var roleSelect = document.getElementById("role");
            var facultyContainer = document.getElementById("facultyContainer");

            if (roleSelect.value === "student") {
                facultyContainer.classList.remove("hidden");
            } else {
                facultyContainer.classList.add("hidden");
            }
        }
    </script>
</body>

</html>