
<?php
require_once 'WebTools/WebFunctions.php';
   $actionType = $_GET['actionType'];
  if($actionType == "viewTable"){
     $url="views/{$_GET['action']}/index.php";
       if(isset($_GET['parentPage']))
        $url.= "?parentPage=".$_GET['parentPage'];    

     if(isset($_GET['extra']))
        $url.="&extra=".$_GET['extra'];

     header("Location: ".$url);
     exit;
   }
   if($actionType == "deleteTable"){
    header("Location: views/{$_GET['action']}/delete.php?id={$_GET['id']}");
    exit;
  }
  if($actionType == "editTable"){
    if(isset($_GET['extra']))
     {
      header("Location: views/{$_GET['action']}/entry.php?id={$_GET['id']}&extra={$_GET['extra']}");
      exit;
     }

    header("Location: views/{$_GET['action']}/entry.php?id={$_GET['id']}");
    exit;
  }
   if($_GET['action'] == "adminMenu")
   {
    header("Location: adminMenu.php");
    exit;
   }

?>