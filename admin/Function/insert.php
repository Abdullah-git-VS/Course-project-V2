<?php
include($_SERVER["DOCUMENT_ROOT"]."\admin\Function\config.php");

if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/".$image_name;
    $insert = "INSERT INTO products (name,price,image) VALUES('$NAME','$PRICE','$image_up')";
    mysqli_query($con, $insert);
    mysqli_close($con);
}
header("Location: http://".$_SERVER['HTTP_HOST']."/admin/add.php");
?>
!