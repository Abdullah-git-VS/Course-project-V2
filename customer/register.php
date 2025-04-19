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
         
         *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
         }

         body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
         }

         header {
	         display:flex;
	         justify-content:space-between;
	         align-items:center;
	         padding:10px;
         	width:100%;
            background-color: #252557;
           }

           .navbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:10px;
            background-color: #252557;
            width:100%;
            height: 60px;
           }

           .logo {
            display:flex;
            align-items:center;
            color:white;
            font-size:30px;
            font-weight:bold;
           }

             .logo p {
            margin-left: 800px;
            border-radius: 5px;
             }

             .logo h1 {
               font-size:30px;
	            text-transform:uppercase;
             }

             .logo a {
               color:white;
               text-decoration:none;
               font-size:20px;
               transition:0.3 ease;
               
             }

             .logo a:hover {
               background-color:rgba(255, 255, 255, 0.21);
             }

               .form-container {
                  background-color: #272757;
                   width: 450px;
                   height: 450px;
                   margin: 100px auto;
                     padding: 20px;
                    border-radius: 20px;

                     display: flex;
                      justify-content: center;
                      align-items: center;
               }

               form {
                  width: 100%;
                  height: 500px;
                    border-radius: 20px;
                   display: flex;
                   flex-wrap: wrap;
                    gap: 5px;
               }

               .form-container form h3 {
                  color: black;
                  font-size: 30px;
                  
               }

               .form-container form .inputs {
                  margin: 10px;
                  width: 300px;
                  height: 50px;
                  border-radius: 5px;
                  background-color: rgb(43, 43, 115);
                  border: none;
                  outline: none;
                  color: white;
                  padding: 20px;
                  /* the input size will grow if there is a space for grow */
                  flex-grow: 1;
               }

               .form-container form .inputs::placeholder {
                  color: white;
                  font-size: 20px;
               }

               .form-container form .submitting {
                  background-color: rgb(43, 43, 115);
                  color: white;
                  border: none;
                  border-radius: 5px;
                  position: relative;
                  bottom: 3px;
                  margin: 5px;
                  cursor: pointer;
                  width: 200px;
                  height: 50px;
                  flex-grow: 1;
                  font-size: 20px;

                  transition: 0.3s ease;
               }

               .form-container form .submitting:hover {
                  background-color: rgb(126, 126, 161);
                  transition: 0.3s;
               }


               .form-container form p,a {
                  color: black;
                  font-size: 20px;
                  text-decoration: none;
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
   
<header>
    <nav class="navbar">
      <div class="logo">
        <h1>Transport</h1>
        <p> <a href="#">back</a></p>
      </div>
    </nav>
 </header>

   <div class="form-container">

      <form onSubmit="return validate();" method="post" >
         <h3 class="heading">انشاء حساب جديد</h3>
         <input class="inputs" type="text" name="name" required placeholder="اسم المستخدم" class="box">
         <input class="inputs" type="email" name="email" required placeholder="البريد الالكتروني" class="box">
         <input class="inputs" type="password" name="password" required placeholder="كلمة المرور" class="box" name="password" id="password">
         <input class="inputs" type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box" id="confirm_password">
         <input class="submitting" type="submit" name="submit" class="btn" value="تسجيل حساب">
         <p>هل لديك حساب؟ <a href="../../home_Page.php"> تسجيل دخول</a></p>
      </form>      
   </div>

</body>
</html>