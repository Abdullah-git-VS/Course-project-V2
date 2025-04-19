<?php
include('admin\Function\config.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="../Course-project-V2/hide_style.css">
  <style>
      .content-frame {
width: 300px;        
height: 200px;
padding: 60px;
margin-top: 500px;
background-color:#272757;
border-radius: 20px;
color: white;
font-size: 25px;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
text-align: right;

}
.frame-container {
  display: flex;
  gap: 40px;
  justify-content: center;
  
}
.num {
    text-align: center;
    font-size: 60px;
}

  </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">
      <h1>Content</h1>
    </div>      

 

</body>
</html>
<?php
$sql = mysqli_query($con, "SELECT * FROM `user_info`;") or die('query failed');
$sql2 = mysqli_query($con, "SELECT * FROM `products`;") or die('query failed');
$Usersnum = mysqli_num_rows($sql);
$Productsnum = mysqli_num_rows($sql2);
echo'<div class="frame-container">
  <div class="content-frame"><h2>خدماتنا</h2><br>
                             موقعنا متخصص في بيع ونقل الحيوانات، حيث نوفر مجموعة متنوعة من الحيوانات الأليفة والمزرعية مع خدمة توصيل آمنة وسريعة إلى باب منزلك، مع ضمان صحة وجودة الحيوانات</div>
  <div class="content-frame"><h2>عدد مستخدمين الموقع</h2><br>
                           <br><span class="num">'  . $Usersnum .'</span> </div>
  <div class="content-frame"><h2>عدد المنتجات</h2><br>
                           <br><span class="num"> ' . $Productsnum . '</span></div>
<div class="content-frame"><h2>لماذا يثق بنا العملاء؟</h2><br>
                             أسعار تنافسية وجودة مضمونة<br>توصيل سريع لجميع المناطق</div>
</div>';
mysqli_close($con);
?>