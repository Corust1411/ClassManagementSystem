<?php include 'connectdatabase.php';
session_start();
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
                                <h2 class="text-2xl font-semibold mb-6">QUIZ Page</h2>
                                <div class="flex flex-col lg:flex-row items-center justify-center w-full">
                                    <div class="flex flex-col justify-center border rounded-md border-grey gap-6 w-full self-start h-full">
                                        <div class="flex p-4 bg-white rounded-3xl w-full self-start">
                                            <!-- Icon Container -->

                                            <div class="flex flex-col w-full ml-4">
                                                <?php
                                                if (isset($_GET['quiz_id'])) {
                                                    $quiz_id = $_GET['quiz_id'];

                                                    // เรียกข้อมูลของควิซ
                                                    $sql_quiz = "SELECT * FROM quiz WHERE quiz_id = '$quiz_id'";
                                                    $result_quiz = mysqli_query($conn, $sql_quiz);
                                                    $row_quiz = mysqli_fetch_assoc($result_quiz);
                                                ?>
                                                    <div class="w-full">
                                                        <h1 class="text-[#136C94] text-3xl px-4 pt-2"><?= $row_quiz['title'] ?></h1>
                                                        <h2 class="text-gray-600 text-base px-4 pt-1 pb-2">Description: <?= $row_quiz['description'] ?></h2>
                                                        <h2 class="text-gray-600 text-base px-4 pt-1 pb-2">Start Date: <?= $row_quiz['start_date'] ?></h2>
                                                        <h2 class="text-gray-600 text-base px-4 pt-1 pb-2">Due Date: <?= $row_quiz['due_date'] ?></h2>
                                                        <h2 class="text-gray-600 text-base px-4 pt-1 pb-2">Total Score: <?= $row_quiz['total_score'] ?></h2>

                                                        <form method="post" action="../Academic/system/submitquiz.php">
                                                            <?php

                                                            $sql_question = "SELECT * FROM question WHERE quiz_id = '$quiz_id'";
                                                            $result_question = mysqli_query($conn, $sql_question);

                                                            while ($row_question = mysqli_fetch_assoc($result_question)) {
                                                            ?>
                                                                <div class="px-4 mt-2">
                                                                    <h3 class="text-xl font-bold">Question: <?= $row_question['question_title'] ?></h3>
                                                                    <input type="hidden" name="quiz_id" value="<?= $quiz_id ?>">
                                                                    <input type="hidden" name="question_id[]" value="<?= $row_question['question_id'] ?>">
                                                                    <label>Select answer:</label>
                                                                    <div class="flex gap-2 mt-1">
                                                                        <input type="radio" id="answer_<?= $row_question['question_id'] ?>_A" name="answer_<?= $row_question['question_id'] ?>" value="A">
                                                                        <label for="answer_<?= $row_question['question_id'] ?>_A"><?= $row_question['question_a'] ?></label>
                                                                        <input type="radio" id="answer_<?= $row_question['question_id'] ?>_B" name="answer_<?= $row_question['question_id'] ?>" value="B">
                                                                        <label for="answer_<?= $row_question['question_id'] ?>_B"><?= $row_question['question_b'] ?></label>
                                                                        <input type="radio" id="answer_<?= $row_question['question_id'] ?>_C" name="answer_<?= $row_question['question_id'] ?>" value="C">
                                                                        <label for="answer_<?= $row_question['question_id'] ?>_C"><?= $row_question['question_c'] ?></label>
                                                                        <input type="radio" id="answer_<?= $row_question['question_id'] ?>_D" name="answer_<?= $row_question['question_id'] ?>" value="D">
                                                                        <label for="answer_<?= $row_question['question_id'] ?>_D"><?= $row_question['question_d'] ?></label>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md mt-4">Submit Quiz</button>
                                                        </form>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


    </main>
    <script type="module" src="component.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        function cancelUpload() {

            document.getElementById('assignmentfile').value = '';
            alert('File upload canceled');
        }
    </script>


</body>

</html>