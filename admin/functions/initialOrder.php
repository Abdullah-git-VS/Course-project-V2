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
include('../functions/config.php');
session_start();
$Id = $_GET['id'];
$name=$_GET['name'];
$price=$_GET['price'];
$userId=$_SESSION['user_id'];

    $sql = "SELECT * FROM cart WHERE user_id = $userId ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);
    $lastOrderId = $row['id'];
    if($row['vehicle'] == "") {
        mysqli_query($con, "DELETE FROM cart WHERE id='$lastOrderId'");
    }
    mysqli_query($con, "INSERT INTO cart(name, user_id, price, productId) VALUES('$name', '$userId','$price', '$Id') ") or die("failed");
    header("Location: ../../customer/order.php");
    
    } else {
        mysqli_query($con, "INSERT INTO cart(name, user_id, price, productId) VALUES('$name', '$userId','$price', '$Id') ") or die("failed");
        header("Location: ../../customer/order.php");
    }
    mysqli_close($con);
    



?>