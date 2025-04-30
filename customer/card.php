<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربتي | عربة المنتجات</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h3 {
            font-family: 'Cario', sans-serif;
            font-weight: bold;
        }

        main {
            margin-top: 50px;
            width: 70%;
            margin-top: 30px;
        }

        .table {
            --bs-table-bg: none;
            --bs-table-color: none;
        }

        table {
            box-shadow: 1px 1px 10px silver;
            border-radius: var(--bs-border-radius);
        }

        thead {
            background-color: #3498db;
            color: white;
            text-align: center;
            border-radius: var(--bs-border-radius);

        }

        tbody {
            text-align: center;
            border-radius: var(--bs-border-radius);
        }

        ath,
        bth {
            border-top-left-radius: var(--bs-border-radius);

        }
    </style>
</head>

<body>
    <center>
        <h3>
            منتجاتك المحجوزة
        </h3>
        <main>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col' class='ath'>product name</th>
                        <th scope='col'>product price</th>
                        <th scope='col' class='bth'>Delete product</th>
                    </tr>
                </thead>
                <?php
                include('..\admin\Function\config.php');
                $result = mysqli_query($con, "SELECT * FROM addcard");
                while ($row = mysqli_fetch_array($result)) {
                    echo ("
                    <tbody>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td><a href='"."http://".$_SERVER['HTTP_HOST']."/admin/Function/delete.php?id=".$row['id']."'class='btn btn-danger'>ازالة</a></td></tr>");
                }
                mysqli_close($con);
                ?>
                </tbody>
            </table>
        </main>
        <a href="shop.php">صفحة المنتجات</a>
    </center>
</body>

</html>