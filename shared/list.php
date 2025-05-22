<!-- validate user session -->
<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\getUser.php");
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
  exit;
};



if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
};


$user_id = $_SESSION['user_id'];
$user = getUserData($con, $user_id);
$isAdmin = $_SESSION['isAdmin'];
$profile_pic = $user['profile_pic'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="<?php echo $_SERVER["DOCUMENT_ROOT"] . "shared/css/headerList.css"; ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <h1><?php echo isset($title) ? htmlspecialchars($title) : "Default"; ?></h1>
      </div>

  </header>

  <div class="menu">
    <ul>
      <li class="profile">
        <div class="img-box">
          <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/" . $profile_pic; ?>" alt="User Pic">
        </div>
        <h2> <?php echo $user['name']; ?> </h2>
      </li>



      <li>
        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/customer/order.php'; ?>">
          <i class="fas fa-list"></i>
          <p> order </p>
        </a>
      </li>

      <li>
        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/customer/cart.php'; ?>">
          <i class="fas fa-shopping-cart"></i>
          <p> cart </p>
        </a>
      </li>

      <li>
        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/customer/userProfile.php'; ?>">
          <i class="fas fa-users"></i>
          <p> profile </p>
        </a>
      </li>


      <li>
        <a href="#">
          <i class="fas fa-cloud"></i>
          <p> weather </p>
        </a>
      </li>

      <li>
        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . 'index.php'; ?>" style="text-decoration: none; color: inherit;">
          <i class="fas fa-temperature-high"></i>
          <p> weather </p>
        </a>
      </li>


      <li>
        <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/customer/prevOrders.php'; ?>">
          <i class="fas fa-cart-plus"></i>
          <p> pre order </p>
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