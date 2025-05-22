<!DOCTYPE html>
<html lang="en">
    <?php
    include("../admin/functions/config.php");
session_start();
if($_SESSION['isAdmin'] == 0) {
   header("Location: ../customer/userPage.php");
}


?>

<head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo "../shared/css/newStyle.css"; ?>">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>shop online | اضافة منتجات</title>
</head>

<body>
    <center>
        <div class="main">
            <form action="../admin/functions/insert.php" method="post" enctype="multipart/form-data">
                <h2>إضافة المنتجات</h2>
                
                <div class="second">
                    <input type="text" name='name' placeholder="Name" style='width:300px; height:20px'>
                    <br><br>
                    <input type="text" name='price' placeholder="Price" style='width:300px; height:20px'>
                    <br><br>
                    <input type="file" id="file" name='image' style='display: none;'>
                    <label for="file" style='font-size:30px'>اختيار صورة للمنتج</label><br><br>
                    <button type='submit' name='upload' style='height:90px;font-size:30px'>✅رفع المنتج</button>
                    <br><br>
                </div>
                <a href="../shared/products.php" style='font-size:30px'>عرض المنتجات</a>
            </form>
        </div>
        
    </center>
</body>

</html>