<?php
// เชื่อมต่อฐานข้อมูล
include_once 'connectdatabase.php.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $total_questions = $_POST['total_questions'];
    $questions = $_POST['question_title'];
    $choices = $_POST['choices'];
    $answers = $_POST['answers'];
    $quiz_id = $_SESSION['quiz_id'];

    for ($i = 0; $i < count($questions); $i++) {
        $question_title = $questions[$i];
        $answer = $answers[$i];
        $question_a = $choices[$i][0]; // A
        $question_b = $choices[$i][1]; // B
        $question_c = $choices[$i][2]; // C
        $question_d = $choices[$i][3]; // D

        $sql = "INSERT INTO question (question_title, answer, quiz_id, question_a, question_b, question_c, question_d)
                VALUES ('$question_title', '$answer', '$quiz_id', '$question_a', '$question_b', '$question_c', '$question_d')";

        $result = $db->exec($sql);

        if ($result) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . $db->lastErrorMsg();
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $db->close();
}
?>