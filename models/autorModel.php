<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "ФИО");
   $colsDB = array("id", "fio");
   $model = new TableModel("autor", $cols, $colsDB,null);
   $model->connect($host, $user, '', $database);
?>