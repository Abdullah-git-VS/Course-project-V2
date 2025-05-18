<!DOCTYPE html>
<html lang="en">
<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
session_start();

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $passw = mysqli_real_escape_string($con, $_POST['password']);
  $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$email'") or die('query failed');
  $row = mysqli_fetch_assoc($select);

  echo "<script>console.log(" . json_encode($row) . ");</script>";


  if ($row['isAdmin'] == 1) {
    // Admin user
    $_SESSION['isAdmin'] = $row['isAdmin'];
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/adminPage.php");
    exit;
  }
  if (!$row || !password_verify($passw, $row['password'])) {
    $_SESSION['message'] = "Incorrect email or password!";
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }

  if ($row['canAccess'] == 0) {
    $_SESSION['message'] = "You are banned from accessing the website!";
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  }

  $_SESSION['user_id'] = $row['id'];
  $_SESSION['isAdmin'] = $row['isAdmin'];
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/userPage.php");
  exit();
}

mysqli_close($con);
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>transport</title>
  <link rel="stylesheet" href="css/newStyle.css">

  <style>
    /* Login Container */
    .login-container {
      margin: 100px auto;
      padding: 10px 10px;
      border-radius: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
  </style>
</head>

<body>

  <nav class="navbar">
    <div class="logo">
      <h1>Transport</h1>
    </div>
    <div class="nav-link">
      <a href="about.php">About</a>
    </div>
  </nav>

  <div class="login-popup" id="loginPopup">
    <div class="login-container">
      <div class="popup-content">
        <h2>Login</h2>

        <form action="" method="post" style="padding-top: 50px;">
          <input type="email" class="box" name="email" id="username" required placeholder="Email">
          <input type="password" class="box" name="password" id="password" required placeholder="Password">

          <button type="submit" name="submit" class="btn">
            <strong>Sign-in</strong>
          </button>

          <?php
          if (isset($_SESSION['message'])) {
            echo '<div class="message" onclick="this.remove();">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
          }
          ?>

          <p>Don't have an acccunt?
            <a href="../customer/register.php" style="color: red;">Register Now</a>
          </p>
        </form>
      </div>
    </div>
  </div>

</body>


</html>