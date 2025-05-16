<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Full Navbar</title>
  <link rel="stylesheet" href="headerList.css">
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
        <a href="customer\userProfile.php">
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
        <a href="?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">
          <i class="fas fa-sign-out-alt"></i>
          <p> log out </p>
        </a>

      </li>
    </ul>

  </div>



</body>
</html>