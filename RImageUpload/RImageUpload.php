<?php

    // User Settings
    require('RConfig.php');

    // Image Type Control
    function typeControl($type) {
        $explode_type = explode('/', $type)[0];
        if ($explode_type == "image") {
            return true;
        } else {
            return false;
        }
    }

    // Image Size Control
    function sizeControl($size) {
        global $max_file_size; // Settings from RConfig file
        // Size to MB
        $sizetomb = number_format($size / 1048576, 3);
        
        if ($sizetomb > $max_file_size) {
            return false;
        } else {
            return true;
        }
    }

    // Image Upload Function
    function uploadImage($image, $quality) {
        global $max_file_size;
        global $upload_folder;

        $name = $image['name'];
        $type = $image['type'];
        $tmp_name = $image['tmp_name'];
        $error = $image['error'];
        $size = $image['size'];
        $sizetomb = number_format($size / 1048576, 3);
        $hashedname = time() . hash('crc32', $name) . ".jpg";
        $control_type = explode('/', $type);

        if (typeControl($type) == true) {
            echo $type . " it is a image file!";
            if (sizeControl($size) == true) {
                echo "<p>Your image size before compress ". $sizetomb . "MB</p>";
                // After control
                list($width, $height) = getimagesize($tmp_name);
                $ictc = imagecreatetruecolor($width, $height);
                $image = imagecreatefromstring(file_get_contents($tmp_name));
                imagecopyresampled($ictc, $image, 0,0,0,0, $width, $height, $width, $height);
                // Create Image
                imagejpeg($ictc, $upload_folder.'/'.$hashedname, $quality);
                $img = $upload_folder . '/' . $hashedname;
                $newimg = filesize($img);
                $newsize = number_format($newimg / 1048576, 3);
                $comparison = $sizetomb - $newsize . "MB";
                echo "<p>Your image size after compress ". $newsize . "MB</p>";
                echo "<p style='green'>You saved ". $comparison . "</p>";
                echo "<a href='".$upload_folder.'/'.$hashedname."' download='".$upload_folder.'/'.$hashedname."'>Download Image</a>";
                return $img;
            } else {
                echo "<p style='color: red'>" . $max_file_size . "MB max file size!</p>"; // Error max file size
            }
        }
    }

    // POST Control Check File and Upload
    if (isset($_POST['upload']) && isset($_FILES['image'])) {
        $img = uploadImage($_FILES['image'], $_POST['quality']); // use $img for the image URL
    }

?>