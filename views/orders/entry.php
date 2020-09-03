
<a href="index.php" style="height:2%;" id="butCancel" name="cancel" id="cancel" value="Cancel" class = "butStyle">Отмена</a>  
 <h1 align="center">Редактирование книги</h1>
 <body class = 'menuBack'>
     <?php 
        include "../../models/ordersModel.php";
        include "../../webTools/WebFunctions.php";
        if(isset($_POST['submit']))
        {
           if($_POST['curId'] == -1){
             $name = $_POST['sum'];
             $year = $_POST['date'];
             
             $izobr = $_POST['dateVip'];
             $cost = $_POST['book'];
             $cnt = $_POST['users'];
             $data = array($name, $year,$izobr, $cost,$cnt);
             $model->add($data);
             header("Location: index.php");
             exit;
           }
           else
           {
            $name = $_POST['sum'];
            $year = $_POST['date'];
            
            $izobr = $_POST['dateVip'];
            $cost = $_POST['book'];
            $cnt = $_POST['users'];
            $data = array($name, $year,$izobr, $cost,$cnt);
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
         <p><input required class  = \"textbox\" placeholder=\"Введите сумму\" type=\"number\" step=\"0.01\" name=\"sum\" size=\"18\" /></p>
        ";
        echo " 
        <p><input required class  = \"textbox\" placeholder=\"Введите дату оформления\"  type=\"date\" name=\"date\" size=\"18\" /></p>
       ";
       echo " 
       <p><input required class  = \"textbox\" placeholder=\"Введите выполнения\" type=\"date\" name=\"dateVip\" size=\"18\" /></p>
      ";
    
    
        echo "<h3>Выберите книгу</h3>";
        echo WebFunctions::getLookUpComboBox($model->link, "book", "name", "id", "book", -1); 
        echo "<h3>Выберите пользователя</h3>";
        echo WebFunctions::getLookUpComboBox($model->link, "users", "login", "id", "users", -1); 
    
       
         }
         else
         {
             $row = WebFunctions::getRowFromTable("orders", $id, "id", 6, $model->link);
            echo " 
            <p><input required class  = \"textbox\" placeholder=\"Введите сумму\"  type=\"number\" step=\"0.01\"  name=\"sum\" size=\"18\" value = \"".$row[1]."\"/></p>";
            echo " 
            <p><input required class  = \"textbox\" placeholder=\"Введите дату оформления\"  type=\"date\" name=\"date\" size=\"18\" value = \"".$row[2]."\"/></p>";
            echo " 
            <p><input required class  = \"textbox\" placeholder=\"Введите выполнения\" type=\"date\" name=\"dateVip\" size=\"18\" value = \"".$row[3]."\"/></p>";
           
            echo "<h3>Выберите книгу</h3>";
        echo WebFunctions::getLookUpComboBox($model->link, "book", "name", "id", "book", $row[4]); 
        echo "<h3>Выберите пользователя</h3>";
        echo WebFunctions::getLookUpComboBox($model->link,"users", "login", "id", "users", $row[5]);
        
          }
         ?>  
         
         </body>
  <div align="center">
  <button style="width:15%;height:4%; " name="submit" id="submit" value="Submit" class = 'butStyle'>Сохранить</button>  
  </form>  
  
      </div>
  
</body>