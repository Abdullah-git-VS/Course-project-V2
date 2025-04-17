<!DOCTYPE html>
<html lang="en">
    

<head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>shop online | اضافة منتجات</title>
</head>

<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>إضافة المنتجات</h2>
                <img src="images\transportation.jpg" alt="logo" width="450px">
                <div class="second">
                    <input type="text" name='name' placeholder="name">
                    <br>
                    <input type="text" name='price' placeholder="price">
                    <br>
                    <input type="file" id="file" name='image' style='display: none;'>
                    <label for="file">اختيار صورة للمنتج</label>
                    <button name='upload'>✅رفع المنتج</button>
                    <br><br>
                </div>
                <a href="prouducts.php">عرض المنتجات</a>
            </form>
        </div>
        <p>Developer by love❤️</p>
    </center>
</body>

</html>