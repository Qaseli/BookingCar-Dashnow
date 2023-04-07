<?php
include("extension.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $e = mysqli_real_escape_string($connect, trim($_POST['userEmail']));
    // $p = mysqli_real_escape_string($connect, trim($_POST['Password']));
    $n = mysqli_real_escape_string($connect, trim($_POST['userName']));
    $ph = mysqli_real_escape_string($connect, trim($_POST['userPhone']));
    $dob = mysqli_real_escape_string($connect, trim($_POST['userBirth']));
    $a = mysqli_real_escape_string($connect, trim($_POST['userAddress']));
    $country = mysqli_real_escape_string($connect, trim($_POST['userCountry']));
    $city = mysqli_real_escape_string($connect, trim($_POST['userCity']));

    //register the user in the database
    //make the query
    $q = "UPDATE user SET userName='$n', userPhone='$ph', userBirth='$dob', 
    userAddress='$a',userCountry='$country', userCity='$city' WHERE userEmail='$e' LIMIT 1";

    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo "SUCCESS";
        exit();
    } else {
        echo "System Error";
        echo mysqli_error($connect) . " Query: $q";
    }

    mysqli_close($connect);
    exit();
}
?>