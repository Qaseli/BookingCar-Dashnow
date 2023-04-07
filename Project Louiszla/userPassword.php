<?php
include("extension.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $e = mysqli_real_escape_string($connect, trim($_POST['userEmail']));
    $p = mysqli_real_escape_string($connect, trim($_POST['password']));

    //register the user in the database
    //make the query
    $q = "UPDATE user SET userPassword='$p' WHERE userEmail='$e' LIMIT 1";

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