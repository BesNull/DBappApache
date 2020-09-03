
     <?php 
         include "../../models/bookautorModel.php";
        $model->delete($_GET['id']);
        header("Location: index.php");
        exit;
     ?>
 