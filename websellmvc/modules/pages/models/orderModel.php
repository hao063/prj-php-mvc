<?php

    function getRemoveOrderCustomer($id){
        $table = 'orders';
        $sql_order = "SELECT * FROM $table WHERE id = '$id' AND customer_active = '1'";
        $data_order = db_fetch_row($sql_order);
        $where = "id = $id";
        if($data_order['admin_active'] == 1){
            $data = [
                'customer_active' => 0
            ];
            db_update($table, $data, $where);
        }else{
            db_delete($table, $where);
        }
        return true;
    }
    function getModelConfirmOrder($status, $id){
        $table = "orders";
        $sql_order = "SELECT * FROM orders WHERE id = $id";
        if($status == '4'){
            $data = [
                'status' => 4,
                'admin_active' => 0
            ];
        }
        if($status == '3'){
            $data = [
                'status' => 3,
            ];
            $sql_detail_order = "SELECT * FROM order_detail WHERE id_order = $id";
            $data_detail_order =  db_fetch_array($sql_detail_order);
            foreach ($data_detail_order as $row) {
                $idProduct =  $row['id_product'];
                $table_product = "products";
                $sql_product = "SELECT * FROM $table_product WHERE id = $idProduct";
                $result = db_fetch_row($sql_product);
                $bought = $result['bought'] + 1;
                $data_product = [
                    'bought' => $bought,
                ];
                $where_product = "id = $idProduct";
                db_update($table_product, $data_product, $where_product);
            }
        }
        $where = "id = $id";
        db_update($table, $data, $where);
        return true;        
    }

    function check_comment($id){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM `product_evaluate` INNER JOIN customer_evaluate ON product_evaluate.id = customer_evaluate.id_evaluate WHERE customer_evaluate.id_customer = $id_customer AND product_evaluate.id_product = $id";
        return db_num_row($sql);
    }

?>