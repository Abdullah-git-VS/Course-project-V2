<?php
include($_SERVER["DOCUMENT_ROOT"]."\admin\Function\config.php");

$ID = $_GET['id'];
$up = mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
$data = mysqli_fetch_array($up);

if (isset($_GET['add'])) {
    $NAME = $data['name'];
    $PRICE = $data['price'];
    $ID = $data['id'];
    $insert = "INSERT INTO addcard (name, price) VALUES ('$NAME','$PRICE')";
    mysqli_query($con, $insert);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>prouducts | المنتجات</title>
    <style>
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
            padding-right: 20px;
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
    <nav calss="navbar">
        <a id="aa" class="navbar-brand" href="card.php">Mycard | عربتي</a>
    </nav>
    <center>
        <h3>المنتجات المتوفرة</h3>
        <main>
            <?php
            include($_SERVER["DOCUMENT_ROOT"]."\admin\Function\config.php");

            $result = mysqli_query($con, "SELECT * FROM products");
            while ($row = mysqli_fetch_array($result)) {
                echo "
            <div class='card' style='width: 15rem; border: 1px black solid;'>
             <img src='$row[image]' class='card-img-top'>
             <div class='card-body' style='border: 1px black solid;'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='"."http://".$_SERVER['HTTP_HOST']."/admin/Function/delete.php?id=".$row['id']."'class='btn btn-success'>إضافة المنتج للعربة</a>
                    <a href='?id=$row[id]&add='1' class='btn btn-success' name='add'>إضافة المنتج للعربة</a>
                </div>
            </div>
            ";
            }
            mysqli_close($con);
            ?>
        </main>
</body>
</html>