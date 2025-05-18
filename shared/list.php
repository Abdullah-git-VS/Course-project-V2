<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\getUser.php");

$user_id = $_SESSION['user_id'];
$user = getUserData($con, $user_id);
$isAdmin=$_SESSION['isAdmin'];
$default_image = 'images/user.png';
$profile_pic = $user['profile_pic'];

// Check if the image file exists and is not empty
if (!empty($profile_pic) && file_exists(BASE_PATH . 'shared/' . $profile_pic)) {
  $image_to_show = $profile_pic;
} else {
  $image_to_show = $default_image;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="<?php echo BASE_URL ."shared/css/headerList.css"; ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>

  <div class="menu">
    <ul>
      <li class="profile">
        <div class="img-box">
          <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/" . $image_to_show; ?>" alt="User Pic">
        </div>
        <h2> <?php echo $user['name']; ?> </h2>
      </li>



      <li>
        <a href="<?php echo BASE_URL . '../customer/order.php'; ?>">
          <i class="fas fa-list"></i>
          <p> order </p>
        </a>
      </li>

      <li>
        <a href="<?php echo BASE_URL . '../customer/cart.php'; ?>">
          <i class="fas fa-shopping-cart"></i>
          <p> cart </p>
        </a>
      </li>

      <li>
        <a href="<?php echo BASE_URL . '../customer/userProfile.php'; ?>" style="text-decoration: none; color: inherit;">
          <i class="fas fa-users"></i>
          <p> profile </p>
        </a>
      </li>

      <li>
        <a href="?prod=<?php echo $user_id; ?>">
          <i class="fas fa-table"></i>
          <p> product </p>
        </a>
      </li>

      <li>
      <?php if($isAdmin == 1) {?>
        <a href="<?php echo BASE_URL . '../admin/banUser.php'; ?>">
          <i class="fas fa-chart-pie"></i>
          <p> Control Accessability </p>
        </a>
      </li>
      <?php }?>

      <li>
        <a href="#">
          <i class="fas fa-pen"></i>
          <p> post </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-star"></i>
          <p> favorite </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-cog"></i>
          <p> settings </p>
        </a>
      </li>

      <li class="logout">
        <a href="?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">
          <i class="fas fa-sign-out-alt"></i>
          <p> log out </p>
        </a>

      </li>
    </ul>

  </div>
</body>

</html>