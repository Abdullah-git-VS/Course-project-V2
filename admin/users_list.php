<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\index.css">
    <title>users | المستخدمين</title>
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
    <nav calss="navbar">
        <a id="aa" class="navbar-brand" href="add.php">Add user | إضافة مستخدم</a>
    </nav>
    <center>
        <h3>جميع المستخدمين</h3>
    </center>
    <?php
    include($_SERVER["DOCUMENT_ROOT"] . "\admin\Functions\config.php");
    
    $result = mysqli_query($con, "SELECT * FROM user_info");
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <center>
        <main>
            <div class='card' style='width: 15rem; border: 1px black solid;'>
             <img src='../shared/$row[profile_pic]' class='card-img-top'>
             <div class='card-body' style='border: 1px black solid;'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='Function\delete_user.php? id=$row[id]' class='btn btn-danger'>حذف</a>
                    <a href='update.php? id=$row[id]' class='btn btn-primary'>تعديل</a>
                </div>
            </div>
        </main>
            <center>
            ";
    }
    mysqli_close($con);
    ?>
    </center>
</body>

</html>