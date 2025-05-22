<!-- include header  -->
   <?php
    $title = "Past orders";
    // include($_SERVER["DOCUMENT_ROOT"] . "\shared\header.php");
    ?>
<!-- untill here -->



 <?php
    ob_start();
    session_start();
    include("../admin\Functions\config.php");
    include("../admin/functions/restrictions.php");
    $userId=$_SESSION['user_id'];

    // include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
}
$userId = $_SESSION['user_id'];
$title = "Past orders";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php include($_SERVER["DOCUMENT_ROOT"] . "/shared/list.php"); ?>

    <?php
    $res = mysqli_query($con, "SELECT * FROM orders WHERE userID='$userId'");

    if (mysqli_num_rows($res) == 0) {
        echo '<p style="text-align:center; font-size:50px;">You do not have past orders!</p>';
    } else {

      

    while ($row = mysqli_fetch_assoc($res) ) {
    echo "<div style='background-color:#272757;width:50%; margin:0 auto;margin-top:20px;'>";  
    echo "<span style='font-size:25px;'> Product: </span> " . $row['product'] . "<br>";
    "<span style='font-size:25px;'> Price: </span> " . $row['price'] . "<br>";
    echo "<span style='font-size:25px;'>Vehicle: </span>" . $row['vehicle'] . "<br>";
    echo "<span style='font-size:25px;'>Destination: </span> " . $row['destination'] . "<br>";
    echo "</div>";
      
    
}
    }
    mysqli_close($con);
    ob_end_flush();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Past orders</title>
    </head>
    <body>
    
   


      

    
      
    </body>
    </html>