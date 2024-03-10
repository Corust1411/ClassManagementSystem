<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';
?>
<div class="py-2 px-6 bg-[#111827] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="lg:hidden text-lg text-white font-semibold sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>

    <ul class="ml-auto flex items-center">
        <li class="mr-1 dropdown">
            <button type="button" class="dropdown-toggle text-white mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;transform: msFilter">
                    <path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                </svg>
            </button>
            <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                <form action="" class="p-4 border-b border-b-gray-100">
                    <div class="relative w-full">
                        <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                        <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-white"></i>
                    </div>
                </form>
            </div>
        </li>
        <li class="dropdown">
            <button type="button" class="dropdown-toggle text-white mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;transform: msFilter">
                    <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path>
                </svg>
            </button>
            <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                    <button type="button" data-tab="notification" data-tab-page="notifications" class="text-white font-medium text-[13px] hover:text-white border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                    <button type="button" data-tab="notification" data-tab-page="messages" class="text-white font-medium text-[13px] hover:text-white border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                </div>

            </div>
        </li>
        <button id="fullscreen-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;transform: msFilter">
                <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
            </svg>
        </button>
        <script>
            const fullscreenButton = document.getElementById('fullscreen-button');

            fullscreenButton.addEventListener('click', toggleFullscreen);

            function toggleFullscreen() {
                if (document.fullscreenElement) {

                    document.exitFullscreen();
                } else {

                    document.documentElement.requestFullscreen();
                }
            }
        </script>

        <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <div class="flex-shrink-0 w-10 h-10 relative">
                    <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                        <?php
                        $academic = $_SESSION["role"];
                        $user_id = $_SESSION["user_id"];
                        $sql = "SELECT * FROM user WHERE role = '$academic' and user_id = $user_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <img class="w-8 h-8 rounded-full" src="../Academic/system/profilepictures/<?= $row['profile_picture'] ?>" alt="Profile Image" />
                        <?php
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping">
                        </div>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                    </div>
                </div>
                <div class="p-2 md:block text-left">
                    <h2 class="text-sm font-semibold text-white"><?= $_SESSION["firstname"] ?> <?= $_SESSION["lastname"] ?></h2>
                    <p class="text-xs text-white"><?= $_SESSION["role"] ?></p>
                </div>
            </button>

            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-grey-900 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-grey-900 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                </li>
                <li>
                    <form method="POST" action="../system/logout.php">
                        <button type="submit" role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-grey-900 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer">
                            Log Out
                        </button>
                    </form>
                </li>
            </ul>

        </li>
    </ul>
</div>