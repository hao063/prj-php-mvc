<?php

    function getDataOrder($status){
        $sql = "SELECT * FROM orders WHERE status =  $status AND admin_active = '1'";
        $row = db_num_row($sql);
        $data = [];
        if($row > 0){
            $data = db_fetch_array($sql);
        }
        return $data;
    }

    function  getDataDetail($idOrder, $status){
        $sql = "SELECT * FROM orders WHERE id = $idOrder AND admin_active = '1'";
        $data_order = db_fetch_row($sql);
        $data = [];
        $data['id'] = $data_order['id'];
        $data['status'] = $status;
        $data['username'] = $data_order['username'];
        $data['phone'] = $data_order['number_phone'];
        $data['company'] = $data_order['company'];
        $data['address'] = $data_order['note_address'].', '.$data_order['wards'].', '.$data_order['district'].', '.$data_order['province_city'];
        if($data_order['type_address'] == 1){
            $data['type_address'] = 'Nhà riêng/Chung cư'; 
        }else{
            $data['type_address'] = 'Cơ quan/Công ty'; 
        }
        $data['total_product'] = $data_order['total_product'];
        $data['total_price'] = $data_order['total_price'];
        $data['order_detail'] = [];
        $sql_detail = "SELECT * FROM order_detail WHERE id_order = $idOrder";
        $data_detail = db_fetch_array($sql_detail);
        foreach($data_detail as $key => $value){
            $sql_detail_pro = "SELECT * FROM products WHERE id = {$value['id_product']}";
            $data_detail_pro = db_fetch_row($sql_detail_pro);
            $data['order_detail'][$key]['id'] = $value['id'];
            $data['order_detail'][$key]['id_product'] = $value['id_product'];
            $data['order_detail'][$key]['name'] = $data_detail_pro['name'];
            $data['order_detail'][$key]['price'] = $value['price'];
            $data['order_detail'][$key]['sale'] = $value['sale'];
            $data['order_detail'][$key]['total_quantity'] = $value['total_quantity'];
            $data['order_detail'][$key]['total_price'] = $value['total_price'];
        }
        return $data;
    }

    function getDeleteAdminOrder($idOrder){
        $sql = "SELECT * FROM orders WHERE id = $idOrder";
        $data_order =  db_fetch_row($sql);
        $where = "id = $idOrder";
        $table = "orders";
        if($data_order['customer_active'] == '1'){
            $data = [
                'admin_active' => 0
            ];
            db_update($table, $data, $where);
        }else{
            db_delete($table, $where);            
        }
        return true;
    }

?>