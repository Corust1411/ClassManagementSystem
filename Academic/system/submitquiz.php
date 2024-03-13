<?php
session_start(); // Start session
include 'connectdatabase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quiz_id = $_POST['quiz_id'];
    $user_id = $_SESSION['user_id'];

    $total_score = 0;
    $answered_questions = array();

    // Check the answer for the first question before adding scores
    $first_question_id = $_POST['question_id'][0];
    $first_question_answer = $_POST['answer_' . $first_question_id];
    $sql_first_question = "SELECT * FROM question WHERE question_id = ?";
    $stmt_first_question = $pdo->prepare($sql_first_question);
    $stmt_first_question->execute([$first_question_id]);
    $row_first_question = $stmt_first_question->fetch();

    if ($first_question_answer == $row_first_question['answer']) {
        $total_score += 1;
    }
    $answered_questions[] = $first_question_id;

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'answer_') !== false) {
            $question_id = substr($key, strpos($key, "_") + 1);
            $answer = $value;
            $sql_question = "SELECT * FROM question WHERE question_id = ?";
            $stmt_question = $pdo->prepare($sql_question);
            $stmt_question->execute([$question_id]);
            $row_question = $stmt_question->fetch();

            if (!empty($answer) && !in_array($question_id, $answered_questions)) {
                if ($answer == $row_question['answer']) {
                    $total_score += 1; // Increase score if answer is correct
                }
                $answered_questions[] = $question_id;
            }
        }
    }

    // Check if the user has answered all questions
    $sql_total_questions = "SELECT COUNT(*) AS total_questions FROM question WHERE quiz_id = ?";
    $stmt_total_questions = $pdo->prepare($sql_total_questions);
    $stmt_total_questions->execute([$quiz_id]);
    $row_total_questions = $stmt_total_questions->fetch();
    $total_questions = $row_total_questions['total_questions'];

    if (count($answered_questions) < $total_questions) {
        echo "Please answer all questions before submitting.";
    } else {
        $starttime = date('Y-m-d H:i:s');
        $endtime = date('Y-m-d H:i:s');
        $sql_attempts = "INSERT INTO attempts (total_score, starttime, endtime, quiz_id, student_id) 
                             VALUES (?, ?, ?, ?, ?)";
        $stmt_attempts = $pdo->prepare($sql_attempts);
        if ($stmt_attempts->execute([$total_score, $starttime, $endtime, $quiz_id, $user_id])) {
            $_SESSION['quiz_submitted'] = true; // Set session variable to indicate that the quiz has been submitted
            echo "Quiz submitted successfully.";
        } else {
            echo "Error: " . $sql_attempts;
        }
    }
}
?>