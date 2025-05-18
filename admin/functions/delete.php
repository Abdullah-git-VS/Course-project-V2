<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM user_info WHERE id=$ID");
mysqli_close($con);
header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/users.php");
?>