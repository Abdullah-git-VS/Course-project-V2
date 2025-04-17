<?php
include('config.php');

if (isset($_POST['update'])) {
    $ID_o = $_POST['o'];
    $ID_n = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location,'images/'.$image_name);
    $image_up = "images/".$image_name;
    $update = "UPDATE products SET name='$NAME' , price='$PRICE', image='$image_up', id='$ID_n' WHERE id=$ID_o";
    mysqli_query($con, $update);
    mysqli_close($con);
    header('location: test.php');
}
?>