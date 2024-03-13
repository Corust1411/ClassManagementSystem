<?php
session_start();
include 'connectdatabase.php'; 



$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {

        if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
            $pictureName = 'profile_' . uniqid() . "." . pathinfo(basename($_FILES['picture']['name']), PATHINFO_EXTENSION);
            $image_upload_path = "../system/profilepictures/" . $pictureName;
            move_uploaded_file($_FILES['picture']['tmp_name'], $image_upload_path);
        } else {
            $pictureName = "";
        }

        $sql = "UPDATE user SET profile_picture = '$pictureName' WHERE user_id = $user_id";
        $result = $db->exec($sql);

        if (!$result) {
            echo "Failed to update profile picture: " . $db->lastErrorMsg();
            exit;
        }
    }

    if (isset($_POST['oldpassword']) && isset($_POST['newpassword'])) {
        $oldPassword = $_POST['oldpassword'];
        $newPassword = $_POST['newpassword'];

        $sql = "SELECT password FROM user WHERE user_id = $user_id";
        $result = $db->querySingle($sql);

        if ($result === $oldPassword) {

            $sql = "UPDATE user SET password = '$newPassword' WHERE user_id = $user_id";
            $result = $db->exec($sql);

            if (!$result) {
                echo "Failed to update password: " . $db->lastErrorMsg();
                exit;
            }
        } else {
            echo "Old password does not match.";
            echo "<script>alert('Old password does not match.');</script>";
            echo "<script>window.location = '../page/setting.php';</script>";
            exit;
        }
    }
}

echo "<script>window.location = '../page/setting.php';</script>";
exit;
