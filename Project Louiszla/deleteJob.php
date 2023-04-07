<?php
include("extension.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($connect, $_POST['jobid']);
    $q = "DELETE FROM jobs WHERE JobId = '$id' LIMIT 1";
    $result = @mysqli_query($connect, $q);

    if (mysqli_affected_rows($connect) == 1) {
        echo 'DELETED';
    } else {
        echo 'ERROR:';
        echo mysqli_error($connect);
    }
    mysqli_close($connect);
}
?>