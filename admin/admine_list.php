<?php
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\getUser.php");
$user_id = $_SESSION['user_id'];
$user = getUserData($con, $user_id);
$isAdmin = $_SESSION['isAdmin'];
$profile_pic = $user['profile_pic'];

// Check if the image file exists and is not empty

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    
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
                    <p> profile </p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-table"></i>
                    <p> product </p>
                </a>
            </li>

            <li>
                <a href="../admin/banUser.php">
                    <i class="fas fa-chart-pie"></i>
                    <p> Control Managment </p>
                </a>
            </li>

            <li>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/admin/banUser.php'; ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p> Control Accessability </p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-pen"></i>
                    <p> post </p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-lightbulb"></i>
                    <p> view product </p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <p> configuration </p>
                </a>
            </li>

            <li class="logout">
                <a href="?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');">
                    <i class="fas fa-sign-out-alt"></i>
                    <p> log out </p>
                </a>

            </li>
        </ul>

    </div>
</body>

</html>