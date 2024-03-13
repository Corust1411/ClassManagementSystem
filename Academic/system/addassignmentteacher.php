<?php
session_start();
include 'connectdatabase.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form values to variables
    $assignTitle = $_POST['assignTitle'];
    $assignDescription = $_POST['assignDescription'];
    $assignDate = $_POST['assignDate'];
    $assignTime = $_POST['assignTime'];
    $assignScore = $_POST['assignscore'];
    $user_id = $_SESSION["user_id"];
    $course_id = $_POST['role'];
    if (is_uploaded_file($_FILES['assignFile']['tmp_name'])) {
        $assignFile = 'assignment_' . uniqid() . "." . pathinfo(basename($_FILES['assignFile']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "../system/assignmentfile/" . $assignFile;
        move_uploaded_file($_FILES['assignFile']['tmp_name'], $image_upload_path);
    } else {
        $assignFile = "";
    }

    $dueDateTime = $assignDate . ' ' . $assignTime;

    $materialQuery = "SELECT material_id FROM material WHERE material_name = 'ASSIGNMENT' AND course_id = '$course_id'";
    $materialResult = $db->query($materialQuery);

    if ($materialResult) {
        $materialRow = $materialResult->fetchArray(SQLITE3_ASSOC);
        $material_id = $materialRow['material_id'];

        // Prepare SQL statement to insert data into the assignment table
        $sql = "INSERT INTO assignment (assignment_title, description,file_attachment, start_date, due_date, total_score, user_id, course_id, material_id) 
            VALUES ('$assignTitle', '$assignDescription','$assignFile', CURRENT_TIMESTAMP(), '$dueDateTime', '$assignScore', '$user_id', '$course_id', '$material_id')";

        // Execute SQL query
        if ($db->exec($sql)) {
            echo "Assignment added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $db->lastErrorMsg();
        }
    }
}

// Close the database connection
$db->close();
