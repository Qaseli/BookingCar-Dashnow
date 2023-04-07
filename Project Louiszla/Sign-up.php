<?php
    include("extension.php");
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $error = array();

        if (empty ($_POST['adminUsername']))
        {
            $error [] = 'You forgot to the username';
        }
        else 
        {
            $n = mysqli_real_escape_string ($connect ,trim ($_POST['adminUsername']));
        }


        if (empty ($_POST['adminEmail']))
        {
            $error [] = 'You forgot to the phone email Address';
        }
        else 
        {
            $e = mysqli_real_escape_string ($connect ,trim ($_POST['adminEmail']));
        }

        if (empty ($_POST['adminPassword']))
        {
            $error [] = 'You forgot to the Password';
        }
        else 
        {
            $p = mysqli_real_escape_string ($connect ,trim ($_POST['adminPassword']));
        }

        if(count($error)>=1) {
            for ($i=0; $i < count($error) ; $i++) { 
                echo $error[$i];
            }
        }
        else{

            
            //register the user in the database
            //make the query
        $q = "INSERT INTO user (adminUsername, adminEmail, adminPassword) VALUES ('$n','$e','$p',
        '','','','')";

        $result = @mysqli_query($connect,$q);
        if ($result)
        {
            // echo "{'result':'ok','data':'Register success'}";
            echo "<script>localStorage.setItem('adminEmail','$e');
                localStorage.setItem('adminPassword','$p');
                alert('Success register $n');
            window.location.href='./index.html'</script>";
            exit();
        }
        else
        {
            // echo "{'result':'ok','data':'".mysqli_error($connect) . "Query: $q'}";
            echo mysqli_error($connect) . "Query: $q";
        }
        
        mysqli_close($connect);
        exit();
    }
    }
    ?>