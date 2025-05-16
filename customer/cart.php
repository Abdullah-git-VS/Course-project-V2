 
 <?php
    ob_start();
    session_start();
    include("../shared/functions/config.php");
    $userId=$_SESSION['user_id'];

    include("../shared/list.php");

    if (!isset($_SESSION['user_id'])) {
    header("Location: ../shared/homePage.php");
    exit;
}
if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();

  if (file_exists('../shared/homePage.php')) {
    header('Location: ../shared/homePage.php');
    exit;
  } else {
    header('Location: ../shared/homePage.php');
    exit;
  }
};
    $res=mysqli_query($con, "SELECT * FROM `order` WHERE userID='$userId'");

    while ($row = mysqli_fetch_assoc($res)) {
    echo "Product: " . $row['product'] . "<br>";
    echo "Vehicle: " . $row['vehicle'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br>";
    echo "Destination: " . $row['destination'] . "<br>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
    echo "<button type='submit' style='background-color:red'>Delete</button>";
    echo "</form><hr>";
    echo "</div>";
    
}

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    mysqli_query($con, "DELETE FROM `order` WHERE id = $id AND userID = $userId");
    header("Location: cart.php");
    exit;
}


    mysqli_close($con);
  ob_end_flush();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="../shared/css/headerList.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
    </body>
    </html>