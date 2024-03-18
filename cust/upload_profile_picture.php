<?php
session_start();
require_once "../koneksi.php";

if (empty($_SESSION['username'])) {
    header("Location: ../error.php");
    exit();
}

$uploadDirectory = "profile_pictures/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES["profile_picture"]["name"])) { // Check if a file has been selected
        $originalFileName = basename($_FILES["profile_picture"]["name"]);
        $targetFile = $uploadDirectory . $originalFileName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = 0;
        }

        // Get the old profile picture path
        $username = $_SESSION['username'];
        $oldProfileQuery = "SELECT profile_picture FROM akun WHERE username='$username'";
        $oldProfileResult = mysqli_query($koneksi, $oldProfileQuery);

        if ($oldProfileResult && mysqli_num_rows($oldProfileResult) > 0) {
            $oldProfileRow = mysqli_fetch_assoc($oldProfileResult);
            $oldProfilePath = $oldProfileRow['profile_picture'];

            // Delete the old profile picture
            if (file_exists($oldProfilePath) && $oldProfilePath != $targetFile) {
                unlink($oldProfilePath);
            }
        }

        if (file_exists($targetFile)) {
            // If file already exists, generate a new unique name
            $counter = 1;
            $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME);
            while (file_exists($uploadDirectory . $newFileName . "_" . $counter . "." . $imageFileType)) {
                $counter++;
            }
            $targetFile = $uploadDirectory . $newFileName . "_" . $counter . "." . $imageFileType;
        }

        if ($_FILES["profile_picture"]["size"] > 500000) {
            $uploadOk = 0;
        }

        $allowedFormats = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
                $username = $_SESSION['username'];
                $profilePicturePath = $targetFile;

                $updateQuery = "UPDATE akun SET profile_picture='$profilePicturePath' WHERE username='$username'";
                $result = mysqli_query($koneksi, $updateQuery);

                if ($result) {
                    header("Location: home.php");
                    exit();
                } else {
                    echo "Error updating profile picture in the database.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please select a file.";
    }
}
?>
