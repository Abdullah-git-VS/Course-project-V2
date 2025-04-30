<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\logout.php");
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
  <?php $title = "user page";
  include($_SERVER["DOCUMENT_ROOT"] . "\list.php"); ?>


</body>

</html>