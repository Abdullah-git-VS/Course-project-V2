<?php
include('Function\config.php');
$sql = "SELECT id, name, email FROM `user_info` WHERE id = ? ";
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name, $email);
$stmt->fetch();
$stmt->close();
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>