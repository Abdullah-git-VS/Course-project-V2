<?php
include('config.php');

if (isset($_POST['upload'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price']."$";
    $source = $_FILES['image']['tmp_name'];
    $target = "../../shared/images/".$_FILES['image']['name'];
    $target2="images/".$_FILES['image']['name'];
    if(move_uploaded_file($source,$target)) {

    } else {
        echo"Error in uploading the image";
    }
    $insert = "INSERT INTO products (name,price,image) VALUES('$NAME','$PRICE','$target2')";
    mysqli_query($con, $insert);
    mysqli_close($con);
}
header('location: ../add.php');
?>