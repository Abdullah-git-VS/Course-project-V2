<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Update | تعديل المنتجات</title>
</head>
<body>
    <?php
    include('config.php');
    $ID=$_GET['id'];
    $UP=mysqli_query($con,"SELECT * FROM products WHERE id=$ID");
    $data = mysqli_fetch_array($UP);
    ?>
    <center>
        <div class="main">
            <form action="UP.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المنتجات</h2>
                <img src="<?php echo $data['image'];?>" alt="logo" width="450px">

                <input style="display: none;" type="text" name='o' value='<?php echo $data['id'];?>'>
                <br>
                <input type="text" name='id' value='<?php echo $data['id'];?>'>
                <br>
                <input type="text" name='name' value='<?php echo $data['name'];?>'>
                <br>
                <input type="text" name='price' value="<?php echo $data['price'];?>">
                <br>
                <input type="file" name='image' id="file" value="<?php echo $data['image'];?>" style='display: none;'>
                <label for="file">تحديث صورة للمنتج</label>
                <button type="submit" name='update'>✅تعديل المنتج</button>
                <br><br>
                <a href="prouducts.php">عرض المنتجات</a>
            </form>
        </div>
        <p>Developer by love❤️</p>
    </center>
</body>

</html>