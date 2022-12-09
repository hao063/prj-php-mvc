<?php 
    session_start();
    require '../../../config/database.php';
    require '../../../libraries/database.php';
    require '../../../app/function.php';
    require '../../../app/cart.php';
    db_connect($db);




    function OrderToMe($status){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM orders WHERE id_customer = $id_customer AND status = $status AND customer_active = 1";
        $result_order = db_fetch_array($sql);
        $data = [];
        foreach ($result_order as $key => $order){
            $data[$key]['id'] = $order['id'];
            $data[$key]['username'] = $order['username'];
            $data[$key]['company'] = $order['company'];
            $data[$key]['number_phone'] = $order['number_phone'];
            $data[$key]['province_city'] = $order['province_city'];
            $data[$key]['district'] = $order['district'];
            $data[$key]['wards'] = $order['wards'];
            $data[$key]['note_address'] = $order['note_address'];
            $data[$key]['total_product'] = $order['total_product'];
            $data[$key]['total_price'] = $order['total_price'];
            $data[$key]['status'] = $order['status'];
            $data[$key]['time_order'] = $order['time_order'];
            $data[$key]['orderDetail'] = [];
            $sql_detail = "SELECT * FROM order_detail WHERE id_order =  {$order['id']}";
            $result_order_detail = db_fetch_array($sql_detail);
            foreach ($result_order_detail as $key_detail => $order_detail) {
                $data[$key]['orderDetail'][$key_detail]['id_order'] =  $order_detail['id_order'];
                $data[$key]['orderDetail'][$key_detail]['id_product'] =  $order_detail['id_product'];
                $id_product = $order_detail['id_product'];
                $sql_product = "SELECT * FROM products WHERE id = $id_product";
                $db_product = db_fetch_row($sql_product);
                $data[$key]['orderDetail'][$key_detail]['name_product'] =  base64_decode($db_product['name']);
                $sql_img = "SELECT * FROM images_product WHERE id_product = $id_product";
                $db_img = db_fetch_row($sql_img);
                $image =  $db_img['name_img'].'.'.$db_img['type_img'];
                $data[$key]['orderDetail'][$key_detail]['image'] =  $image;
                $data[$key]['orderDetail'][$key_detail]['price'] =  $order_detail['price'];
                $data[$key]['orderDetail'][$key_detail]['sale'] =  $order_detail['sale'];
                $data[$key]['orderDetail'][$key_detail]['total_quantity'] =  $order_detail['total_quantity'];
                $data[$key]['orderDetail'][$key_detail]['total_price'] =  $order_detail['total_price'];
            }
        }
        return $data;
    }

    function checkRowOrder($status){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM orders WHERE id_customer = $id_customer AND status = $status";
        $row = db_num_row($sql);
        if($row > 0){
            return true;
        }else{
            return false;
        }
    }
?>