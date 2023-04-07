<?php
    include("extension.php");

    $u = "SELECT COUNT(DISTINCT userEmail) AS 'Total User' FROM user";
    $a = "SELECT COUNT(DISTINCT adminEmail) AS 'Total Admin' FROM admin";
    $p = "SELECT COUNT(DISTINCT JobID) AS 'Total Job' FROM jobs";
    $t = "SELECT COUNT(DISTINCT JobID) AS 'Job Taken' FROM jobs WHERE user IS NOT NULL";

    $tables = [$u, $a, $p, $t];

    foreach($tables as $table){
        $result = mysqli_query($connect, $table);
        echo mysqli_fetch_row($result)[0];
        echo ";";
    }
    mysqli_free_result($result);
    mysqli_close($connect);
    exit();