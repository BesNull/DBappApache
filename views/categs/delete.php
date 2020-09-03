
     <?php 
        include "../../models/categsModel.php";
        $model->delete($_GET['id']);
        header("Location: index.php");
        exit;
     ?>
 