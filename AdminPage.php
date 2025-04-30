<?php
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
    // Not an admin, send to user page or login
    header("Location: http://".$_SERVER['HTTP_HOST']."/user_Page.php");
    exit;
}
 if(isset($_GET['logout'])){
    unset($_SESSION['isAdmin']);
    session_destroy();
    header("Location: http://".$_SERVER['HTTP_HOST']."/home_Page.php");
    exit;
 }
?>


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
  <?php  $title = "Admin Page";
        include "header.php"; ?>


<div class="menu">
    <ul>
      <li class="profile">
        <div class="img-box">
          <img src="admin\photo\map-operation.svg" onerror="this.onerror=null; this.src='/admin/photo/map-operation.svg';" alt="user">
        </div>
        <h2> <?php echo $fetch_user['name']; ?> </h2>
      </li>

    

      <li>
        <a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/customer/userProfile.php";?>">
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
          <i class="fas fa-lightbulb"></i>
          <p> view product </p>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fas fa-cog"></i>
          <p> configuration </p>
        </a>
      </li>

      <li class="logout">
        <a href="?logout=true" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">
          <i class="fas fa-sign-out-alt"></i>
          <p> log out </p>
        </a>

      </li>
    </ul>

  </div>



</body>
</html>