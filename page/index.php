<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';
if (!isset($_SESSION['login'])) {
  header("Location: ./login.php");
  exit();
}

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
  <!-- end nav -->
  <div class="mt-20 ml-60">
    <!-- main page -->
    <div class="grid grid-cols-2 gap-10 p-10 ">

      <!-- profile -->
      <div class="bg-[#136C94] w-full h-full rounded-2xl">
        <div class="flex justify-center mt-10">
          <!-- user img -->
          <div class="py-4 w-80 h-80 bg-gray-900 mb-8 rounded-full overflow-hidden">
            <?php
         
            $user_id = $_SESSION["user_id"];
            $role = $_SESSION["role"];
            $sql = "SELECT * FROM user WHERE role = '$role' AND user_id = $user_id";
            $result = $db->query($sql);
            $row = $result->fetchArray(SQLITE3_ASSOC);
            ?>
            <img class="w-full h-full object-cover"
              src="../Academic/system/profilepictures/<?= $row['profile_picture'] ?>" alt="Profile Image" />
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
                <svg class="w-10 h-10 text-gray-800 dark:text-[#136C94]" aria-hidden="true" fill="none"
                  viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 16 4-4-4-4m6 8 4-4-4-4" />
                </svg>
              </a>
            </div>

          </div>


          <div class="grid grid-cols-2 grid-rows-2  py-4 gap-5 w-full max-h-64">

            <!-- fetch class from db and show -->
            <?php
         
            $user_id = $_SESSION["user_id"];
            $role = $_SESSION['role'];

            if ($role == 'student') {
              // Fetch user's classes
            
              $sql = "SELECT user.firstname, user.lastname, user.user_id, t.teacher_id
              FROM teacher t
              INNER JOIN user ON t.user_id = user.user_id
              INNER JOIN teacher_subject ON teacher_subject.teacher_id = t.teacher_id
              WHERE teacher_subject.course_id IN (
                SELECT s.course_id
                FROM student_subject s
                WHERE s.student_id = (
                  SELECT st.student_id
                  FROM student st
                  INNER JOIN user ON user.user_id = st.user_id
                  WHERE user.user_id = $user_id
                )
              )";

              // Fetch course names for the user's classes
              $sql2 = "SELECT c.course_name
              FROM course c
              INNER JOIN student_subject ON student_subject.course_id = c.course_id 
              WHERE student_subject.student_id = (
                SELECT st.student_id
                FROM student st
                INNER JOIN user ON user.user_id = st.user_id
                WHERE user.user_id = $user_id
              )";

            } else {
              $sql = "SELECT user.firstname, user.lastname, user.user_id, t.teacher_id
              FROM teacher t
              INNER JOIN user ON t.user_id = user.user_id
              INNER JOIN teacher_subject ON teacher_subject.teacher_id = t.teacher_id
              WHERE teacher_subject.course_id IN (
                SELECT ts.course_id
                FROM teacher_subject ts
                WHERE ts.teacher_id = (
                  SELECT t.teacher_id
                  FROM teacher t
                  INNER JOIN user ON user.user_id = t.user_id
                  WHERE user.user_id = $user_id))
                
              ";

              $sql2 = "SELECT c.course_name
              FROM course c
              INNER JOIN teacher_subject ON teacher_subject.course_id = c.course_id 
              WHERE teacher_subject.teacher_id = (
                SELECT t.teacher_id
                FROM teacher t
                INNER JOIN user ON user.user_id = t.user_id
                WHERE user.user_id = $user_id
              )";

            }



            $result = $db->query($sql);
            $result2 = $db->query($sql2);

            $row2 = $result2->fetchArray(SQLITE3_ASSOC);
            $dummy = $result2->fetchArray(SQLITE3_ASSOC);
            $count = 0;


            // Display user's classes with course names, still bug
            while ($dummy && $row = $result->fetchArray(SQLITE3_ASSOC)) {
              $count += 1;
              echo '
                <a href="class-page.php" class="hover:ring-4 ring-white rounded-md">
                  <div id="class1" class="bg-gradient-to-l from-[#FEFF86] to-[#17A7CE] rounded-md shadow-md">
                    <h1 class="text-xl p-3 text-ellipsis overflow-x-hidden ... text-white">' . $row2['course_name'] . '</h1>
                    <p class="text-l p-3 text-gray-600">' . $row["firstname"] . " " . $row["lastname"] . '</p>
                  </div>
                </a>';
              if ($count >= 4) {
                break;
              }
            }

            // var_dump($row2);
            // var_dump($row);
            ?>
          </div>
        </div>



      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>