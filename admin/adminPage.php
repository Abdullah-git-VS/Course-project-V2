<?php
session_start();
if($_SESSION['isAdmin'] == 0) {
   header("Location: ../customer/userPage.php");
}
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
include("../admin/functions/restrictions.php");
?>
<?php
$select_user = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
  $fetch_user = mysqli_fetch_assoc($select_user);
};
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <?php $title = "Admin Page";
  include($_SERVER["DOCUMENT_ROOT"] . "\shared\header.php");
  include($_SERVER["DOCUMENT_ROOT"] . "\admin\admine_list.php"); ?>
  <?php
  print_r($_SESSION);
  ?>
</body>

</html>