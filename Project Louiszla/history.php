<?php
    include("extension.php");
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {

        $e = mysqli_real_escape_string ($connect ,trim ($_POST['user']));

        $q = "SELECT * FROM jobs WHERE user='$e'";

        $result = @mysqli_query($connect,$q);
        if ($result)
        {
            // echo "{'result':'ok','data':'Register success'}";
            // echo "SUCCESS:".$row['Origin'].','.$row['Destination'].','.$row['Date1'].','.$row['Date2'].','.$row['BrandCar'].','.$row['imageCar'].','.$row['PriceCar'].$row['JobID']."\n";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo $row['Origin'].','.$row['Destination'].','.$row['Date1'].','.$row['Date2'].','.$row['BrandCar'].','.$row['imageCar'].','.$row['PriceCar'].','.$row['JobID']."\n";
            }
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