<?php
include('admin\Function\config.php');
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:home_Page.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();

  if (file_exists('home_Page.php')) {
    header('Location: home_Page.php');
    exit;
  } else {
    header('Location: \home_Page.php');
    exit;
  }
};
?>

<?php
$select_user = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
  $fetch_user = mysqli_fetch_assoc($select_user);
};
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="\hide_style.css">
  <link rel="stylesheet" href="hide_style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <?php include "list.php"; ?>
  <?php  $title = "user page";
        include "header.php"; ?>

</body>

</html>