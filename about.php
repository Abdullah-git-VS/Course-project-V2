<?php
include('admin\Function\config.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tariq is here</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="hide_style.css">
  <style>
    
     

    .frame-container {
      border: 2px solid rgb(0, 0, 0);
    }

    .content-frame {
         width: 300px;        
         height: 200px;
         padding: 60px;
         margin-top: 100px;
        background-color:#272757;
        border-radius: 20px;
          color: white;
          font-size: 25px;
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         text-align: right;    
         margin-left: 50px;
         border: 2px solid rgb(123, 47, 255);
    }

    .num {
        text-align: center;
        font-size: 60px;
    }

    .back{
      background-color: #272757;
      height:40px;
      display:flex;
      justify-content:flex-end;
      align-items:center;
      
    }

    .back a {
      text-decoration: none;
      color: white;
      font-size: 30px;
      padding: 10px 20px;
      border-radius: 5px;
      margin-right: 25px;
      margin-bottom: 25px;
    }

    .back a:hover {
       background-color: #ffffff55;
       transition:.5s;
    }

    .back i {
      font-size: 30px;
      margin-left: 5px;
      
    }

    

  </style>
</head>
<body>

    
    <?php  $title = "About us";
          include 'header.php'; ?>


    <div class="back">
      <a href="home_Page.php" class="back-btn"><i class="fas fa-home"></i> العودة</a>
    </div>

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


 

</body>
</html>
