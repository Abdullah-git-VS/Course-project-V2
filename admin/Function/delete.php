<?php
<<<<<<< HEAD
<<<<<<< HEAD
include('config.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$ID");
mysqli_close($con);
header('location: ..\prouducts.php')
?>
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$ID");
mysqli_close($con);
header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/prouducts.php");
>>>>>>> 877e22e (marge head.php & list.php)
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$ID");
mysqli_close($con);
header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/prouducts.php");
>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
