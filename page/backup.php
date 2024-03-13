<?php
include 'connectdatabase.php';
?>
<div class="mt-20 ml-60">
    <!-- main page -->
    <div class="grid grid-cols-2 gap-10 p-10 ">

        <!-- profile -->
        <div class="bg-[#136C94] w-full h-full rounded-2xl">
            <div class="flex justify-center mt-10">
                <!-- user img -->
                <div class="py-4 w-80 h-80 bg-black rounded-full overflow-hidden">
                    <?php
                
                    $user_id = filter_var($_SESSION["user_id"], FILTER_SANITIZE_NUMBER_INT);
                    $role = filter_var($_SESSION["role"], FILTER_SANITIZE_STRING);

                    $sql = "SELECT * FROM user WHERE role = ? AND user_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si", $role, $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $row = $result->fetch_assoc();

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
            <div class="w-full h-full">
                <div class="grid grid-cols-2">

                    <div>
                        <h1 class="text-3xl text-gray-900">ชั้นเรียนของฉัน</h1>
                    </div>

                    <div class="flex justify-end">
                        <a href="classes.php" class="flex text-2xl text-[#136C94]">ดูชั้นเรียนทั้งหมด
                            <svg class="w-10 h-10 text-gray-800 dark:text-[#136C94]" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                            </svg>
                        </a>
                    </div>

                </div>


                <div class="grid grid-cols-2 grid-rows-2  py-4 gap-5 w-full max-h-64">

                    <!-- fetch class from db and show -->
                    <?php
                    // $db = new MyDB();
                    // $sql = "SELECT * FROM user WHERE user_id = ? AND password = ?";
                    // $stmt = $conn->prepare($sql);

                    // $stmt->bind_param("ss", $username, $password);
                    // $stmt->execute();

                    // $result = $stmt->get_result();

                    // $row = $result->fetch_assoc();

                    ?>

                    <a href="class-page.php" class="hover:ring-4 ring-white rounded-md">
                        <div id="class1" class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                            <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">ชื่อชั้นเรียน</h1>
                            <p class="text-l p-3 text-gray-600">ชื่อครู</p>
                        </div>
                    </a>

                    <a href="class-page.php" class="hover:ring-4 ring-white rounded-md">
                        <div id="class2" class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                            <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">ชื่อชั้นเรียน</h1>
                            <p class="text-l p-3 text-gray-600">ชื่อครู</p>
                        </div>
                    </a>

                    <a href="class-page.php" class="hover:ring-4 ring-white rounded-md">
                        <div id="class3" class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                            <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">ชื่อชั้นเรียน</h1>
                            <p class="text-l p-3 text-gray-600">ชื่อครู</p>
                        </div>
                    </a>


                    <a href="class-page.php" class="hover:ring-4 ring-white rounded-md">
                        <div id="class4" class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                            <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">ชื่อชั้นเรียน</h1>
                            <p class="text-l p-3 text-gray-600">ชื่อครู</p>
                        </div>
                    </a>

                </div>
            </div>

            <!-- calendar -->
            <div class="w-full h-full">
                <div class="p-4 pb-10">
                    <hr class="border-gray-800">
                </div>
                <div>
                    <?php
                    if ($_SESSION['role'] == 'student') {
                        echo '<h1 class="text-3xl text-gray-900 pb-5">ตารางเรียน</h1>';
                    } else if ($_SESSION['role'] == 'teacher') {
                        echo '<h1 class="text-3xl text-gray-900 pb-5">ตารางสอน</h1>';
                    }
                    ?>
                </div>

                <div class="p-4 bg-white">calendar</div>

            </div>

        </div>
    </div>
</div>