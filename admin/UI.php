<?php

include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");


$sql = "SELECT id, name, email FROM user_info WHERE id = ? ";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name, $email);
$stmt->fetch();
$stmt->close();
echo"<style>table, td, th{
border:3px solid black;
border-collapse:collapse;
width:300px;
height:50px;
}</style>";
echo "<table>";
echo "<tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>";
echo "<tr>
        <td>$id</td>
        <td>$name</td>
        <td>$email</td>
      </tr>";
echo "</table>";

mysqli_close($con);
?>