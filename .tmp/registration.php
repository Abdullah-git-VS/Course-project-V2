<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="index2.css">

    <style>
        .reg-container {
            background-color: #272757;
            width:450px;
            height:450px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 20px;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        

        form {
            background-color:rgb(28, 28, 81);
            width: 100%;
            height:300px;
            border-radius: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        form .input {
            margin:10px;
            width:300px;
            height: 50px;
            border-radius: 5px;
            background-color:rgb(43, 43, 115);
            border:none;
            outline:none;
            color: white;
            padding: 20px;
            /* the input size will grow if there is a space for grow */
            flex-grow:1;

        }

        form button {
            background-color: rgb(43, 43, 115); 
            color:white;
            border: none;
            border-radius: 5px;
            position: relative;
            bottom: 3px;
            margin:5px;
            cursor: pointer;
            width:200px;
            height: 50px;
            flex-grow:1;
            font-size: 20px;

        }

       

        .input::placeholder {
            color: white;
            font-size: 20px;
        }

        button:hover {
            background-color: rgb(126, 126, 161);
            transition: 0.3s;
       }

       h2 {
        
            color: black;
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: underline;
           
        }

        p {
           
            font-size: 20px;
            color: black;
            text-align: center;
            margin-top: 10px;
        }

        .reg-container h2, .reg-container p {
            margin: 0; /*  it will make margin remove */
       }
       
    </style>

</head>

<body>
    <?php include($_SERVER["DOCUMENT_ROOT"]."\list.php");
header.php'; ?>

    <h2> Sign-in form </h2>
    <p> Please fill the information </p>

    <div class="reg-container">
    
    <form>

        <input type="text" class="input" name="username" id="username "placeholder="Username" required> <br>
        <input type="password" class="input" name="username" id="username "placeholder="password" required> <br>
        
        <button type="submit" > <strong> Sign-in </strong> </button> <br>
        
    </form>
    </div>


</body>
</html>