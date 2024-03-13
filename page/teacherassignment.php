<?php
session_start();
var_dump($_SESSION);
include 'connectdatabase.php';
if (!isset($_SESSION['login'])) {
  header("Location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script type="module" src="./components.js"></script>
</head>

<body class="bg-[#AFDAFF] flex flex-col w-full min-h-screen">
  <div id="navbar-container"></div>
  <div id="sidenav-container"></div>

  <!-- end nav -->
  <main class="main-content ml-64 p-4">
    <div class="container mx-auto">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold mt-16">การบ้านที่สั่งไปทั้งหมด</h1>
        <button data-modal-target="crud-modal-assignment" data-modal-toggle="crud-modal-assignment" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-8 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
          Add Assignments
        </button>

        <div id="crud-modal-assignment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Add Assignments
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-assignment">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <form class="p-4 md:p-5 space-y-4" id="assignForm" action="../Academic/system/addassignmentteacher.php" method="POST" enctype="multipart/form-data">
                <div class="col-span-2">
                  <select id="role" name="role" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                    <option value="empty" selected> เลือกวิชา</option>
                    <?php

                    $teacher_id = $_SESSION['teacher_id'];
                    $sql = "SELECT * FROM teacher_subject
        INNER JOIN course ON course.course_id = teacher_subject.course_id
        WHERE teacher_id = $teacher_id";

                    $result = $db->query($sql);


                    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                      echo '<option value="' . $row['course_id'] . '">' . $row['course_name'] . '</option>';
                    }
                    ?>
                  </select>

                </div>
                <div class="col-span-2">
                  <label for="assignTitle" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                    Title</label>
                  <input type="text" id="assignTitle" name="assignTitle" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>

                <div class="mb-4" id="desAssign">
                  <label for="assignDescription" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                    Description</label>
                  <textarea id="assignDescription" name="assignDescription" class="input-field h-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                </div>

                <div class="mb-4" id="fileAssign">
                  <label for="assignFile" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                    File</label>
                  <input type="file" id="assignFile" name="assignFile" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
                <div class="mb-4 grid lg:grid-cols-2 gap-2 grid-cols-1" id="dateAssign">
                  <div>
                    <label for="assignDate" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                      Date Due</label>
                    <input type="date" id="assignDate" name="assignDate" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                  <div>
                    <label for="assignTime" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                      Time Due</label>
                    <input type="time" id="assignTime" name="assignTime" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                </div>

                <div class="mb-4  " id="scoreField">
                  <label for="totalscore" class="block text-sm font-medium text-gray-900 dark:text-white">Assignment
                    Score</label>
                  <input type="text" id="assignscore" name="assignscore" class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      $user_id = $_SESSION['user_id'];
      $sql = "SELECT * FROM assignment WHERE user_id = $user_id";
      $result = $db->query($sql);

      if ($result) {
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
      ?>
          <a href="userassignmentpage.php?assignment_id=<?= $row['assignment_id'] ?>">
            <div class="bg-white shadow-md rounded-lg p-4 my-4">
              <div class="border-b border-gray-200 pb-4 mb-4">
                <h2 class="text-lg font-semibold">
                  <?php echo $row['assignment_title']; ?>
                </h2>
              </div>
              <div class="text-sm text-gray-700">
                <p class="mb-2">Description:
                  <?php echo $row['description']; ?>
                </p>
                <p class="mb-2">Start Date:
                  <?php echo $row['start_date']; ?>
                </p>
                <p class="mb-2">Due Date:
                  <?php echo $row['due_date']; ?>
                </p>
                <p class="mb-2">Total Score:
                  <?php echo $row['total_score']; ?>
                </p>
              </div>
            </div>
          </a>
      <?php
        }
      } else {
        // If no assignments are found
        echo "No assignments found.";
      }

      // Close the database connection

      ?>

    </div>
  </main>










  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>