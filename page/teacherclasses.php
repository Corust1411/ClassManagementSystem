<?php
session_start();
// var_dump($_SESSION);
include 'connectdatabase.php';

if (!isset($_SESSION['login'])) {
  header("Location: ./login.php");
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

</head>

<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
  <div id="navbar-container"></div>
  <div id="sidenav-container"></div>

  <div class="flex justify-center flex-col items-center mt-40 ml-40">
    <!-- class display -->
    <p class="mb-16 font-medium text-2xl">ชั้นเรียนทั้งหมด</p>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 mx-auto">

      <?php
      $teacher_id = $_SESSION['teacher_id'];
      $sql = "SELECT * FROM teacher_subject 
        INNER JOIN course ON course.course_id = teacher_subject.course_id
        INNER JOIN teacher ON teacher.teacher_id = teacher_subject.teacher_id
        INNER JOIN user ON user.user_id = teacher.user_id
        WHERE teacher_subject.teacher_id = $teacher_id";

      $result = $db->query($sql);

      while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
      ?>
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-500 hover:border-red-700">
          <a href="course_studentpage.php?course_id=<?= $row['course_id'] ?>">
            <img src="../Academic/system/imagecourse/<?= $row['course_image'] ?>" class="w-full max-w-96 max-h-96 h-60">

            <div class="p-5 flex flex-col">
              <div>
                <a href="#">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <?= $row['course_name'] ?>
                  </h5>
                </a>
                <p class="mb-3 font-normal md:text-base text-xs text-gray-700 dark:text-gray-400">
                  <?= $row['course_description'] ?>
                </p>
              </div>


            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  </main>
</body>
<script type="module" src="components.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>