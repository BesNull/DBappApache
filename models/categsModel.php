<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "Название");
   $colsDB = array("id", "name");
   $model = new TableModel("categs", $cols, $colsDB,null);
   $model->connect($host, $user, '', $database);
?>