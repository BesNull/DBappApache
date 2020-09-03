<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "Название", "Год выпуска", "Цена", "Количество на складе", "Категория");
   $colsDB = array("id", "name", "year", "cost", "cnt" ,"idCateg");
   $colsLookUp = array(array("idCateg", "name", "categs"));
   $model = new TableModel("book", $cols, $colsDB,$colsLookUp );
   $model->connect($host, $user, '', $database);
?>