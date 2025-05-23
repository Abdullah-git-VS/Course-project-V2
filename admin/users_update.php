<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">
    <title>Update | تعديل المنتجات</title>
    <script>
        function previewImage(event) {
            const input = event.target;
            const image = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>

<body>
    <?php $title = "Admin Registration"; ?>
    <?php include($_SERVER["DOCUMENT_ROOT"] . "\admin\admine_list.php"); ?>
    <?php
    include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
    $ID = $_GET['id'];
    $UP = mysqli_query($con, "SELECT * FROM user_info WHERE id=$ID");
    $data = mysqli_fetch_array($UP);
    mysqli_close($con);
    ?>
    <center><?php echo "../shared/" . $data['profile_pic']; ?>
        <div class="main">
            <form action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/admin/Functions/up_user.php"; ?>" method="post" enctype="multipart/form-data">
                <h2>تعديل المستخدم</h2>
                <img src="<?php echo "../shared/" . $data['profile_pic']; ?>" alt="logo" width="450px" id="imagePreview">

                <input style="display: none;" type="text" name='o' value='<?php echo $data['id']; ?>'>
                <br>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label>ID:</label>
                    <input type="text" name='id' value='<?php echo $data['id']; ?>'>
                    <br>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label>Name:</label>
                    <input type="text" name='name' value='<?php echo $data['name']; ?>'>
                    <br>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label>Email:</label>
                    <input type="text" name='email' value="<?php echo $data['email']; ?>">
                    <br>
                </div>
                <input type="file" name='profile_pic' id="file" value="<?php echo $data['image']; ?>" style='display: none;' onchange="previewImage(event)">
                <label for="file">تحديث الصورة </label>
                <button type="submit" name='update'>✅تعديل المستخدم</button>
                <br><br>
                <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/admin/users_list.php"; ?>">عرض المستخدمين</a>
            </form>
        </div>
    </center>
</body>

</html>