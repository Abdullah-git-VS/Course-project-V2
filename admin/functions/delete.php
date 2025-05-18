<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM user_info WHERE id=$ID");
mysqli_close($con);
header('location: ..\users.php')
?>