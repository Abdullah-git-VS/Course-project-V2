<?php
include('../shared/functions/config.php');
session_start();
if (isset($_POST['submit'])) {
     $userId = $_POST['id'];
     $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$userId'") or die('query failed');
     if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header('Location: userInfo.php');
        
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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../customer/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    
    <script src="../script.js"></script>
    <style>
         input{
            text-align: center;
         }
         </style>
</head>
<body>

    <form  action='' method='post'>
       
       <input type='text' name='id' required placeholder="USER ID" class="box"><br>
       <input type='submit' name='submit' value='Enter'><br>
   </form>
    


</body>
</html>
<?php
if(isset($message)){
    foreach($message as $message){
       echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
 }
?>