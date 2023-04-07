<?php
include("extension.php");
?>
<?php
$q = "SELECT userName, userEmail, userPhone, userBirth FROM user";

$result = @mysqli_query($connect, $q);
if ($result) {
    echo '<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>DOB</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>
        <td>' . $row['userName'] . '</td>
        <td>' . $row['userEmail'] . '</td>
        <td>' . $row['userPhone'] . '</td>
        <td>' . $row['userBirth'] . '</td>
        <td><a href="./userProfile.html?user=' . $row['userEmail'] . '">EDIT</a></td>
        <td onclick="ask(\''.$row['userEmail'].'\')" style="cursor:pointer;">DELETE</td>
        </tr>';
    }
    echo "</table>";

    mysqli_free_result($result);
} else {
    echo '<p class = "error">The current user could not be retrieved. 
    We apologize for any inconvenience.</p>';

    echo '<p>' . mysqli_error($connect) . '<br>Query: ' . $q . '</p>';
}
mysqli_close($connect);
?>