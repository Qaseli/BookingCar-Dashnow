<?php
    //connect to server
    $connect = mysqli_connect("localhost", "root","" , "dashnow");
    if (!$connect){
        die ( "ERROR: " .mysqli_connect_error());
    }
    ?>