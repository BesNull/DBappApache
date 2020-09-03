
     <?php 
        include "../../models/ordersModel.php";
        $model->delete($_GET['id']);
        header("Location: index.php");
        exit;
     ?>
 