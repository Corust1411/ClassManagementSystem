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
                                <h2 class="text-2xl font-semibold mb-6">สร้างชั้นเรียนเพิ่ม</h2>

                                <form action="../Academic/system/addcourse.php" method="POST" class="space-y-4" enctype="multipart/form-data">
                                    <div class="mb-4">
                                        <label for="courseName" class="block text-sm font-medium text-gray-600">ชื่อชั้นเรียน</label>
                                        <input type="text" id="courseName" name="courseName" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="block text-sm font-medium text-gray-600">คำอธิบาย</label>
                                        <textarea id="description" name="description" rows="3" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="courseimage" class="block text-sm font-medium text-gray-600">อัพโหลดรูป:</label>
                                        <div class="mt-1 flex items-center">
                                            <input type="file" name="courseimage" id="courseimage">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="section" class="block text-sm font-medium text-gray-600">กลุ่มเรียน</label>
                                        <input type="text" id="section" name="section" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="credits" class="block text-sm font-medium text-gray-600">หน่วยกิต</label>
                                        <input type="number" id="credits" name="credits" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="term" class="block text-sm font-medium text-gray-600">ภาคเรียนที่</label>
                                        <input type="text" id="term" name="term" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-6">
                                        <label for="year" class="block text-sm font-medium text-gray-600">ชั้นปี</label>
                                        <input type="number" id="year" name="year" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>


                                    <button type="submit" class="w-full bg-[#f84525] text-white p-2 rounded-md hover:bg-[#f82525] focus:outline-none">ยืนยัน</button>
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
</body>

</html>