<?php
include("extension.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['jobID'])){
        $id = mysqli_real_escape_string($connect, trim($_POST['jobID']));
        $q = "SELECT * FROM jobs WHERE JobID='$id'";
        $result = @mysqli_query($connect,$q);
        if($result){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo "SUCCESS:";
            echo $row['Origin'].';'.$row['Destination'].';'.$row['Date1'].';'.$row['Date2'].';'.$row['BrandCar'].';'.$row['imageCar'].';'.$row['PriceCar'];
            
            mysqli_free_result($result);
            mysqli_close($connect);
            exit();
        }
    }
    
    $q = "SELECT JobID, Origin, Destination, Date1, Date2, BrandCar, PriceCar FROM jobs";
    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo '<table>
        <tr>
        <th>Origin</th>
        <th>Destination</th>
        <th>From</th>
        <th>To</th>
        <th>Car</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
        <td>' . $row['Origin'] . '</td>
        <td>' . $row['Destination'] . '</td>
        <td>' . $row['Date1'] . '</td>
        <td>' . $row['Date2'] . '</td>
        <td>' . $row['BrandCar'] . '</td>
        <td>' . $row['PriceCar'] . '</td>
        <td><a href="./editJob.html?jobid=' . $row['JobID'] . '">EDIT</a></td>
        <td onclick="ask(\''.$row['JobID'].'\')" style="cursor:pointer;">DELETE</td>
        </tr>';
    }
    echo "</table>";
    
    mysqli_free_result($result);
}
else {
    echo '<p class = "error">The current user could not be retrieved. 
    We apologize for any inconvenience.</p>';

    echo '<p>' . mysqli_error($connect) . '<br>Query: ' . $q . '</p>';
}
}
else if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $q = "SELECT * FROM jobs WHERE user IS NULL";
    $result = @mysqli_query($connect, $q);
    if ($result) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo $row['Origin'].','.$row['Destination'].','.$row['Date1'].','.$row['Date2'].','.$row['BrandCar'].','.$row['imageCar'].','.$row['PriceCar'].','.$row['JobID']."\n";
        }
    }else{
        echo "ERROR";
    }
}
mysqli_close($connect);
?>