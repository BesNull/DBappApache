
     <?php 
        include "../../models/autorModel.php";
        $model->delete($_GET['id']);
        header("Location: index.php");
        exit;
     ?>
 