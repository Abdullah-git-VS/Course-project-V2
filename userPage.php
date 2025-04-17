<?php

include('config.php');
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:homePage.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:homePage.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<body>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
    }
  }
  ?>
  <?php
  $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
  if (mysqli_num_rows($select_user) > 0) {
    $fetch_user = mysqli_fetch_assoc($select_user);
  };
  ?>
  <nav class="navbar">
    <div class="logo">
      <h1>Transport</h1>
    </div>
  </nav>

  <div class="menu">
    <ul>
      <li class="profile">
        <div class="img-box">
          <img src="photo\map-operation.svg" alt="user">
        </div>
        <h2> <?php echo $fetch_user['name']; ?> </h2>
      </li>

      <li>
        <a href="admin\user\index.php">
          <i class="fas fa-shopping-cart"></i>
          <p> cart </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-users"></i>
          <p> profile </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-table"></i>
          <p> product </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-chart-pie"></i>
          <p> chart </p>
        </a>
      </li>

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

  <script src="index3.js"></script>
</body>

</html>