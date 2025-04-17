<?php
include('user/config.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$ID");
header('location: prouducts.php')
?>