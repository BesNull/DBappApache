
     <?php 
         include "../../models/korzModel.php";
        $model->delete($_GET['id']);
        header("Location: index.php");
        exit;
     ?>
 