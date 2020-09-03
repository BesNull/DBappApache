<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "Книга", "Пользовател");
   $colsDB = array("id", "idBook", "idUser");
   $colsLookUp = array(array("idBook", "name", "book"), array("idUser", "login", "users"));
   $model = new TableModel("korz", $cols, $colsDB,$colsLookUp );
   $model->connect($host, $user, '', $database);
?>