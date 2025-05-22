<?php
include("config.php");
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM products WHERE id=$ID");
mysqli_close($con);
header("Location: ../../shared/products.php");
?>