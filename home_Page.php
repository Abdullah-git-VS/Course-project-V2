<?php
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Function\config.php");
session_start();
if (isset($_POST['submit'])) {
    $emaill = mysqli_real_escape_string($con, $_POST['email']);
    $passw = mysqli_real_escape_string($con, $_POST['password']);

    // Query to fetch user data
    $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$emaill'") or die('Query failed');
    $row = mysqli_fetch_assoc($select);

    if ($row) {
        // Verify the password
        if (password_verify($passw, $row['password'])) {
            if ($row['canAccess'] == 0) {
                // User is banned
                $message[] = "You are banned from accessing the website!";
                session_destroy();
            }
            if ($row['isAdmin'] == 1 && $row['isOwner'] == 0) {
                // Admin user
                $_SESSION['isAdmin'] = $row['isAdmin'];
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AdminPage.php");
                exit;
            }
            if ($row['isOwner'] == 1) {
                // Owner
                $_SESSION['isOwner'] = $row['isOwner'];
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/makeAdmin.php");
                exit;
            } else {
                // Regular user
                $_SESSION['user_id'] = $row['id'];
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/user_Page.php");
                exit;
            }
        } else {
            // Incorrect password
            $message[] = 'Incorrect password or email!';
        }
    } else {
        // User not found
        $message[] = 'Incorrect password or email!';
    }
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transport</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="hide_style.css">
    <link rel="stylesheet" href="index2.css">
    <style>
        .reg-container {
            background-color: #272757;
            width: 450px;
            height: 450px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: rgb(28, 28, 81);
            width: 100%;
            height: 300px;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        form .box {
            margin: 10px;
            width: 300px;
            height: 50px;
            border-radius: 5px;
            background-color: rgb(43, 43, 115);
            border: none;
            outline: none;
            color: white;
            padding: 20px;
            flex-grow: 1;
        }

        form button {
            background-color: rgb(43, 43, 115);
            color: white;
            border: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
            width: 200px;
            height: 50px;
            flex-grow: 1;
            font-size: 20px;
        }

        .box::placeholder {
            color: white;
            font-size: 20px;
        }

        button:hover {
            background-color: rgb(126, 126, 161);
            transition: 0.3s;
        }

        h2 {
            color: black;
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: underline;
        }

        p {
            font-size: 20px;
            color: black;
            text-align: center;
            margin-top: 10px;
        }

        .reg-container h2,
        .reg-container p {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h1>Transport</h1>
        </div>
        <div class="nav-link">
            <a href="about.php">About</a>
            <a id="openLogin">Sign-in</a>
        </div>
    </nav>
    <?php
    echo $_SERVER['HTTP_HOST'] . "/";
    ?>

    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<div class="message" onclick="this.remove();">' . $msg . '</div>';
        }
    }
    ?>

    <div class="login-popup" id="loginPopup">
        <div class="reg-container">
            <div class="popup-content">
                <span class="close" id="closePopup">&times;</span>
                <h2>تسجيل الدخول</h2>
                <form action="" method="post">
                    <input type="email" class="box" name="email" required placeholder="Email">
                    <input type="password" class="box" name="password" required placeholder="Password">
                    <button type="submit" name="submit" class="btn"><strong>Sign-in</strong></button>
                    <p>هل تملك حساب بالفعل؟ <a href="customer\register.php" style="color: red;">حساب جديد</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>