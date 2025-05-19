<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
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
    if($_POST['phone'] != ""){
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        mysqli_query($con, "UPDATE user_info SET phone = '$phone' WHERE id = '$userID'");
    }
    if($_POST['address'] != ""){
        $address = mysqli_real_escape_string($con,$_POST['address']);
        mysqli_query($con, "UPDATE user_info SET address = '$address' WHERE id = '$userID'");
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
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/userProfile.php");
    exit();
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.form-container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #272757;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.profile-form h1 {
    color: white;
    text-align: center;
    margin-bottom: 20px;
}

.profile-form input[type="text"],
.profile-form input[type="email"],
.profile-form input[type="password"],
.profile-form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
}

.profile-form input[type="submit"] {
    background-color: rgba(58, 29, 160, 0.75);
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid white;
}

.profile-form input[type="submit"]:hover {
    background-color: transparent;
    color: rgba(252, 252, 252, 0.59);
    transform: scale(1.05);
}

.profile-form input[type="text"]:focus,
.profile-form input[type="email"]:focus,
.profile-form input[type="password"]:focus {
    outline: none;
    border-color: rgba(58, 29, 160, 0.75);
}

.profile-form input[type="submit"]:focus {
    outline: none;
}

    </style>
</head>
<body>
 <div class="frame-container">
        <form action="" method="POST" class="info">
            <h1>Update Profile</h1>
            </br>
            <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" >
            </br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" >
            </br>
            <input type ="text" name="phone" placeholder="Phone" value="<?php echo $row['phone']; ?>" >
            </br>
            <input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" >
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