<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
if (isset($_POST['update'])) {
    $ID_o = $_POST['o'];
    $ID_n = $_POST['id'];
    $NAME = $_POST['name'];
    $EMAIL = $_POST['email'];
    $IMAGE = $_FILES['profile_pic'];
    $image_location = $_FILES['profile_pic']['tmp_name'];
    $image_name = $_FILES['profile_pic']['name'];
    move_uploaded_file($image_location,'pics/'.$image_name);
    $image_up = "images/".$image_name;
    $update = "UPDATE user_info SET name='$NAME' , email='$EMAIL', profile_pic='$image_up', id='$ID_n' WHERE id=$ID_o";
    mysqli_query($con, $update);
    mysqli_close($con);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/add.php");
}
?>