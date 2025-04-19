<?php
include ('..\admin\Function\config.php');
if(isset($_POST['submit'])){

   
   
   if (strlen($_POST['password']) < 8) {
      $message[] = "Password must be at least 8 characters!";
   } else { 
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));

   $select = mysqli_query($con, "SELECT * FROM user_info WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($con, "INSERT INTO user_info(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      mysqli_close($con);
      header('location:../home_Page.php');
   }
}

}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>register</title>
      
      <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">
      <style>
         input{
            text-align: center;
         }
         </style>
         <script src="../script.js"></script>
</head>
<body>
   
   <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
   <div class="form-container">
      
      <form onSubmit="return validate();" method="post" >
         <h3>انشاء حساب جديد</h3>
         <input type="text" name="name" required placeholder="اسم المستخدم" class="box">
         <input type="email" name="email" required placeholder="البريد الالكتروني" class="box">
         <input type="password" name="password" required placeholder="كلمة المرور" class="box" name="password" id="password">
         <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box" id="confirm_password">
         <input type="submit" name="submit" class="btn" value="تسجيل حساب">
         <p>هل لديك حساب؟ <a href="../../home_Page.php"> تسجيل دخول</a></p>
      </form>
      
   </div>
   
</body>
</html>