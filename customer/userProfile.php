<?php
session_start();
include('..\admin\Function\config.php');

$userID = $_SESSION['user_id'];
$select = mysqli_query($con, "SELECT * FROM user_info where id = '$userID' ");
$row =  mysqli_fetch_assoc($select);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../hide_style.css">
    
    <style>
        .w {
            text-align: left;
            font-size: 90px;
            margin-top: 50px;
            margin-left: 20px;
            
        }
        .info {
width: 300px;        
height: 50px;
padding: 60px;
margin-top: 50px;
background-color:#272757;
border-radius: 20px;
color: white;
font-size: 25px;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
text-align: left;

}

        .frame-container {
  display:block;
  justify-content:left;
  margin-left: 50px;
  
}

 input {
    background-color:#272757;
    color:white;
    width: 100px;
    height: 40px;
    margin-top: 20px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 20px;
 }
 button {
    background-color:#272757;
    color:white;
    width: 300px;
    height: 90px;
    margin-top: 1px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 20px;
 }

    </style>
</head>
<body>
<nav class="navbar">
<div class="logo">
      <h1>Profile</h1>
    </div> 
</nav>
<form action="" method='post'>

    


    <div class="w">
    <?php
        $img = $row['profile_pic'];
        echo "<img src= $img width=100px> <br>" 
        ?>
    <?php echo"Welcome " . $row['name'] . "<br>";?>
    </div>
    <div class = 'frame-container'>
    <div class='info'>
        <?php echo"Email: " . $row['email'] . "<br>";?>  <input type='submit'  name='changeEmail' value='Change'>

    </div>
    <div class='info'>
    <?php echo"Name: " . $row['name']. "<br>";?>  <input type='submit' name='changeName' value='Change'>
   
    </div>
    <div class='info'>
        <center>
    <button type='submit'  name='changePass'>Change password</button>
    </center>
    </div>
    </div>


</form>


    
    
</body>
</html>