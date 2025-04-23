<?php
session_start();
include('..\admin\Function\config.php');
$userID = $_SESSION['user_id'];
$select = mysqli_query($con, "SELECT * FROM `user_info` WHERE `id`= $userID ");
$row =  mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../hide_style.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }



        /*


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

*/




        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #272757;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-container .profile-content {
            border: 1px solid #ccc;
        }

        .profile-container .profile-content .header {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-container .profile-content .header img {
            margin: 10px;

            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
        }

        .profile-container .profile-content .header h2 {
            margin: 0;
            font-size: 24px;
            color: white;
        }

        .profile-container .profile-content .details {
            margin-top: 20px;
        }

        .profile-container .profile-content .details h3 {
            margin-right: 400px;
            color: white;
        }

        .profile-container .profile-content .details ul {
            list-style: none;
            padding: 0;
            color: white;

            margin-right: 400px;
            margin-top: 40px;
        }

        .profile-container .profile-content .details ul li {
            color: white;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .profile-container .profile-content button {
            margin-left: 360px;
            padding: 10px 20px;
            width: 200px;
            background-color: #272757;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <h1>Profile</h1>
        </div>
    </nav>


    <div class="profile-container">

        <div class="profile-content">

            <div class="header">
                <img src="../<?php echo $row["profile_pic"]; ?>">
                <h2> user name </h2>
            </div>


            <div class="details">
                <h3> profile information </h3>
                <ul>
                    <li> Email: <?php echo $row["email"]; ?> </li>
                    <li> Phone: <?php echo $row["phone"]; ?> </li>
                    <li> Address: <?php echo $row["address"]; ?>
                    <li>
                </ul>
            </div>
            <button type="submit" name="button"> Edit profile </button>
        </div>
    </div>













    <!--
<form action="" method='post'>

    <div class="w">
    <?php
    // $img = $row['profile_pic'];
    //  echo "<img src= $img width=100px> <br>" 
    ?>
    <?php // echo"Welcome " . $row['name'] . "<br>";
    ?>
    </div>
    <div class = 'frame-container'>
    <div class='info'>
        <?php  // echo"Email: " . $row['email'] . "<br>";
        ?>  <input type='submit'  name='changeEmail' value='Change'>

    </div>
    <div class='info'>
    <?php  // echo"Name: " . $row['name']. "<br>";
    ?>  <input type='submit' name='changeName' value='Change'>
   
    </div>
    <div class='info'>
        <center>
    <button type='submit'  name='changePass'>Change password</button>
    </center>
    </div>
    </div>


</form>
-->
</body>

</html>