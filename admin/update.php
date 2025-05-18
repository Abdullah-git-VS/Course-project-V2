<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\index.css">
    <title>Update | تعديل المنتجات</title>
</head>
<body>
    <?php
    include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
    $ID=$_GET['id'];
    $UP=mysqli_query($con,"SELECT * FROM user_info WHERE id=$ID");
    $data = mysqli_fetch_array($UP);
    mysqli_close($con);
    ?>
    <center><?php echo "../shared/".$data['profile_pic'];?>
        <div class="main">
            <form action="Function/up.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المستخدم</h2>
                <img src="<?php echo "../shared/".$data['profile_pic'];?>" alt="logo" width="450px">

                <input style="display: none;" type="text" name='o' value='<?php echo $data['id'];?>'>
                <br>
                <input type="text" name='id' value='<?php echo $data['id'];?>'>
                <br>
                <input type="text" name='name' value='<?php echo $data['name'];?>'>
                <br>
                <input type="text" name='email' value="<?php echo $data['email'];?>">
                <br>
                <input type="file" name='profile_pic' id="file" value="<?php echo $data['image'];?>" style='display: none;'>
                <label for="file">تحديث الصورة </label>
                <button type="submit" name='update'>✅تعديل المستخدم</button>
                <br><br>
                <a href="users_list.php">عرض المستخدمين</a>
            </form>
        </div>
        <p>Developer by love❤️</p>
    </center>
</body>

</html>