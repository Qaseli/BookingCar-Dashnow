<?php
    include("extension.php");
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {

        $e = mysqli_real_escape_string ($connect ,trim ($_POST['user']));
        $id = mysqli_real_escape_string ($connect ,trim ($_POST['jobID']));

        $q = "UPDATE jobs SET user='$e' WHERE JobID=$id";

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