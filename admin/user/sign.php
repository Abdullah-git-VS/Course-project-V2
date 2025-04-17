<html lang="ar">
<?php
include('config.php');
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location: index.php');
    } else {
        $message[] = 'incorrect password or email!';
    }
}
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>نموذج تسجيل دخول</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="index2.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="#" class="logo"> transport </a>

            <ul>
                <li> <a href="#" id="openLogin"> registration </a> </li>
                <li> <a href="#"> order services </a> </li>
                <li> <a href="#"> accessories </a> </li>
                <li> <a href="#"> about </a> </li>
                <li> <a href="#"> profile </a> </li>
            </ul>

        </header>

        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
            }
        }
        ?>
        <div class="content">
            <h2> Transportation services </h2>
            <p> we focus on providing safe, reliable, and stress-free transportation for animals of all kinds. whether you need to relocate a pet, transport livestock or move exotic animals</p>
            <button> click for more </button>
        </div>
    </div>

    <div class="login-popup" id="loginPopup">
        <div class="popup-content">
            <span class="close" id="closePopup">&times;</span>
            <h2>تسجيل الدخول</h2>
            <form action="" method="post">
                <label for="username">اسم المستخدم:</label>
                <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
                
                <label for="password">كلمة المرور:</label>
                <input type="password" name="password" required placeholder="كلمة المرور" class="box">

                <p>هل تملك حساب بالفعل؟ <a href="register.php" style="color: red;"> حساب جديد</a></p>
                <button type="submit" name="submit" class="btn">دخول</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>