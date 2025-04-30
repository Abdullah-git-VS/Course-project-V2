<?php
<<<<<<< HEAD
include('config.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM user_info WHERE id=$ID");
mysqli_close($con);
header('location: ..\users_list.php')
?>
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM user_info WHERE id=$ID");
mysqli_close($con);
header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/users_list.php");
>>>>>>> 877e22e (marge head.php & list.php)
