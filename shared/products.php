<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('../admin/functions/config.php');
include("../admin/functions/restrictions.php");


?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | المنتجات</title>
    <link rel="stylesheet" href="css/newStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <style>
        ul{
            padding-left: 0px;
        }
        *,
        ::after,
        ::before {
            box-sizing: content-box;
        }

        .contPr {
            margin-right: 120px;
        }

        h3,
        h5 {
            font-family: "Cairo", sans-serif;
            font-weight: bold;
        }

        .card {
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;

        }

        .card img {
            width: 100%;
            height: 200px;

        }

        main {
            width: 100%;
        }

        #aa {
            margin-left: 70px;
            text-decoration: none;
            color: white;
        }

        nav {
            background-color: black;
        }
    </style>
</head>

<body>
    <!-- include of header and list -->
    <?php
    $title = "products";
    if ($_SESSION['isAdmin'])
        include($_SERVER["DOCUMENT_ROOT"] . "\admin\admine_list.php");
    else
        include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");
    ?>
    <center>
        <h3>جميع المنتجات</h3>
    </center>
    <?php

    $result = mysqli_query($con, "SELECT * FROM products");
    if ($isAdmin == 1) {
        while ($row = mysqli_fetch_array($result)) {

            echo "
        <div class='contPr'>
        
            <div class='card' style='width: 15rem; border: 1px black solid;'>
             <img src='$row[image]' class='card-img-top'>
             <div class='card-body' style='border: 1px black solid;'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='../admin/functions/delete_product.php?id=$row[id]' class='btn btn-danger'>حذف</a>
                    <a href='../admin/functions/up_products?id=$row[id]' class='btn btn-primary'>تعديل</a>
                </div>
            </div>
        
            </div>
            ";
        }
    }
    if ($isAdmin == 0) {
        while ($row = mysqli_fetch_array($result)) {

            echo "
        <div class='contPr'>
        
            <div class='card' style='width: 15rem; border: 1px black solid;'>
             <img src='$row[image]' class='card-img-top'>
             <div class='card-body' style='border: 1px black solid;'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='../admin/functions/initialOrder.php?id=$row[id] &name=$row[name] &price=$row[price]' class='btn btn-primary'>Add</a>
                    
                </div>
            </div>
        
            </div>
            ";
        }
    }


    mysqli_close($con);
    ?>

</body>
<?php
?>

</html>