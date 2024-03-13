<?php
session_start();

$role = $_SESSION['role'];

if ($role === 'teacher') {
  $homeLink = "../page/teacherindex.php";
  $classLink = "../page/teacherclasses.php";
  $assignLink = "../page/teacherassignment.php";
} elseif ($role === 'student') {
  $homeLink = "../page/studentindex.php";
  $classLink = "../page/studentclasses.php";
  $assignLink = "../page/studentassignment.php";
} else {
}
?>




<div class="fixed left-0 top-0 w-64 h-full bg-[#111827] text-white p-4 z-50 sidebar-menu transition-transform">
  <a href="<?php echo $homeLink; ?>" class="flex items-center pb-4 border-b border-b-gray-800">
    <h2 class="font-bold text-2xl">
      HOW TO <span class="bg-[#f84525] text-white px-2 rounded-md">LEARN</span>
    </h2>
  </a>
  <ul class="mt-4">
    <li class="mb-1 group">
      <a href="<?php echo $homeLink; ?>" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-white">
        <i class="ri-home-2-line mr-3 text-lg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
          </svg>
        </i>

        <span class="text-sm">หน้าหลัก</span>
      </a>
    </li>
    <li class="mb-1 ">
      <a href="<?php echo $assignLink; ?>" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-white sidebar-dropdown-toggle">
        <i class="bx bx-user mr-3 text-lg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
          </svg>

        </i>
        <span class="text-sm">การบ้าน</span>
        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
      </a>
    </li>
    <hr />
    <li class="mb-1 ">
      <a href="<?php echo $classLink; ?>" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-white sidebar-dropdown-toggle">
        <i class="w-6 h-6 pr-1">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M5 19V4c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v13H7a2 2 0 0 0-2 2Zm0 0c0 1.1.9 2 2 2h12M9 3v14m7 0v4" />
          </svg>
        </i>

        <span class="text-sm pl-1">ชั้นเรียน</span>
        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
      </a>
    </li>

    <hr>

    <li class="mb-1 mt-2 group">
      <a href="../page/setting.php" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-white">
        <i class="bx bx-bell mr-3 text-lg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17 20v-5h2v6.988H3V15h1.98v5H17Z" />
            <path d="m6.84 14.522 8.73 1.825.369-1.755-8.73-1.825-.369 1.755Zm1.155-4.323 8.083 3.764.739-1.617-8.083-3.787-.739 1.64Zm3.372-5.481L10.235 6.08l6.859 5.704 1.132-1.362-6.859-5.704ZM15.57 17H6.655v2h8.915v-2ZM12.861 3.111l6.193 6.415 1.414-1.415-6.43-6.177-1.177 1.177Z" />
          </svg>
        </i>
        <span class="text-sm">การตั้งค่า</span>
      </a>
    </li>

    <li class="mb-1 group justify-end">
      <a href="../system/logout.php" class="flex font-semibold items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-white rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-white">
        <i class="bx bx-bell mr-3 text-lg"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
          </svg>
        </i>
        <span class="text-sm">ล็อกเอาท์</span>
      </a>
    </li>
  </ul>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>