<?php
session_start();
include 'connectdatabase.php';

$assignTitle = $_POST['assignTitle'];
$assignDescription = $_POST['assignDescription'];
$assignDate = $_POST['assignDate'];
$assignTime = $_POST['assignTime'];
$assignScore = $_POST['assignscore'];
$user_id = $_SESSION["user_id"];

$course_id = $_GET['course_id'];
$startDateTime = "{$assignDate} {$assignTime}";

if (is_uploaded_file($_FILES['assignFile']['tmp_name'])) {
    $assignFile = 'assignment_' . uniqid() . "." . pathinfo(basename($_FILES['assignFile']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../system/assignmentfile/" . $assignFile;
    move_uploaded_file($_FILES['assignFile']['tmp_name'], $image_upload_path);
} else {
    $assignFile = "";
}

$materialQuery = "SELECT material_id FROM material WHERE material_name = 'ASSIGNMENT' AND course_id = '$course_id'";
$materialResult = mysqli_query($conn, $materialQuery);

if ($materialResult) {
    $materialRow = mysqli_fetch_assoc($materialResult);
    $material_id = $materialRow['material_id'];

    $insertAssignmentQuery = "INSERT INTO assignment (assignment_title, description, file_attachment, start_date, due_date, total_score, user_id, course_id, material_id) 
                        VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?, ?)";
    $stmtAssignment = mysqli_prepare($conn, $insertAssignmentQuery);

    if ($stmtAssignment) {
        mysqli_stmt_bind_param($stmtAssignment, "ssssisii", $assignTitle, $assignDescription, $assignFile, $startDateTime, $assignScore, $user_id, $course_id, $material_id);

        if (mysqli_stmt_execute($stmtAssignment)) {
            $assignment_id = mysqli_insert_id($conn);

            $getStudentsQuery = "SELECT student_id FROM student_subject WHERE course_id = '$course_id'";
            $studentsResult = mysqli_query($conn, $getStudentsQuery);

            if ($studentsResult) {
                while ($studentRow = mysqli_fetch_assoc($studentsResult)) {
                    $student_id = $studentRow['student_id'];

                    $insertSubmissionQuery = "INSERT INTO submission (assignment_id, student_id, submit_file, send_date, score, status) 
                                        VALUES (?, ?, '', '', 0, 'unsubmited')";
                    $stmtSubmission = mysqli_prepare($conn, $insertSubmissionQuery);

                    if ($stmtSubmission) {
                        mysqli_stmt_bind_param($stmtSubmission, "ii", $assignment_id, $student_id);

                        if (!mysqli_stmt_execute($stmtSubmission)) {
                            echo "Error executing prepared statement for submission: " . mysqli_error($conn);
                        }

                        mysqli_stmt_close($stmtSubmission);
                    } else {
                        echo "Error preparing statement for submission: " . mysqli_error($conn);
                    }
                }

                echo "Assignment and submission inserted successfully for all students!";
                echo "<script>window.location = '../coursepage.php?course_id=$course_id';</script>";
            } else {
                echo "Error fetching students: " . mysqli_error($conn);
            }
        } else {
            echo "Error executing prepared statement for assignment: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmtAssignment);
    } else {
        echo "Error preparing statement for assignment: " . mysqli_error($conn);
    }
} else {
    echo "Error fetching material_id: " . mysqli_error($conn);
}

mysqli_close($conn);
