


 <?php
    ob_start();
    session_start();
    include("../admin\Functions\config.php");
    include("../admin/functions/restrictions.php");
    $userId=$_SESSION['user_id'];

    $title="cart";
     include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");

    if (!isset($_SESSION['user_id'])) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
}
if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();

  if (file_exists('../shared/homePage.php')) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
  } else {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/shared/homePage.php");
    exit;
  }
};
    $res=mysqli_query($con, "SELECT * FROM cart WHERE user_id='$userId'");

    if(mysqli_num_rows($res) == 0) {
      echo'<p style="text-align:center; font-size:50px;">Your cart is empty!</p>';
    } else {

      

    while ($row = mysqli_fetch_assoc($res) ) {
      
    echo "<div style='background-color:#272757;width:50%; margin:0 auto;margin-top:20px;'>";  
    echo "<span style='font-size:25px;'> Product: </span> " . $row['name'] . "<br>";
    echo"<span style='font-size:25px;'> Price: </span> " . $row['price'] . "<br>";
    echo "<span style='font-size:25px;'>Vehicle: </span>" . $row['vehicle'] . "<br>";
    echo "<span style='font-size:25px;'>Destination: </span> " . $row['destination'] . "<br>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
    echo "<button type='submit' style='background-color:red'>Delete</button>";
    echo "</form><hr>";
    echo "</div>";
      
    
}

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    mysqli_query($con, "DELETE FROM cart WHERE id = $id AND user_id = $userId");
    header("cart.php");
    exit;
}

if (isset($_GET['confirm'])) {
  
  $res=mysqli_query($con, "SELECT * FROM cart WHERE user_id='$userId'");
  $row = mysqli_fetch_assoc($res);
  $vehicle = $row['vehicle'];
  $name = $row['name'];
  $destination = $row['destination'];
  $userID = $row['user_id'];
  $productId = $row['productId'];
  $price = $row['price'];
  mysqli_query($con, "INSERT INTO orders(vehicle, product, destination, userID, productId, price)
                      VALUES('$vehicle', '$name', '$destination', '$userID', '$productId', '$price')") or die("Failed");

mysqli_query($con, "DELETE FROM cart WHERE user_id='$userId'");  
echo "<script>
        alert('Your order has been confirmed!');
        window.location.href = 'userPage.php';
    </script>";
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
        <title>Document</title>
    </head>
    <body>
    
   


      

    <?php if (mysqli_num_rows($res) > 0){ ?>
    <form method="get" style="width:50%;margin:0 auto;">
      <button type="submit" name="confirm">Confirm order</button>
    </form>
   <?php } ?>
    
      
    </body>
    </html>