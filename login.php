
 
     <?php 
        require_once "./webTools/WebFunctions.php";
        require_once "./webTools/dbConnection.php";
        if(isset($_POST['submit']))
        {
         $link = mysqli_connect($host, $user, '', $database);
            $cnt=WebFunctions::checkUser($link, $_POST['login'], $_POST['password']);
            if($cnt==0)
              echo "<h3 align=\"center\">Неверный логин или пароль</h3>";
            else{
               header("Location: ./menu.php");
               exit;
            }
        }
      
     ?>
     <head>
    <style>
        h1{
            font-size: 50px;
            margin-left: 30%;
        }
        h3
        {
            font-size: 30px;
            color: red;
        }

    </style>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
  </head>
  <h2 align="center" >Авторизация</h2>
  <hr size=3px width=100% color= #316e6a float="left">
  <body class = 'bodyStyle' >
  <form method = "POST" style="background:url(../styles/autorizFon.png) no-repeat center center fixed;">
        <p><input class = "textbox"  id = "login" placeholder="Введите логин" type="text" name="login" size="18" required /></p>
        <p><input class = "textbox" type="password" id = "password" placeholder="Введите пароль" type="text" name="password" size="18" required /></p>
  <button style="width:15%;height:4%; margin-left:25%;" name="submit" id="submit" value="Submit" class = 'butStyle'>Войти</button>  
  <a href="../mainPage.php" style="width:15%;height:2%; margin-left:5%;" id="butCancel" name="cancel" id="cancel" value="Cancel" class = "butStyle">Отмена</a>  
  </form>  
</body>