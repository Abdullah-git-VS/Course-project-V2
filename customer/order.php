<html>
    <?php
    ob_start();
    session_start();
    include("../admin/functions/config.php");
    include("../admin/functions/restrictions.php");
    $userId=$_SESSION['user_id'];
    $isAdmin=$_SESSION['isAdmin'];
    

    ?>
<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="../shared/css/headerList.css">
<style>

    body {
        display:flex;
        flex-direction:column;
        align-items:center;
        padding: 50px;
    }

    .steps-container {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
        
    }

    .steps {
        width:60px;
        height:60px;
        border-radius: 50%;
        background-color: #272757;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
        cursor: pointer;
        font-size:24px;
        font-weight: bold;
        transition:  0.3s;
        border: 2px solid rgb(110, 110, 161);
    }

    .steps:hover {
        background-color: #aaa;
        color:white;
    }

    .steps h5 {
        color:white;
    }

    .content-container {
        max-width: 900px;
        max-height: 900px;
        background-color: #272757;
        padding: 20px;
        border-radius: 10px;
    }

    h2 {
        color: white;
        text-align: center;

    }

    .icons {
        max-width: 100%;
        max-height: 100%;


        border: 2px solid rgb(81, 81, 129);
        display: flex;
       justify-content: space-between;
        align-items: center;
        margin: 10px;
        gap: 50px;
    }

    .icon-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px;
    }

    .icon-item i {
        font-size:70px;
        color: white;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }

    .icon-item i:hover {
        transform: scale(1.5);
        color:rgba(154, 168, 165, 0.79);
        
    }

    .icon-item h3 {
        color:white;
        text-align: center;
        margin:0;
    }

    .icon-item.selected {
      background-color:rgba(156, 156, 192, 0.2);
      color: white;
      
}
    
    
    button {
        width:120px;
        height:40px;
        color:white;
        border:2px solid rgb(255, 170, 0);
        background-color:rgba(255, 170, 0, 0.56);
        transition:  0.3s;
    }

    button:hover {
        background-color:#272757;
        transform: scale(1.2);
    }

    .quantity{
        border: 2px solid rgb(81, 81, 129);
        width:50%;
        color:white;

    }

    .case3 {
        border: 2px solid rgb(81, 81, 129);
        color:white;
    }

    .input2{
        border: 2px solid rgb(81, 81, 129);
        color:white;
    }

    .summary {
        border: 2px solid rgb(81, 81, 129);
    }

    .summary p {
        color:white;
    }

    h3 {
        color:white;
    }
    


</style>


</head>

<body>




<div class="steps-container">
    <div class="steps" onclick="showStep(1)"> <h5> Step 1 </h5> </div>
    <div class="steps" onclick="showStep(2)"> <h5> Step 2 </h5> </div> 
    <div class="steps" onclick="showStep(3)"> <h5> Step 3 </h5> </div>
</div>

<div class="content-container" id="content">
<!-- content steps 1,2,3 will implemented here in js -->
   
</div>


  <link rel="stylesheet" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/shared/css/newStyle.css"; ?>">

<script src="../shared/js/all_script.js"> </script>



</body>
<?php

    
    $title = "Cart";
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\header.php");
    include($_SERVER["DOCUMENT_ROOT"] . "\shared\list.php");
   

if (isset($_GET['submit2'])) {
    $vehicle = $_GET['vehicle'];
    $destination = $_GET['destination'];
    $sql = "SELECT id FROM `order` WHERE userID = $userId ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $lastOrderId = $row['id'];
    
    $sql = "UPDATE `order` SET vehicle='$vehicle', destination='$destination' WHERE id='$lastOrderId' AND userId='$userId' 
            " or die("Query failed");
    
    $q = mysqli_query($con, $sql);
    

    header("Location: ../shared/products.php");
    exit;
}

  mysqli_close($con);
  ob_end_flush();
?>

</html>