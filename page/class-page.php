<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script type="module" src="./components.js"></script>
</head>

<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
  <div id="navbar-container"></div>
  <div id="sidenav-container"></div>

  <div class="ml-60">
    <div class="mt-16 bg-gray-900 fixed w-11/12">
      <div>
        <ul class="px-4 py-2 flex justify-center" id="tabs" data-tabs-toggle="#tabs-content" role="tablist">
          <li class="w-full flex justify-center">
            <button class="w-full text-white p-4 rounded focus:bg-[#AFDAFF] focus:text-gray-900 hover:text-red-400 shadow-md flex items-center justify-center" id="announcement-tab" data-tabs-target="#announcement" type="button" role="tab" aria-controls="announcement" aria-selected="false">
              <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              ประกาศ
            </button>
          </li>
          <li class="w-full flex justify-center">
            <button class="w-full text-white p-4 rounded focus:bg-[#AFDAFF] focus:text-gray-900 hover:text-red-400 shadow-md flex items-center justify-center" id="classwork-tab" data-tabs-target="#classwork" type="button" role="tab" aria-controls="classwork" aria-selected="false">
              <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              งานของชั้นเรียน
            </button>
          </li>
          <li class="w-full flex justify-center">
            <button class="w-full text-white p-4 rounded focus:bg-[#AFDAFF] focus:text-gray-900 hover:text-red-400 shadow-md flex items-center justify-center" id="member-tab" data-tabs-target="#member" type="button" role="tab" aria-controls="member" aria-selected="false">
              <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
              </svg>
              สมาชิก
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end nav -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <div class="mt-20 ml-60">
    <!-- main -->
    <div class="w-full h-full mt-32 px-36">
      <div id="tabs-content">
        <!-- announcement tab -->
        <div class="hidden px-20 rounded-lg" id="announcement" role="tabpanel" aria-labelledby="announcement-tab">
          <!-- class banner -->
          <div class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md">
            <div class="flex justify-end">
              <img src="../images/icon-banner-new.png" class="w-[200px] h-[200px] float-right p-2 mt-4 mr-20" />
            </div>

            <?php
            // 
            $sql = 'SELECT course.course_name
            FROM course
            WHERE course.course_id = 22';
            $result = $db->query($sql);

            $row = $result->fetchArray(SQLITE3_ASSOC);

            echo '<h1 class="text-gray-900 text-left p-10 pt-[10px] text-3xl text-ellipsis overflow-x-hidden ...">' .
              $row['course_name']
              . '</h1>'
            ?>
          </div>

          <div class="grid grid-cols-5 py-5">
            <!-- announcement component -->
            <div class="col-span-4 mr-5">
              <!-- announcement 1 -->
              <div class="rounded-xl bg-white w-full ring-1 ring-[#17A7CE] mb-6 mt-6">
                <div class="flex flex-wrap p-6">
                  <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94]">
                    <img src="../images/profile.jpg" class="rounded-full w-[40px] h-[40px]" />
                  </div>
                  <div class="px-4">
                    <h2 class="dark:text-gray-900 text-2xl">ชื่อคนประกาศ</h2>
                    <h3 class="text-gray-500 text-xl">วันเวลาที่ประกาศ</h3>
                  </div>
                </div>

                <div role="separator" class="px-5 py-5">
                  <hr class="border-[#17A7CE]" />
                </div>

                <div class="">
                  <div class="py-2 px-5 pb-7">
                    <p class="text-xl">สวัสดีครับ ท่านสมาชิกชมรม</p>
                  </div>
                </div>
              </div>

              <!-- announcement 2 -->
              <div class="rounded-xl bg-white w-full ring-1 ring-[#17A7CE] mb-6 mt-6">
                <div class="flex flex-wrap p-6">
                  <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94]">
                    <img src="../images/profile.jpg" class="rounded-full w-[40px] h-[40px]" />
                  </div>
                  <div class="px-4">
                    <h2 class="dark:text-gray-900 text-2xl">ชื่อคนประกาศ</h2>
                    <h3 class="text-gray-500 text-xl">วันเวลาที่ประกาศ</h3>
                  </div>
                </div>

                <div role="separator" class="px-5 py-5">
                  <hr class="border-[#17A7CE]" />
                </div>

                <div class="">
                  <div class="py-2 px-5 pb-7">
                    <p class="text-xl">สวัสดีครับ ท่านสมาชิกชมรม</p>
                  </div>
                </div>
              </div>

              <!-- assignment -->
              <a href="work-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white w-full ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13c-2.8-.8-4.7-1-8-1a1 1 0 0 0-1 1v11c0 .6.5 1 1 1 3.2 0 5 .2 8 1m0-13c2.8-.8 4.7-1 8-1 .6 0 1 .5 1 1v11c0 .6-.5 1-1 1-3.2 0-5 .2-8 1" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">
                          ชื่อคนประกาศ
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">
                          ได้เพิ่มงานใหม่แล้ว:
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">ชื่อการบ้าน</h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มงาน
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <!-- เนื้อหาประกอบการเรียนการสอน -->
              <a href="work-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white w-full ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v13H7a2 2 0 0 0-2 2Zm0 0c0 1.1.9 2 2 2h12M9 3v14m7 0v4" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">
                          ชื่อคนเพิ่มเนื้อหา
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">
                          ได้เพิ่มเนื้อหาใหม่แล้ว:
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">ชื่อเนื้อหา</h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มเนื้อหา
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <!-- quiz -->
              <a href="quiz-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white w-full ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7h1v12c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1V5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">
                          ชื่อคนประกาศ
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">
                          ได้เพิ่มแบบทดสอบใหม่แล้ว:
                        </h2>
                        <!-- white space -->
                        &ensp;
                        <h2 class="dark:text-gray-900 text-2xl">
                          ชื่อแบบทดสอบ
                        </h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มแบบทดสอบ
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- add announcement component-->
            <div class="block bg-white shadow-xl rounded-xl w-full h-44 mt-5">

              <div class="p-4">
                <h1 class="text-gray-900 text-xl">
                  มาเพิ่มประกาศในชั้นเรียนกันเลย!
                </h1>
              </div>

              <div class="p-5 flex justify-center">
                <a href="announcement-page.html" class="w-full h-full">
                  <button class="rounded-2xl bg-[#17A7CE] p-2 text-lg w-full h-full text-white hover:ring-1 hover:ring-gray-600 hover:bg-[#136C94]">
                    เพิ่มประกาศ
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- classwork tab -->
        <div class="hidden px-20 rounded-lg justify-center" id="classwork" role="tabpanel" aria-labelledby="classwork-tab">
          <div class="flex justify-center w-full h-full">
            <div class="w-full h-full mt-[40px] px-[100px]">
              <!-- assignment -->
              <a href="work-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13c-2.8-.8-4.7-1-8-1a1 1 0 0 0-1 1v11c0 .6.5 1 1 1 3.2 0 5 .2 8 1m0-13c2.8-.8 4.7-1 8-1 .6 0 1 .5 1 1v11c0 .6-.5 1-1 1-3.2 0-5 .2-8 1" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">ชื่อการบ้าน</h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มงาน
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <!-- เนื้อหาประกอบการเรียนการสอน -->
              <a href="work-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v13H7a2 2 0 0 0-2 2Zm0 0c0 1.1.9 2 2 2h12M9 3v14m7 0v4" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">ชื่อเนื้อหา</h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มเนื้อหา
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

              <!-- quiz -->
              <a href="quiz-page.php" class="mb-6 mt-6">
                <div class="rounded-xl bg-white ring-1 ring-[#17A7CE] mb-6 mt-6 flex hover:shadow-xl hover:bg-gray-200">
                  <div class="p-6 flex">
                    <div class="rounded-full w-[40px] h-[40px] ring-4 ring-[#136C94] bg-[#136C94]">
                      <svg class="w-[40px] h-[40px] text-white dark:text-white" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7h1v12c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1V5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                      </svg>
                    </div>

                    <div class="px-4">
                      <div class="flex">
                        <h2 class="dark:text-gray-900 text-2xl">
                          ชื่อแบบทดสอบ
                        </h2>
                      </div>

                      <!-- date -->
                      <div>
                        <h3 class="text-gray-500 text-xl">
                          วันเวลาที่เพิ่มแบบทดสอบ
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <!-- member tab -->
        <div class="hidden px-20 rounded-lg" id="member" role="tabpanel" aria-labelledby="member-tab">
          <div class="flex justify-center">
            <div class="w-full h-full px-[100px] bg-white">
              <!-- teacher -->
              <div>
                <div class="mt-20 mb-10">
                  <h1 class="text-[#17A7CE] text-4xl">ครู</h1>
                </div>

                <div class="mb-10">
                  <hr class="border-[#17A7CE]" />
                </div>

                <!-- member -->
                <?php

                $user_id = $_SESSION["user_id"];
                $role = $_SESSION["role"];
                $sql = "SELECT u.firstname, u.lastname, u.profile_picture
                FROM user u
                INNER JOIN teacher t ON t.user_id = u.user_id
                INNER JOIN teacher_subject ts ON ts.teacher_id = t.teacher_id
                INNER JOIN course c ON c.course_id = ts.course_id
                WHERE c.course_id = 22;
                ";
                $result = mysqli_query($conn, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                  echo '<div>
                  <div class="flex ml-20 h-full w-full">
                    <div class="rounded-full w-[50px] h-[50px] ring-4 ring-[#136C94] mr-5">
                      <img src="../images/profile.jpg" class="rounded-full w-[50px] h-[50px]" />
                    </div>

                    <div class="mt-1">
                      <h1 class="text-gray-900 text-2xl">' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>
                    </div>
                  </div>

                  <div class="mb-5 mt-5 px-6">
                    <hr class="border-gray-300" />  
                  </div>
                </div>';
                  $count += 1;
                }
                ?>

                <!-- student -->
                <div>

                  <div class="mt-20 mb-10 grid grid-cols-2">
                    <h1 class="text-[#17A7CE] text-4xl">นักเรียน</h1>
                    <!-- จำนวนนักเรียนในชั้นเรียน -->
                    <div class="flex justify-end mt-2">
                      <h1 class="text-[#17A7CE] text-2xl">xx</h1>
                      &ensp;
                      <h1 class="text-[#17A7CE] text-2xl">คน</h1>
                    </div>
                  </div>

                  <div class="mb-10">
                    <hr class="border-[#17A7CE]" />
                  </div>
                  <?php

                  $user_id = $_SESSION["user_id"];
                  $role = $_SESSION["role"];
                  $sql = "SELECT u.firstname, u.lastname, u.profile_picture
                FROM user u
                INNER JOIN student st ON st.user_id = u.user_id
                INNER JOIN student_subject ss ON ss.student_id = st.student_id
                INNER JOIN course c ON c.course_id = ss.course_id
                WHERE c.course_id = 22;
                ";
                  $result = mysqli_query($conn, $sql);
                  $count = 0;
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<div>
                  <div class="flex ml-20 h-full w-full">
                    <div class="rounded-full w-[50px] h-[50px] ring-4 ring-[#136C94] mr-5">
                      <img src="../images/profile.jpg" class="rounded-full w-[50px] h-[50px]" />
                    </div>

                    <div class="mt-1">
                      <h1 class="text-gray-900 text-2xl">' . $row['firstname'] . ' ' . $row['lastname'] . '</h1>
                    </div>
                  </div>

                  <div class="mb-5 mt-5 px-6">
                    <hr class="border-gray-300" />  
                  </div>
                </div>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>