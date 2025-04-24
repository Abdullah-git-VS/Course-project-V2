<?php 
session_start();
$con = mysqli_connect('localhost', 'root', '12345678', 'online');

if (!isset($_SESSION['isOwner']) || $_SESSION['isOwner'] != 1) {
    header('location: ../user_Page.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emailAdmin = mysqli_real_escape_string($con, $_POST['email']);

    // Debug: Check the query
    $checkEmail = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$emailAdmin'");
    if (mysqli_num_rows($checkEmail) > 0) {
        $row = mysqli_fetch_assoc($checkEmail);
        if ($row['isAdmin'] == 1) {
            echo "<script>alert('User is already an admin!')</script>";
        } 
        else {
            $Query = mysqli_query($con, "UPDATE `user_info` SET isAdmin = 1 WHERE email = '$emailAdmin'");
            echo "<script>alert('User has been granted admin access!')</script>";
        }
    } else {
        echo "<script>alert('Email not found!')</script>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .frame-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .info {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .info h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .info input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .info input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .info input[type="submit"]:hover {
            background: #0056b3;
        }
        .back-button {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="frame-container">
        <form action="" method="POST" class="info">
            <h1>Make Admin</h1>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" value="Make Admin">
        </form>
        <br>
    </div>        
    <a href="AdminPage.php" class="back-button">Back to Admin Page</a>
</body>
</html>