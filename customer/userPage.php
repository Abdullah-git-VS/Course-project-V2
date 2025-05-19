<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
$user_id = $_SESSION['user_id'];
$isAdmin = $_SESSION['isAdmin'];
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
  <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
 

</head>

<body>

    <!-- include of header and list -->
    <?php
    $title = "user Page";
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\header.php");
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");
    ?>

  



</body>

</html>