<?php
include('../admin/functions/config.php');

session_start();
$id   = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
if($_SESSION['isAdmin'] == 0) {
   header("Location: ../customer/userPage.php");
}
include("../admin/functions/restrictions.php");
if($_SESSION['isAdmin'] == 0) {
   header("Location: ../customer/userPage.php");
}

if (isset($_POST['submit'])) {
  $q = mysqli_query($con, "UPDATE user_info SET canAccess = '0' WHERE id = '$id'")
    or die('query failed');

} elseif (isset($_POST['submit2'])) {
  $q = mysqli_query($con, "UPDATE user_info SET canAccess = '1' WHERE id = '$id'")
    or die('query failed');
    
  }
mysqli_close($con);
?>
<!DOCTYPE html>
<title>User accessability control</title>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
  <script src="<?php "http://" . $_SERVER['HTTP_HOST'] . "/shared/js/all_script.js" ?>"></script>

</head>

<body>
  <!-- include header for admin register -->
  <?php $title = "Admin Registration";
  include($_SERVER["DOCUMENT_ROOT"] . "\admin\admine_list.php"); ?>
  <div style='margin-top:100px;width:500px; margin-left:400px; '>
    <form action='' method='post'>
      <button type='submit' name='submit' style='background-color:darkred; font-size:25px'>Ban User</button>
      <button type='submit' name='submit2' style='background-color:green; font-size:25px'>Unban User</button>
    </form>

    <button onclick="userInfo()" style='font-size:25px'>Get User Information</button>
    <a href='banUser.php'><button style='font-size:25px'>Return</button></a>
  </div>

  <script>
    function userInfo() {
      str = <?php echo $id ?>;
      if (str == "") {
        document.getElementById("txt").innerHTML = "";
        return;
      }
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("txt").innerHTML = this.responseText;
      }
      xhttp.open("GET", "UI.php?q=" + str);
      xhttp.send();
    }
  </script>
  <div id="txt" style='margin: 30px auto; width: fit-content; text-align: center;'></div>
</body>

</html>