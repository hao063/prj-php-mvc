<?php 

    function check_val_star($id_product){
        $sql =  "SELECT  * FROM product_evaluate WHERE id_product = $id_product";
        $row = db_num_row($sql);
        if($row > 0){
            return true;
        }else{
            return false;
        }
    }

    function getDataProductEvaluate($id_product){
        $sql = "SELECT * FROM product_evaluate WHERE id_product = $id_product";
        return db_fetch_row($sql);
    }

?>