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
        <!-- end navbar -->

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2 w-full">
                <div class="flex justify-between mb-4 items-start">
                            <select id="role" name="category" class="mt-1 p-2 border rounded-md focus:outline-none focus:border-blue-500" onchange="redirectPage()">
                                <option value="all">แสดงผู้ใช้ทั้งหมด</option>
                                <option value="student" >แสดงเฉพาะผู้เรียน</option>
                                <option value="teacher">แสดงเฉพาะผู้สอน</option>
                                <option value="academic" selected>แสดงเฉพาะวิชาการ</option>
                            </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-collapse border-2">
                            <thead>
                                <tr>
                                    <th class="border p-1">ไอดี</th>
                                    <th class="border p-1">ชื่อจริง</th>
                                    <th class="border p-1">นามสกุล</th>
                                    <th class="border p-1">อีเมล</th>
                                    <th class="border p-1">วันเดือนปีเกิด</th>
                                    <th class="border p-1">เพศ</th>
                                    <th class="border p-1">เบอร์ติดต่อ</th>
                                    <th class="border p-1">ตำแหน่ง</th>
                                    <!-- <th class="border p-1">Profile Image</th> -->
                                </tr>
                            </thead>
                            <div class="all-user">



                                <tbody>
                                    <?php
                                   
                                    $sql_user = "SELECT * FROM `user` WHERE `role` = 'academic'";
                                    $result_user = $db->query($sql_user);

                                    while ($row = $result_user->fetchArray(SQLITE3_ASSOC)) {
                                        echo "<tr>";
                                        echo "<td class='border p-1'>" . $row['user_id'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['firstname'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['lastname'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['email'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['dob'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['gender'] . "</td>";
                                        echo "<td class='border p-1'>" . $row['phonenum'] . "</td>";
                                        echo "<td class='border p-1'>";
                                        if ($row['role'] == 'academic') {
                                            echo "<span class='mr-1 text-green-500 font-medium'>academic</span>";
                                        } else if ($row['role'] == 'student') {
                                            echo "<span class='mr-1 text-blue-500 font-medium'>student</span>";
                                        } else if ($row['role'] == 'teacher') {
                                            echo "<span class='mr-1 text-red-500 font-medium'>teacher</span>";
                                        }
                                        echo "</td>";
                                        // echo "<td class='border p-1'>" . $row['profile_picture'] . $row['profile_picture'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </div>
                        </table>
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
        function redirectPage() {
            var selectedValue = document.getElementById("role").value;
            switch (selectedValue) {
                case "student":
                    window.location.href = "showstudent.php";
                    break;
                case "teacher":
                    window.location.href = "showteacher.php";
                    break;
                case "academic":
                    window.location.href = "showacademic.php";
                    break;
                default:
                    window.location.href = "showuser.php";
                    break;
            }
        }
    </script>  
</body>

</html>