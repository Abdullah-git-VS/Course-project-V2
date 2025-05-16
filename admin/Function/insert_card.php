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
if (isset($_POST['add'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $ID = $_POST['id'];
    $insert = "INSERT INTO addcard (name, price) VALUES ('$NAME','$PRICE')";
    mysqli_query($con, $insert);
    mysqli_close($con);
<<<<<<< HEAD
<<<<<<< HEAD
    header('location: \..\customer\card.php');
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/card.php");
>>>>>>> 877e22e (marge head.php & list.php)
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/card.php");
>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
}
