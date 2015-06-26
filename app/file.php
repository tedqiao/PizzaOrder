<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model {

    function upload($target_file,$file) {
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($file);
            if ($check !== false) {
                return "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                return "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            return "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["uploadimage"]["size"] > 500000) {
            return "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file, $target_file)) {
                return true;
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }

}
