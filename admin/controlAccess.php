<?php
<<<<<<< HEAD
<<<<<<< HEAD
include('Function\config.php');
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

>>>>>>> 877e22e (marge head.php & list.php)
=======
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
session_start();
$id   = $_SESSION['id'];


if (isset($_POST['submit'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '0' WHERE id = '$id'")
<<<<<<< HEAD
<<<<<<< HEAD
    or die('query failed');
    header("Location: BU.php");
} elseif (isset($_POST['submit2'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '1' WHERE id = '$id'")
    or die('query failed');
    header("Location: BU.php");
=======
        or die('query failed');
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/BU.php");
} elseif (isset($_POST['submit2'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '1' WHERE id = '$id'")
        or die('query failed');
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/BU.php");
>>>>>>> 877e22e (marge head.php & list.php)
=======
        or die('query failed');
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/BU.php");
} elseif (isset($_POST['submit2'])) {
    $q = mysqli_query($con, "UPDATE user_info SET canAccess = '1' WHERE id = '$id'")
        or die('query failed');
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/BU.php");
>>>>>>> 877e22ea1a3d0d422c58cfd4b20dc4ca4b7483a4
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