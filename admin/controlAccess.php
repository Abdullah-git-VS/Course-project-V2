<?php
include('Function\config.php');
session_start();
$id   = $_SESSION['id'];


if (isset($_POST['submit'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '0' WHERE id = '$id'")
    or die('query failed');
    header("Location: BU.php");
} elseif (isset($_POST['submit2'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '1' WHERE id = '$id'")
    or die('query failed');
    header("Location: BU.php");
}
mysqli_close($con);
?>
<!DOCTYPE html>
<title>User accessability control</title>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../customer/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">

</head>
<body>
    <form action='' method='post'>
        <button type='submit' name='submit'>Ban User</button>
        <button type='submit' name='submit2'>Unban User</button>
    </form>
</body>
</html>