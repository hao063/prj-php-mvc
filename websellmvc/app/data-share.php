<?php
   

    function dataCategory(){
        $sql = "SELECT * FROM categorys LIMIT 6";
        $data = db_fetch_array($sql);
        return $data;
    }

    function dataSearchPopular(){
        $sql = "SELECT * FROM products ORDER BY search DESC LIMIT 6";
        $result = db_fetch_array($sql);
        foreach($result as $key => $item) {
            $data[$key]['id'] = $item['id'];
            $data[$key]['name'] = $item['name'];
            $sql = "SELECT * FROM images_product WHERE id_product = {$item['id']}";
            $img_data = db_fetch_row($sql);
            $data[$key]['img'] = $img_data['name_img'].'.'.$img_data['type_img'];
        }
        return $data;
    }

    function historySearch() {
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM history_search WHERE id_customer = $id_customer ORDER BY id DESC";
        $result = db_fetch_array($sql);
        $data = [];
        foreach ($result as $key => $value) {
            $data[$key]['id'] = $value['id'];
            $data[$key]['id_product'] = $value['id_product'];
            $sql_product = "SELECT * FROM products WHERE id = {$value['id_product']}";
            $data_product = db_fetch_row($sql_product);
            $data[$key]['name'] = $data_product['name'];
        }
        return $data;
    }

    function dataSearchCategory(){
        $sql = "SELECT * FROM categorys LIMIT 4";
        $result = db_fetch_array($sql);
        $data = [];
        foreach ($result as $key => $item){
            $data[$key]['id'] = $item['id'];
            $data[$key]['name'] = $item['name'];
            $sql_product = "SELECT * FROM products WHERE id_category = {$item['id']}";
            $data_product = db_fetch_row($sql_product);
            $sql_img = "SELECT * FROM images_product WHERE id_product = {$data_product['id']}";
            $data_img = db_fetch_row($sql_img);
            $img = $data_img['name_img'].'.'.$data_img['type_img'];
            $data[$key]['img'] = $img;
        }
        return $data;
    }

    function checkLogin($idLogin){
        $sql =  "SELECT * FROM customers WHERE id = $idLogin";
        $data = db_fetch_row($sql);
        if($data['token_login'] == 'false'){
            headerLocation('?contrl=customer&ac=logout');
        }else{
            return true;
        }
    }

    function getDataChart(){
        $dayofweek = date('w');
        $dayCurrent = [];
        $dataOrderInWeek = [];
        // thứ 2
        if($dayofweek == 1){
            $getCountDay =  $dayofweek ;
            $dayCurrent[0] =  date('Y-m-d',(strtotime ( "-$getCountDay day" , strtotime ( date('Y-m-d'))))); 
            $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[0]' AND status = 3 AND admin_active = 1";
            $qtyOrder = db_num_row($sql);
            $dataOrderInWeek[0] = $qtyOrder;
        }
        // thứ 3
        if($dayofweek == 2){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }
        // thứ 4
        if($dayofweek == 3){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }
        // thứ 5
        if($dayofweek == 4){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }
        // thứ 6
        if($dayofweek == 5){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }
        // thứ 7
        if($dayofweek == 6){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }
         // thứ chủ nhật
        if($dayofweek == 7){
            $getCountDay =  $dayofweek ;
            for ($i =0  ; $i < $getCountDay; $i++) { 
                $dayCurrent[$i] =  date('Y-m-d',(strtotime ( "-$i day" , strtotime ( date('Y-m-d')))));
                $sql = "SELECT * FROM orders WHERE time_order = '$dayCurrent[$i]' AND status = 3 AND admin_active = 1";
                $qtyOrder = db_num_row($sql);
                $dataOrderInWeek[$i] = $qtyOrder;
            }
        }

        $totalCount = count($dataOrderInWeek);
        if($totalCount < 7){
            $dayShort = 7 - $totalCount;
            for ($i= $totalCount; $i < $totalCount + $dayShort; $i++) { 
                array_unshift($dataOrderInWeek, 0);
            }
        }
        return array_reverse($dataOrderInWeek);
    }
   
?>