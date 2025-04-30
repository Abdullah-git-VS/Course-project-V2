<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");

session_start();
if (isset($_GET['submit'])) {
  $userId = $_GET['id'];
  $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$userId'") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['id'] = $row['id'];
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/controlAccess.php");
  } else {
    echo "<script>
        alert('incorrect User ID!');
      </script>";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="../customer/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">

  <style>
    th,
    td {
      border: 1px solid;
      padding: 5px;
      border-collapse: collapse;
    }
  </style>
</head>

<body>



  <form actoin='' method='get'>
    <select id="userId" name="id" class="box">
      <?php
      $result = mysqli_query($con, "SELECT * FROM `user_info`") or die('query failed');
      while ($row = mysqli_fetch_array($result)) {
        echo " <option value=$row[id] >$row[id]</option>";
      } ?>
    </select>
    <input type='submit' name='submit' value='Enter'><br>
  </form>
  <button onclick="userInfo()">Get User Information</button>

  <br>


  <script>
    src = "../script.js";

    function userInfo() {
      str = document.getElementById('userId').value;
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
  <center>
    <div id="txt"></div>
  </center>
</body>

</html>


<?php
if (isset($message)) {
  foreach ($message as $message) {
    echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
  }
}

mysqli_close($con);
?>