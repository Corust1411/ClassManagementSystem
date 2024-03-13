<?php
include 'connectdatabase.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phonenum = $_POST['phonenum'];
    $role = $_POST['role'];
    $faculty = isset($_POST['faculty']) ? $_POST['faculty'] : null;

    function generateRandomPassword($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    } // Generate random password
    $password = generateRandomPassword(10);

    // Function to generate random password


    // Check if profile picture is uploaded
    if (isset($_FILES['profile_picture']) && is_uploaded_file($_FILES['profile_picture']['tmp_name'])) {
        // Generate unique file name
        $profile_picture = 'profile_' . uniqid() . "." . pathinfo(basename($_FILES['profile_picture']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "../system/profilepictures/" . $profile_picture;
        // Move uploaded file to destination
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $image_upload_path);
    } else {
        $profile_picture = "";
    }



    if ($db) {

        $sql = "INSERT INTO `user` (firstname, lastname, email, password, dob, gender, phonenum, profile_picture, role)
                VALUES (:firstname, :lastname, :email, :password, :dob, :gender, :phonenum, :profile_picture, :role)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phonenum', $phonenum);
        $stmt->bindParam(':profile_picture', $profile_picture);
        $stmt->bindParam(':role', $role);

        // Execute the statement
        $result = $stmt->execute();

        if ($result) {
            // Retrieve the last inserted user ID
            $user_id = $db->lastInsertRowID();

            // Check role and insert additional data accordingly
            if ($role === 'student') {
                // Insert student details
                $insertStudentSql = "INSERT INTO student (user_id, role, year ,gpa, total_credit, faculty) VALUES (:user_id, 'student', 0, 0,0, :faculty)";
                $stmtStudent = $db->prepare($insertStudentSql);
                $stmtStudent->bindParam(':user_id', $user_id);
                $stmtStudent->bindParam(':faculty', $faculty);
                $resultStudent = $stmtStudent->execute();

                if ($resultStudent) {
                    // Retrieve the last inserted student ID
                    $student_id = $db->lastInsertRowID();
                    echo "<script> window.location = '../reg.php'; </script>";
                } else {
                    // Handle error in inserting student data
                    echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูลผู้เรียน');</script>";
                }
            } elseif ($role === 'teacher') {
                // Insert teacher details
                $insertTeacherSql = "INSERT INTO teacher (user_id, role, faculty) VALUES (:user_id, 'teacher', 'none')";
                $stmtTeacher = $db->prepare($insertTeacherSql);
                $stmtTeacher->bindParam(':user_id', $user_id);
                $resultTeacher = $stmtTeacher->execute();

                if ($resultTeacher) {
                    // Retrieve the last inserted teacher ID
                    $teacher_id = $db->lastInsertRowID();
                    echo "<script> window.location = '../reg.php'; </script>";
                } else {
                    // Handle error in inserting teacher data
                    echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูลผู้สอน');</script>";
                }
            }

            // Redirect after successful insertion

        } else {
            // Error in SQL execution
            echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
            echo $db->lastErrorMsg();
        }
    }
}
