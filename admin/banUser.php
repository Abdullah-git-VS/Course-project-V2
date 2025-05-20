<?php
include("../admin/functions/config.php");
session_start();
if($_SESSION['isAdmin'] == 0) {
   header("Location: ../customer/userPage.php");
}
if (isset($_POST['submit'])) {
   $userId = $_POST['id'];
   $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$userId'") or die('query failed');
   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];
      header("Location: userInfo.php");
   } else {
      $message[] = 'incorrect User ID!';
   }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>User accessability control</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../shared/css/newStyle.css">
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
   <script src="../shared/js/all_script.js"></script>
   <style>
      .banForm {
         background-color: rgb(51, 31, 82);
         width: 350px;
         height: 200px;
         margin: 0 auto;
         margin-top: 120px;
      }

      input {
         text-align: center;
      }

      button {
         background-color: rgb(61, 61, 181);

      }
   </style>
</head>

<body>
   <!-- include header for admin ban -->
   <?php $title = "Admin Registration"; ?>
   
   <form class="banForm" action='' method='post'>
      <input type='text' name='id' id="userId" required placeholder="USER ID" class="box" style='width:300px; height:30px'><br>
   
      <button type='submit' name='submit' value='Control Accessability'>Control Accessability</button>
   </form>




</body>

</html>
<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
   }
}
?>