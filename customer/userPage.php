<?php
include('..\shared\functions\config.php');
session_start();
$user_id = $_SESSION['user_id'];
$isAdmin=$_SESSION['isAdmin'];

if (!isset($user_id)) {
  header('location:../shared/homePage.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();

  if (file_exists('../shared/homePage.php')) {
    header('Location: ../shared/homePage.php');
    exit;
  } else {
    header('Location: ../shared/homePage.php');
    exit;
  }
};
?>

<?php
$select_user = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_user) > 0) {
  $fetch_user = mysqli_fetch_assoc($select_user);
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="../shared/css/headerList.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"> -->

</head>

<body>

  <?php include "../shared/list.php"; ?>

  <?php
    $title = "user page";
    include "../shared/header.php";
  ?>

  <!-- <div class="image-container">
    <img src="images/animals.png" alt="Animals" class="bg-image">
  </div> -->



</body>

</html>