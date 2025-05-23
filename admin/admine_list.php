<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");


$isAdmin = $_SESSION['isAdmin'];

if (!isset($isAdmin)) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
};
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\getUser.php");
$user_id = $_SESSION['user_id'];
$user = getUserData($con, $user_id);
$isAdmin = $_SESSION['isAdmin'];
$profile_pic = $user['profile_pic'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1><?php echo isset($title) ? htmlspecialchars($title) : "Default"; ?></h1>
            </div>

    </header>

    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img-box">
                    <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/" . $profile_pic; ?>" alt="user">
                </div>
                <h2> <?php echo $user['name']; ?> </h2>
            </li>



            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/customer/userProfile.php"; ?>">
                    <i class="fas fa-users"></i>
                    <p>profile</p>
                </a>
            </li>

            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/admin/users_list.php'; ?>">
                    <i class="fas fa-table"></i>
                    <p>users_list</p>
                </a>
            </li>

            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/admin/banUser.php'; ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Control Managment</p>
                </a>
            </li>

            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/admin/add.php'; ?>">
                    <i class="fas fa-plus"></i>
                    <p>add product</p>
                </a>
            </li>
            <li>
            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . "/index.php"; ?>">
                    <i class="fas fa-temperature-high"></i>
                    <p> weather </p>
                </a>
            </li>
            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . "/shared/products.php"; ?>">
                    <i class="fas fa-star"></i>
                    <p> current product </p>
                </a>
            </li>



            <li class="logout">
                <a href="?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>log out</p>
                </a>

            </li>
        </ul>

    </div>
</body>

</html>