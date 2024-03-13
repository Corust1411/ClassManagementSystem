<?php
include 'connectdatabase.php';
session_start();


$course_id = $_GET['course_id'];
$postrole = $_POST['postrole'];
$lessonTitle = $_POST['lessonTitle'];
$lessonContent = $_POST['lessonContent'];
$materialname = $_POST['materialname'];
$material_id = $_POST['postmaterial'];
$user_id = $_SESSION["user_id"];
$role = $_SESSION['role'];

if (is_uploaded_file($_FILES['lessonFile']['tmp_name'])) {
    $lessonFileimage = 'lesson_' . uniqid() . "." . pathinfo(basename($_FILES['lessonFile']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../system/coursefile/" . $lessonFileimage;
    move_uploaded_file($_FILES['lessonFile']['tmp_name'], $image_upload_path);
} else {
    $lessonFileimage = "";
}

if ($postrole === 'material') {
    $sql = "INSERT INTO `material` (material_name, course_id) VALUES ('$materialname', '$course_id')";
    $result = $db->exec($sql);

    if (!$result) {
        echo "Failed to insert material: " . $db->lastErrorMsg();
        exit;
    }
} elseif ($postrole === 'post') {
    $sql = "INSERT INTO `topic` (topic_title, topic_description, material_id, date_upload, topic_file, user_id) 
            VALUES ('$lessonTitle', '$lessonContent', '$material_id', CURRENT_TIMESTAMP, '$lessonFileimage', '$user_id')";
    // echo "Data inserted successfully.";
    $result = $db->exec($sql);

    if (!$result) {
        echo "Failed to insert post: " . $db->lastErrorMsg();
        exit;
    }
}

echo "Data inserted successfully.";
if ($role === 'student') {
    echo "<script>window.location = '../../page/course_studentpage.php?course_id=$course_id';</script>";
    echo "<script>location.reload(true);</script>";
} elseif ($role === 'teacher') {
    echo "<script>window.location = '../../page/course_teacherpage.php?course_id=$course_id';</script>";
    echo "<script>location.reload(true);</script>";
} else {

    echo "<script>window.location = '../coursepage.php?course_id=$course_id';</script>";
    echo "<script>location.reload(true);</script>";
}

echo "Data inserted successfully.";
// echo "<script>window.location = '../coursepage.php?course_id=$course_id';</script>";
echo "<script>location.reload(true);</script>";
