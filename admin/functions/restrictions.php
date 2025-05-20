<?php
    if (!isset($_SESSION['user_id'])) {
    header("Location: ../shared/homePage.php");
    exit;
}

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
    if (!isset($_SESSION['user_id'])) {
    header("Location: ../shared/homePage.php");
    exit;
}
  if (file_exists('../shared/homePage.php')) {
    header('Location: ../shared/homePage.php');
    exit;
  } else {
    header('Location: ../shared/homePage.php');
    exit;
  }
}
?>