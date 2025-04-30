<?php
include($_SERVER["DOCUMENT_ROOT"]."\admin\Function\config.php");
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header("Location: http://".$_SERVER['HTTP_HOST']."/home_Page.php");
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
    header("Location: http://".$_SERVER['HTTP_HOST']."/home_Page.php");
};
?>