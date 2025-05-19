<!DOCTYPE html>
<html lang="en">
    

<head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../shared/css/newStyle.css"> 
    <title>shop online | اضافة منتجات</title>

    <style>



     .addForm {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;     
        max-width: 500px;
        max-height: 300px;
        margin: 0 auto;
        margin-top: 50px;       
        background-color: #272757;
        }

      .addForm h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: white;
        text-align: center;
        }

        .addForm img {
            margin-bottom: 20px;
            border-radius: 50%;
            width:200px;
            height:200px ;
        }

        .addInput {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: #fff;
            color: #000;
            font-size: 16px;
        }

        .addProduct {
            background-color:rgb(61, 61, 181);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .addForm a {
            color: #fff;
            text-decoration: none;
            margin-top: 20px;
            font-size: 16px;
        }

        .addForm a:hover {
            text-decoration: underline;
        }

      


    </style>
</head>

<body>


    <!-- include of header and block -->
    <?php
    $title = "add product";
    include($_SERVER["DOCUMENT_ROOT"] . "../shared\header.php");
    ?>

  <div class="back">
    <a href="adminPage.php" class="back-btn"><i class="fas fa-home"></i> العودة</a>
  </div>



        
            
            <form class="addForm" action="Function\insert.php" method="post" enctype="multipart/form-data">
                <h2>إضافة المنتجات</h2>
                <img src="../shared/images/map-operation.svg" alt="logo" width="450px">
                    <input class="addInput" type="text" name='name' placeholder="name">
                    <br>
                    <input class="addInput" type="text" name='price' placeholder="price">
                    <br>
                    <input class="addInput" type="file" id="file" name='image' style='display: none;'>
                    <label for="file">اختيار صورة للمنتج</label>
                    <button class="addProduct" name='upload'>✅رفع المنتج</button>
                    <br><br>
                <a href="users.php">عرض المنتجات</a>
            </form>
            
        
   
</body>

</html>