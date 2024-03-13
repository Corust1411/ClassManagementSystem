<?php
include 'connectdatabase.php';
session_start();
// var_dump($_SESSION);

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
                                <h2 class="text-2xl font-semibold mb-6">สร้างแบบทดสอบ</h2>

                                <form action="../Academic/system/addquiz.php" method="POST" class="space-y-4"
                                    enctype="multipart/form-data">
                                    <div class="mb-4">
                                        <label for="role" class="block text-sm font-medium text-gray-600">เลือกตำแหน่ง</label>
                                        <select id="role" name="role" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500">
                                            <option value="empty" selected>ยังไม่ได้เลือก</option>
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
                                    <div class="mb-4">
                                        <label for="title" class="block text-sm font-medium text-gray-600">ชื่อแบบทดสอบ</label>
                                        <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="description" class="block text-sm font-medium text-gray-600">คำอธิบาย</label>
                                        <input type="text" id="description" name="description" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="file_attachment" class="block text-sm font-medium text-gray-600">ไฟล์</label>
                                        <input type="text" id="file_attachment" name="file_attachment" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="start_date" class="block text-sm font-medium text-gray-600">วัน/เวลาเริ่มแบบทดสอบ</label>
                                        <input type="datetime-local" id="start_date" name="start_date" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="due_date" class="block text-sm font-medium text-gray-600">วัน/เวลากำหนดส่งแบบทดสอบ</label>
                                        <input type="datetime-local" id="due_date" name="due_date" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="total_score" class="block text-sm font-medium text-gray-600">คะแนน</label>
                                        <input type="number" id="total_score" name="total_score" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="total_questions" class="block text-sm font-medium text-gray-600">จำนวนคำถาม</label>
                                        <input type="number" id="total_questions" name="total_questions" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500" required>
                                    </div>

                                    <div id="questionsContainer">

                                    </div>

                                    <button type="button" onclick="generateQuestionFields()" class="w-full bg-[#f84525] text-white p-2 rounded-md hover:bg-[#f82525] focus:outline-none">สร้างแบบทดสอบ</button>

                                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none">ยืนยัน</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <script type="module" src="component.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function generateQuestionFields() {
            var totalQuestions = document.getElementById('total_questions').value;
            var container = document.getElementById('questionsContainer');
            container.innerHTML = '';

            for (var i = 1; i <= totalQuestions; i++) {
                var questionDiv = document.createElement('div');
                questionDiv.className = 'mb-4';

                var questionLabel = document.createElement('label');
                questionLabel.innerHTML = 'Question ' + i;
                questionLabel.className = 'block text-sm font-medium text-gray-600';
                questionDiv.appendChild(questionLabel);

                var questionInput = document.createElement('input');
                questionInput.type = 'text';
                questionInput.name = 'question_title[' + i + ']';
                questionInput.className = 'mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500';
                questionDiv.appendChild(questionInput);

                var choicesLabel = document.createElement('label');
                choicesLabel.innerHTML = 'Choices (A, B, C, D)';
                choicesLabel.className = 'block text-sm font-medium text-gray-600';
                questionDiv.appendChild(choicesLabel);

                for (var j = 65; j <= 68; j++) {
                    var choiceInput = document.createElement('input');
                    choiceInput.type = 'text';
                    choiceInput.name = 'choices[' + i + '][]';
                    choiceInput.className = 'mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500';
                    choiceInput.placeholder = String.fromCharCode(j);
                    questionDiv.appendChild(choiceInput);
                }

                var answerLabel = document.createElement('label');
                answerLabel.innerHTML = 'Correct Answer';
                answerLabel.className = 'block text-sm font-medium text-gray-600';
                questionDiv.appendChild(answerLabel);

                var answerInput = document.createElement('input');
                answerInput.type = 'text';
                answerInput.name = 'answers[' + i + ']';
                answerInput.className = 'mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-blue-500';
                questionDiv.appendChild(answerInput);

                container.appendChild(questionDiv);
            }
        }
    </script>



</body>

</html>