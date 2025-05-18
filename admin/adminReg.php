<?php
include('..\shared\functions\config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, $_POST['password']);
   $cpass = mysqli_real_escape_string($con, $_POST['cpassword']);
   $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
   $images = 'images/Sample_User_Icon.png';
   // file uploading
   $image = $_FILES['profile_pic'];
   $image_location = $_FILES['profile_pic']['tmp_name'];
   $image_name = $_FILES['profile_pic']['name'];
   $profile_pic = "images/" . $image_name;
   move_uploaded_file($image_location, $profile_pic);

   if (strlen($pass) < 8) {
      $_SESSION['message'] = "Password must be at least 8 characters!";
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
   } else if ($pass !== $cpass) {
      $_SESSION['message'] = "Passwords do not match!";
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
   }
   // check if the email already exists
   $select = mysqli_query($con, "SELECT * FROM user_info WHERE email = '$email'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $_SESSION['message'] = 'User already exist!';
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
   } else {
      mysqli_query($con, "INSERT INTO user_info(name, email, password, profile_pic, address, phone, isAdmin) VALUES('$name', '$email', '$hashed_password','$images','$address','$phone', '1')") or die('query failed');
      $_SESSION['message'] = 'Registered successfully!';
      mysqli_close($con);
      header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/adminPage.php");
      exit();
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../shared/css/newStyle.css">

   <style>
      .register-container {
         margin: 1px auto;
         padding: 10px 20px;
         border-radius: 15px;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
      }

      .register-btn {
         background-color: #3a3a94;
         color: white;
         border: none;
         border-radius: 5px;
         margin: 15px 0 10px;
         cursor: pointer;
         width: 100%;
         height: 45px;
         font-size: 18px;
         transition: background-color 0.3s ease;
      }

      .register-btn:hover {
         background-color: #5050b8;
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

   <div class="register-container">
      <div class="popup-content">
         <h2>Register</h2>
         <form onsubmit="return validate();" method="post" enctype="multipart/form-data">
            <h3 class="heading">Create a New Account</h3>
            <input class="box" type="text" name="name" required placeholder="Username" class="box">
            <input class="box" type="email" name="email" required placeholder="Email" class="box">
            <input class="box" type="password" name="password" required placeholder="Password" class="box" id="password">
            <input class="box" type="password" name="cpassword" required placeholder="Confirm Password" class="box" id="confirm_password">
            <?php
            if (isset($_SESSION['message'])) {
               echo '<div class="message" onclick="this.remove();">' . $_SESSION['message'] . '</div>';
               unset($_SESSION['message']);
            }
            ?>
            <input type="submit" name="submit" class="register-btn" value="Register">
            <p>Already have an account? <a href="../shared/homePage.php">Sign In</a></p>
         </form>
      </div>
   </div>

</body>

</html>