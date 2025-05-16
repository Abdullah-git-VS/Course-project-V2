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
    $EMAIL = $_POST['email'];
    $IMAGE = $_FILES['profile_pic'];
    $image_location = $_FILES['profile_pic']['tmp_name'];
    $image_name = $_FILES['profile_pic']['name'];
    move_uploaded_file($image_location, 'pics/' . $image_name);
    $image_up = "pics/" . $image_name;
    $update = "UPDATE user_info SET name='$NAME' , email='$EMAIL', profile_pic='$image_up', id='$ID_n' WHERE id=$ID_o";
    mysqli_query($con, $update);
    mysqli_close($con);
<<<<<<< HEAD
<<<<<<< HEAD
    header('location: ../users_update.php');
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/users_update.php");
>>>>>>> 877e22e (marge head.php & list.php)
=======
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/users_update.php");
>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
}
