<?php
include("extension.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "ERROR:Sorry, only JPG, JPEG, PNG & GIF files are allowed.;";

    } else {
        if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
            $image = "$target_dir" . htmlspecialchars(basename($_FILES["Image"]["name"]));

            $o = mysqli_real_escape_string($connect, trim($_POST['Origin']));
            $d = mysqli_real_escape_string($connect, trim($_POST['Destination']));
            $d1 = mysqli_real_escape_string($connect, trim($_POST['Date1']));
            $d2 = mysqli_real_escape_string($connect, trim($_POST['Date2']));
            $br = mysqli_real_escape_string($connect, trim($_POST['BrandCar']));
            $i = mysqli_real_escape_string($connect, trim($image));
            $pr = mysqli_real_escape_string($connect, trim($_POST['PriceCar']));

            $q = "INSERT INTO jobs VALUES 
            ('',null,'$o','$d','$d1','$d2','$br','$i','$pr')";

            $result = @mysqli_query($connect,$q);
            if ($result) {
                echo "SUCCESS";
            } else {
                echo "System Error";
                echo mysqli_error($connect) . " Query: $q";
            }
            mysqli_close($connect);

        } else {
            echo "ERROR:Sorry, there was an error uploading your file.";
        }
    }
}
?>