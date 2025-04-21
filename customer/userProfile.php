<?php
session_start();
include('..\admin\Function\config.php');

$userID = $_SESSION['user_id'];
$select = mysqli_query($con, "SELECT * FROM user_info where id = '$userID' ");
$row =  mysqli_fetch_assoc($select);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo"Welcome " . $row['name'] . "<br>";?>
    <?php echo"Email: " . $row['email'] . "<br>";?>
    <a href='../user_Page.php'>Home page</a>
    <a href='userProfile.php?loguot=1' style='color:red'>Logout</a>
</body>
</html>