<?php
include('config.php');
if (isset($_POST['add'])) {
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $ID = $_POST['id'];
    $insert = "INSERT INTO addcard (name, price) VALUES ('$NAME','$PRICE')";
    mysqli_query($con, $insert);
    mysqli_close($con);
    header('location: \..\customer\card.php');
}
?>
