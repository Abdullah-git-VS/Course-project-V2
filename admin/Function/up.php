<?php
<<<<<<< HEAD
<<<<<<< HEAD
include('config.php');
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

>>>>>>> 877e22e (marge head.php & list.php)
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
if (isset($_POST['update'])) {
    $ID_o = $_POST['o'];
    $ID_n = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location, 'images/' . $image_name);
    $image_up = "images/" . $image_name;
    $update = "UPDATE products SET name='$NAME' , price='$PRICE', image='$image_up', id='$ID_n' WHERE id=$ID_o";
    mysqli_query($con, $update);
    mysqli_close($con);
<<<<<<< HEAD
<<<<<<< HEAD
    header('location: ../add.php');
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/add.php");
>>>>>>> 877e22e (marge head.php & list.php)
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/add.php");
>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
}
