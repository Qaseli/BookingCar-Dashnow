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

            $id = mysqli_real_escape_string($connect, trim($_POST['jobID']));
            $o = mysqli_real_escape_string($connect, trim($_POST['Origin']));
            $d = mysqli_real_escape_string($connect, trim($_POST['Destination']));
            $d1 = mysqli_real_escape_string($connect, trim($_POST['Date1']));
            $d2 = mysqli_real_escape_string($connect, trim($_POST['Date2']));
            $br = mysqli_real_escape_string($connect, trim($_POST['BrandCar']));
            $i = mysqli_real_escape_string($connect, trim($image));
            $pr = mysqli_real_escape_string($connect, trim($_POST['PriceCar']));

            $q = "UPDATE jobs SET Origin='$o',Destination='$d',Date1='$d1',Date2='$d2',
            BrandCar='$br',imageCar='$i',PriceCar='$pr' WHERE JobID=$id";

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