<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "Сумма", "Дата", "Дата выполнения", "Книга", "Пользователь");
   $colsDB = array("id", "sum", "date", "dateVip", "idBook", "idUser");
   $colsLookUp = array(array("idBook", "name", "book"), array("idUser", "login", "users"));
   $model = new TableModel("orders", $cols, $colsDB, $colsLookUp);
   $model->connect($host, $user, '', $database);
?>