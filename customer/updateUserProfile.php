<?php
session_start();
include('..\admin\Function\config.php');
$userID = $_SESSION['user_id'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['name'] != ""){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        mysqli_query($con, "UPDATE user_info SET name = '$name' WHERE id = '$userID'");
    }
    if($_POST['email'] != ""){
        $email = mysqli_real_escape_string($con,$_POST['email']);
        mysqli_query($con, "UPDATE user_info SET email = '$email' WHERE id = '$userID'");
    }
    if($_POST['password'] != ""){
        if($_POST['password'] == $_POST['confirm_password']){
            $password = mysqli_real_escape_string($con,md5($_POST['password']));
            mysqli_query($con, "UPDATE user_info SET password = '$password' WHERE id = '$userID'");
        }
        else{
            echo "<script>alert('Password and Confirm Password do not match!')</script>";
            exit();
        }
    }
    header('location: userProfile.php');
    exit();
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <div class="frame-container">
        <form action="" method="POST" class="info">
            <h1>Update Profile</h1>
            </br>
            <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" required>
            </br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
            </br>
            <input type="password" name="password" placeholder="New Password">
            </br>
            <input type="password" name="confirm_password" placeholder="Confirm New Password">
            </br>
            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>