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
<?php
include('config.php');
session_start();
$Id = $_GET['id'];
$name=$_GET['name'];
$price=$_GET['price'];
$userId=$_SESSION['user_id'];
    $sql = "SELECT * FROM `order` WHERE userID = $userId ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $lastOrderId = $row['id'];
    if($row['vehicle'] == "") {
        mysqli_query($con, "DELETE FROM `order` WHERE id='$lastOrderId'");
    }


mysqli_query($con, "INSERT INTO `order`(product, userId) VALUES('$name', '$userId') ");
mysqli_close($con);
header('location: ../../customer/order.php');
?>