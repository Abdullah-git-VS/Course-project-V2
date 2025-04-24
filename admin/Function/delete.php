<?php
include('config.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM user_info WHERE id=$ID");
mysqli_close($con);
header('location: ..\users.php')
?>