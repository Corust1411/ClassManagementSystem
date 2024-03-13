<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
    <?php
    include 'connectdatabase.php';

    $sqlTotalUsers = "SELECT COUNT(*) as totalUsers FROM user";
    $resultTotalUsers = $db->querySingle($sqlTotalUsers, true);
 

    $sqlTotalClass = "SELECT COUNT(*) as totalClass FROM course";
    $resultTotalclass = $db->querySingle($sqlTotalClass, true);

    ?>

    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold">
                        <?= $resultTotalUsers['totalUsers'] ?>
                    </div>
                </div>
                <div class="text-sm font-medium text-gray-400">จำนวนผู้ใช้ทั้งหมด</div>
            </div>
        </div>
        <a href="../Academic/showuser.php" class="text-[#f84525] font-medium text-sm hover:text-red-800">เพิ่มเติม</a>
    </div>

    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="flex items-center mb-1">
                    <div class="text-2xl font-semibold"><?= $resultTotalclass['totalClass'] ?></div>
                </div>
                <div class="text-sm font-medium text-gray-400">จำนวนชั้นเรียนทั้งหมด</div>
            </div>
        </div>
        <a href="../Academic/course.php" class="text-[#f84525] font-medium text-sm hover:text-red-800">เพิ่มเติม</a>
    </div>
</div>