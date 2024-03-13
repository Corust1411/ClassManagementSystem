<?php
include 'connectdatabase.php';
session_start();



if (!$db) {
    echo $db->lastErrorMsg();
} else {
    // echo "Opened database successfully<br>";
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$ret = $db->query($sql);
$row = $ret->fetchArray(SQLITE3_ASSOC);
if ($row) {
    session_regenerate_id();
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["firstname"] = $row['firstname'];
    $_SESSION["lastname"] = $row['lastname'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["loggedin"] = true;
    $_SESSION["role"] = $row['role'];
    $_SESSION["profile_picture"] = $row['profile_picture'];
    $_SESSION["login"] = true;

    switch ($_SESSION["role"]) {
        case 'student':
            $studentQuery = "SELECT student_id FROM student WHERE user_id = '{$row['user_id']}'";
            $studentResult = $db->query($studentQuery);
            $studentRow = $studentResult->fetchArray(SQLITE3_ASSOC);

            if ($studentRow) {
                $_SESSION["student_id"] = $studentRow['student_id'];
            }

            header("location: ../page/studentindex.php");
            break;
        case 'teacher':
            $teacherQuery = "SELECT teacher_id FROM teacher WHERE user_id = '{$row['user_id']}'";
            $teacherResult = $db->query($teacherQuery);
            $teacherRow = $teacherResult->fetchArray(SQLITE3_ASSOC);

            if ($teacherRow) {
                $_SESSION["teacher_id"] = $teacherRow['teacher_id'];
            }
            header("location: ../page/teacherindex.php");
            break;
        case 'academic':
            header("location: ../Academic/dashboard.php");
            break;
        default:
            header("location: ../page/studentindex.php");
            break;
    }
} else {
    echo "<script>alert('รหัสผ่าน หรือ ชื่อผู้ใช้งานไม่ตรงกัน');</script>";
    echo "<script> window.location = '../page/login.php'; </script>";
}

$db->close();
