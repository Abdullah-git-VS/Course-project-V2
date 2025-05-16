<DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title: "default";?></title>
    <link rel="stylesheet" href="css/headerList.css">
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <h1> <?php echo isset($title) ? $title:"default page";?> </h1>
      </div>
    
    </nav>
 </header>
 
</body>
</html>