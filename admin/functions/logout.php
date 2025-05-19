<?php if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
};?>