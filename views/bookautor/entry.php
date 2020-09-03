
<a href="index.php" style="height:2%;" id="butCancel" name="cancel" id="cancel" value="Cancel" class = "butStyle">Отмена</a>  
 <h1 align="center">Редактирование книги</h1>
 <body class = 'menuBack'>
     <?php 
        include "../../models/bookautorModel.php";
        include "../../webTools/WebFunctions.php";
        if(isset($_POST['submit']))
        {
           if($_POST['curId'] == -1){
            $book = $_POST['book'];
             
             $autor = $_POST['autor'];

             $data = array($book, $autor);
             $model->add($data);
            
               header("Location: index.php");
               exit;
           }
           else
           {
            $book = $_POST['book'];
            $autor = $_POST['autor'];
            $data = array($book, $autor);
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
      
         
          echo "<h3>Книга</h3>";
          echo WebFunctions::getLookUpComboBox($model->link, "book", "name", "id", "book", -1);
          echo "<h3>Автор</h3>";
          echo WebFunctions::getLookUpComboBox($model->link, "autor", "fio", "id", "autor", -1);  
    
         }
         else
         {
             $row = WebFunctions::getRowFromTable("bookautor", $id, "id", 3, $model->link);
             echo "<h3>Студент</h3>";
             echo WebFunctions::getLookUpComboBox($model->link, "book", "name", "id", "book", $row[1]); 
             echo "<h3>Лабораторная работа</h3>";
             echo WebFunctions::getLookUpComboBox($model->link, "autor", "fio", "id", "autor", $row[2]); 
        
          }
         ?>  
         
         </body>
  <div align="center">
  <button style="width:15%;height:4%; " name="submit" id="submit" value="Submit" class = 'butStyle'>Сохранить</button>  
  </form>  
  
      </div>
  
</body>