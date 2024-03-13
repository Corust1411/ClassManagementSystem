<?php
include 'connectdatabase.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $role = $_POST['role'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file_attachment = $_POST['file_attachment'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $total_score = $_POST['total_score'];
    $teacher_id = $_SESSION['teacher_id'];
    $course_id = $_POST['role'];

    $materialQuery = "SELECT material_id FROM material WHERE material_name = 'Quiz' AND course_id = ?";
    $materialResult = $pdo->prepare($materialQuery);
    $materialResult->execute([$course_id]);

    // เพิ่มข้อมูลลงในตาราง quiz
    if ($materialResult) {
        $materialRow = $materialResult->fetch(PDO::FETCH_ASSOC);
        $material_id = $materialRow['material_id'];

        $sql = "INSERT INTO quiz (title, description, file_attachment, start_date, due_date, total_score, teacher_id, course_id, material_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $file_attachment, $start_date, $due_date, $total_score, $teacher_id, $course_id, $material_id]);

        if ($stmt) {
            $quiz_id = $pdo->lastInsertId();

            if (isset($_POST['question_title']) && isset($_POST['choices']) && isset($_POST['answers'])) {
                $question_titles = $_POST['question_title'];
                $choices = $_POST['choices'];
                $answers = $_POST['answers'];

                if (is_array($question_titles) && is_array($choices) && is_array($answers)) {

                    foreach ($question_titles as $key => $question_title) {
                        if (isset($question_titles[$key]) && isset($choices[$key]) && isset($answers[$key])) {
                            $question_title = $question_titles[$key];
                            $answer = $answers[$key];
                            $choice_a = $choices[$key][0] ?? '';
                            $choice_b = $choices[$key][1] ?? '';
                            $choice_c = $choices[$key][2] ?? '';
                            $choice_d = $choices[$key][3] ?? '';
                            $sql_question = "INSERT INTO question (question_title, answer, quiz_id, question_a, question_b, question_c, question_d)
                             VALUES (?, ?, ?, ?, ?, ?, ?)";
                            $stmt_question = $pdo->prepare($sql_question);
                            $stmt_question->execute([$question_title, $answer, $quiz_id, $choice_a, $choice_b, $choice_c, $choice_d]);
                        } else {
                            echo "Error: Missing question data.";
                        }
                    }
                } else {
                    echo "Error: Data is not in the correct format.";
                }
            } else {
                echo "Error: Missing question data.";
            }

            echo "Quiz created successfully.";
        } else {
            echo "Error: " . $pdo->errorInfo()[2];
        }
    }
}
?>