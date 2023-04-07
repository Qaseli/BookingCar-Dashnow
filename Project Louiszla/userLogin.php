<?php
    include("extension.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $e = mysqli_real_escape_string($connect, $_POST['emailAddress']);
    $p = mysqli_real_escape_string($connect, $_POST['Password']);
    $q = "SELECT * FROM user WHERE (userEmail = '$e' AND userPassword = '$p')";
    $result = mysqli_query($connect, $q);

    if (@mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo "SUCCESS:";
        echo $row['userName'].";".$row['userEmail'].";".$row['userPhone'].";".$row['userBirth'].";".$row['userAddress'].";".$row['userCountry'].";".$row['userCity'];
        
        exit();

        mysqli_free_result($result);
        mysqli_close($connect);
    } else {
        $er = "ERROR:Email does not match with password";
        echo $er;
    }
    mysqli_close($connect);
}
?>