<?php 

    function getProductRow($id) {
        $items = $_SESSION['cart']['items'];
        if(array_key_exists($id,$items)){
            return true;
        }else{
            return false;
        }
    }

    function getRowAddresses(){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM address WHERE id_customer = '$id_customer' AND status = 'active'";
        $row =  db_num_row($sql);
        if($row > 0){
            return true;
        }else{
            return false;
        }
    }

    function getDataAddressChechOut(){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM address WHERE id_customer = '$id_customer' AND status = 'active'";
        return db_fetch_row($sql);
    }
   
    function insertDataOrder($data){
        $table = 'orders';
        return db_insert($table, $data);
    }

    function getDataPriceProduct($id){
        $table = 'products';
        $sql = "SELECT * FROM $table WHERE id = $id";
        $data = db_fetch_row($sql);
        return $data;
    }

    function insertDataOrderDetail($data){
        $table = 'order_detail';
        db_insert($table, $data);
        return true;
    }

    

?>