<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
session_start();
if (isset($_POST['submit'])) {
     $userId = $_POST['id'];
     $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$userId'") or die('query failed');
     if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/admin/userInfo.php");
        
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
    
    <link rel="stylesheet" href="../shared/css/headerList.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    
    <script src="../script.js"></script>
    <style>
         input{
            text-align: center;
         }
         </style>
</head>
<body>
   <div style='margin-top:100px'>
    <form  action='' method='post'>
       
       <input type='text' name='id' id="userId" required placeholder="USER ID" class="box" style='width:300px; height:30px'><br>
       <button type='submit' name='submit' value='Control Accessability' style='background-color:white; width:300px; font-size:25px'>Control Accessability</button>
   </form>
     
   </div>
     
    


</body>
</html>
<?php
if(isset($message)){
    foreach($message as $message){
       echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
    }
 }
?>