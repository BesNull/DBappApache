<?php
   include 'TableModel.php'; 
   require_once '../..//webTools/dbConnection.php';
   $cols = array("Номер", "Книга", "Автор");
   $colsDB = array("id", "idBook", "idAutor");
   $colsLookUp = array(array("idBook", "name", "book"), array("idAutor", "fio", "autor"));
   $model = new TableModel("bookautor", $cols, $colsDB,$colsLookUp );
   $model->connect($host, $user, '', $database);
?>