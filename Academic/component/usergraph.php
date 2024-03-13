<?php
session_start();
include 'connectdatabase.php';

$sqlStudent = "SELECT COUNT(*) as count FROM user WHERE role = 'student'";
$resultStudent = $db->querySingle($sqlStudent, true);

$sqlTeacher = "SELECT COUNT(*) as count FROM user WHERE role = 'teacher'";
$resultTeacher = $db->querySingle($sqlTeacher, true);

$sqlAcademic = "SELECT COUNT(*) as count FROM user WHERE role = 'academic'";
$resultAcademic = $db->querySingle($sqlAcademic, true);



$sqlTotalUsers = "SELECT COUNT(*) as totalUsers FROM user";
$resultUser = $db->querySingle($sqlTotalUsers, true);



?>

<div class="flex flex-col justify-center self-center w-full gap-6 mb-6 ">
    <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t mb-0 px-0 border-0 w-full ">
            <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">บัญชีผู้ใช้</h3>
                </div>
            </div>
            <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">ตำแหน่ง</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">จำนวน</th>
                            <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">เปอร์เซ็น</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-gray-700 dark:text-gray-100">
                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">ผู้เรียน</th>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $resultStudent['count'] ?></td>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                    <span class="mr-2">
                                        <?= number_format(($resultStudent['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%
                                    </span>
                                    <div class="relative w-full">
                                        <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-300">
                                            <div style="width: <?= number_format(($resultStudent['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-gray-700 dark:text-gray-100">
                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">ผู้สอน</th>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $resultTeacher['count'] ?></td>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                    <span class="mr-2">
                                        <?= number_format(($resultTeacher['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%
                                    </span>
                                    <div class="relative w-full">
                                        <div class="overflow-hidden h-2 text-xs flex rounded bg-red-300">
                                            <div style="width: <?= number_format(($resultTeacher['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-gray-700 dark:text-gray-100">
                            <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">ฝ่ายวิชาการ</th>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?= $resultAcademic['count'] ?></td>
                            <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                    <span class="mr-2">
                                        <?= number_format(($resultAcademic['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%
                                    </span>
                                    <div class="relative w-full">
                                        <div class="overflow-hidden h-2 text-xs flex rounded bg-green-300">
                                            <div style="width: <?= number_format(($resultAcademic['count'] / ($resultStudent['count'] + $resultTeacher['count'] + $resultAcademic['count'])) * 100, 2) ?>%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-600">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>