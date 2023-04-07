<?php
    include("extension.php");
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {

        $n = mysqli_real_escape_string ($connect ,trim ($_POST['userName']));
        $ph = mysqli_real_escape_string ($connect ,trim ($_POST['mobileNumber']));
        $e = mysqli_real_escape_string ($connect ,trim ($_POST['emailAddress']));
        $p = mysqli_real_escape_string ($connect ,trim ($_POST['Password']));

        $result = @mysqli_query($connect, "SELECT userName FROM user WHERE userEmail = '$e'");
        $test = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($test){
            echo "ERROR:EXIST";
            exit();
        }

            //register the user in the database
            //make the query
        $q = "INSERT INTO user (userName, userEmail, userPassword, userPhone, userBirth,
        userAddress,userCountry, userCity) VALUES ('$n','$e','$p','$ph',
        '','','','')";

        $result = @mysqli_query($connect,$q);
        if ($result)
        {
            // echo "{'result':'ok','data':'Register success'}";
            echo "SUCCESS";
            exit();
        }
        else
        {
            // echo "{'result':'ok','data':'".mysqli_error($connect) . "Query: $q'}";
            echo "ERROR";
            echo mysqli_error($connect) . "Query: $q";
        }
        
        mysqli_close($connect);
        exit();
    }
    ?>