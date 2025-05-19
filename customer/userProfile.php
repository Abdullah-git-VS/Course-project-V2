<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
$userID = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
}
if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
};
$select = mysqli_query($con, "SELECT * FROM `user_info` WHERE `id` = $userID");
$row =  mysqli_fetch_array($select);

$default_image = 'images/user.png';
$profile_pic = $row['profile_pic'];

// Check if the image file exists and is not empty
if (!empty($profile_pic) && file_exists(BASE_PATH . 'shared/' . $profile_pic)) {
    $userImg = $profile_pic;
} else {
    $userImg = $default_image;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success = false;
    if ($_POST['name'] != "") {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        mysqli_query($con, "UPDATE user_info SET name = '$name' WHERE id = '$userID'");
        $success = true;
    }
    if ($_POST['email'] != "") {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        // Check if the email already exists in the database (excluding current user)
        $emailCheckQuery = "SELECT * FROM user_info WHERE email = '$email' AND id != '$userID'";
        $emailCheckResult = mysqli_query($con, $emailCheckQuery);

        if (mysqli_num_rows($emailCheckResult) > 0) {
            $_SESSION['error_message'] = 'The email is already in use by another user!';
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/userProfile.php");
            exit();
        } else {
            // Update email if it's unique
            mysqli_query($con, "UPDATE user_info SET email = '$email' WHERE id = '$userID'");
            $success = true;
        }
    }
    if ($_POST['phone'] != "") {
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        mysqli_query($con, "UPDATE user_info SET phone = '$phone' WHERE id = '$userID'");
        $success = true;
    }
    if ($_POST['address'] != "") {
        $address = mysqli_real_escape_string($con, $_POST['address']);
        mysqli_query($con, "UPDATE user_info SET address = '$address' WHERE id = '$userID'");
        $success = true;
    }
    if ($_POST['password'] != "") {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $password = mysqli_real_escape_string($con, md5($_POST['password']));
            mysqli_query($con, "UPDATE user_info SET password = '$password' WHERE id = '$userID'");
            $success = true;
        } else {
            $_SESSION['error_message'] = 'Password and Confirm Password do not match!';
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/userProfile.php");
            exit();
        }
    }

    if ($success) {
        $_SESSION['success_message'] = 'Profile updated successfully!';
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/customer/userProfile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../shared/css/newStyle.css">
    <style>
        

        .profile-form {
            max-width: 600px;
            margin: 50px auto;
            background-color: #272757;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-form .form-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .profile-form .form-header img {
            margin: 10px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
        }

        .profile-form .form-body {
            margin-top: 20px;
        }

        .profile-form .form-group {
            margin-top: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-form .form-group label {
            font-size: 18px;
            color: white;
        }

        .profile-form .form-group input,
        .profile-form .form-group button {
            background-color: rgba(58, 29, 160, 0.75);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .profile-form .form-group input[type="submit"]:hover,
        .profile-form .form-group button:hover {
            background-color: transparent;
            transform: scale(1.05);
            color: rgba(252, 252, 252, 0.59);
        }

        .profile-form .form-group input[type="submit"]:focus,
        .profile-form .form-group button:focus {
            outline: none;
        }

        /* Message Styles */
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
        }

        .error-message {
            background-color: #f44336;
            color: white;
        }

    </style>
</head>

<body>


   

    <!-- include of header and list -->
    <?php
    $title = "Profile";
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\header.php");
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");
    ?>





    <?php
    // Display success or error messages
    if (isset($_SESSION['success_message'])) {
        echo "<div class='message success-message'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }

    if (isset($_SESSION['error_message'])) {
        echo "<div class='message error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>

    <div class="form-container">
    <form action="" method="post" class="profile-form">
        
            <div class="form-header">
                <?php
                echo "<img src='" . "http://" . $_SERVER['HTTP_HOST'] . '/shared/' . $userImg . "' alt='User Pic' width='100px'>";
                echo "Welcome " . $row['name'];
                ?>
            </div>

            <div class="form-body">
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Enter your name">
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Enter your email">
                </div>

                <!-- Phone Field -->
                <div class="form-group">
                    <label for="phone">Phone: </label>
                    <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" placeholder="Enter your phone number">
                </div>

                <!-- Address Field -->
                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>" placeholder="Enter your address">
                </div>

                <!-- Password Fields -->
                <div class="form-group">
                    <label for="password">New Password: </label>
                    <input type="password" name="password" id="password" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password: </label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm new password">
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" value="Update Profile">
                </div>
            </div>
        </div>
    </form>
</body>

</html>