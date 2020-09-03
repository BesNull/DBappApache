
 <a href="index.php" style="height:2%;" id="butCancel" name="cancel" id="cancel" value="Cancel" class = "butStyle">Отмена</a>  
 <h1 align="center">Редактирование категории</h1>
 <body class = 'menuBack'>
     <?php 
        include "../../models/categsModel.php";
        include "../../webTools/WebFunctions.php";
        if(isset($_POST['submit']))
        {
           if($_POST['curId'] == -1){
             $name = $_POST['name'];
             $data = array($name);
             $model->add($data);
             header("Location: index.php");
             exit;
           }
           else
           {
            $name = $_POST['name'];
            $data = array($name);
            $model->add($data, $_POST['curId']);
            header("Location: index.php");
            exit;
           }
        }
      ?>
     <head>
    <link rel="stylesheet" type="text/css" href="../../styles/style.css">
    <style>
        h1,h3{
            font-size: 50px;
        }
        h3
        {
            font-size: 30px;
        }

    </style>
    <meta charset="UTF-8" />
  </head>
  
  <hr size=3px width=100% color= #316e6a float="left">
  <body class = 'bodyStyle'>
  <form method = "POST">
        <?php 
         $id = $_GET['id'];
         echo " <p><input required   type=\"hidden\" name=\"curId\" value=\"$id\" size=\"18\" /></p>";
         if($id == -1)
         {
         echo " 
         <p><input required class  = \"textbox\" placeholder=\"Введите название категории\" id = \"nameInp\" type=\"text\" name=\"name\" size=\"18\" /></p>
        ";
       
         }
         else
         {
             $row = WebFunctions::getRowFromTable("categs", $id, "id", 2, $model->link);
            echo " 
            <p><input required class = \"textbox\" placeholder=\"Введите название предмета\" id = \"nameInp\" type=\"text\" name=\"name\" size=\"18\" value = \"".$row[1]."\"/></p>";
         }
         ?>   
  </body>
  <div align="center">
  <button style="width:15%;height:4%; " name="submit" id="submit" value="Submit" class = 'butStyle'>Сохранить</button>  
  </form>  
  
      </div>
  
</body>
