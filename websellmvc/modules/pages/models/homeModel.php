<?php 
    function getDataSale() {
        $sql  = "SELECT * FROM products WHERE sale != 0";
        $data = [];
        $dataProductSale = db_fetch_array($sql);
        
        foreach ($dataProductSale as $key => $item) {
            $data[$key]['id'] = $item['id'];
            $data[$key]['name'] = $item['name'];
            $data[$key]['price'] = $item['price'];
            $data[$key]['sale'] = $item['sale'];
            $data[$key]['total'] = $item['total'];
            $data[$key]['bought'] = $item['bought'];
            $sql =  "SELECT * FROM images_product WHERE id_product = {$item['id']}";
            $row_img_check = db_num_row($sql);
            if($row_img_check > 0) {
                $dataImage =  db_fetch_row($sql);
                $image = $dataImage['name_img'].'.'.$dataImage['type_img'];
            }else{
                $image = 'default.jpg';
            }
            $data[$key]['img'] = $image;  
        }
        return $data;
    }

    function getDataTrend(){
        $sql  = "SELECT * FROM products WHERE sale != 0 LIMIT 4";
        $data = [];
        $dataProductSale = db_fetch_array($sql);
        foreach ($dataProductSale as $key => $item) {
            $data[$key]['id'] = $item['id'];
            $data[$key]['name'] = $item['name'];
            $data[$key]['price'] = $item['price'];
            $data[$key]['sale'] = $item['sale'];
            $data[$key]['total'] = $item['total'];
            $data[$key]['bought'] = $item['bought'];
            $sql =  "SELECT * FROM images_product WHERE id_product = {$item['id']} LIMIT 2";
            $dataImage =  db_fetch_array($sql);
            $row_img_check = db_num_row($sql);
            if($row_img_check > 0) {
                foreach($dataImage as $keyImage => $itemImage) {
                    $data[$key]['img'][$keyImage] =  $itemImage['name_img'].'.'.$itemImage['type_img'];           
                }
            }else{
                $data[$key]['img'][0] = 'default.jpg';
            }
            

        }
        return $data;
    }

    function getDataDetailIndex($idProduct){
        $sql = "SELECT * FROM products WHERE id = $idProduct";
        $data = [];
        $dataDetail = db_fetch_row($sql);
        $data['id'] =  $dataDetail['id'];
        $data['name'] =  $dataDetail['name'];
        $data['price'] =  $dataDetail['price'];
        $data['sale'] =  $dataDetail['sale'];
        $data['total'] =  $dataDetail['total'];
        $data['bought'] =  $dataDetail['bought'];
        $data['trademark'] =  $dataDetail['trademark'];
        $data['origin'] =  $dataDetail['origin'];
        $sql_img = "SELECT * FROM images_product WHERE id_product = {$dataDetail['id']}";
        $img_check_row = db_num_row($sql_img);
        if($img_check_row > 0){
            $dataImage  = db_fetch_array($sql_img);
            foreach ($dataImage  as $key =>  $img) {
                $data['img'][$key] =  $img['name_img'].'.'.$img['type_img'];
            }
        }else{
            $data['img']['default'] = 'default.jpg';
        }
       
        $sql_description = "SELECT * FROM description_product WHERE id_product =  {$dataDetail['id']}";
        $dataDescription = db_fetch_array($sql_description);
        foreach ($dataDescription  as $description) {
            $data['description'] =  $description['description'];
        }
        return $data;
    }

    function getDataSimilar($idProduct){
        $sql = "SELECT * FROM products WHERE id = $idProduct";
        $data = [];
        $dataDetail = db_fetch_row($sql);
        $idCategory = $dataDetail['id_category'];
        $sqlSimilar = "SELECT * FROM products WHERE id_category = $idCategory LIMIT 5";
        $dataSimilar  = db_fetch_array($sqlSimilar);
        foreach($dataSimilar as $key => $item){
            $data[$key]['id'] = $item['id'];

            $data[$key]['name'] = $item['name'];
            $data[$key]['price'] = $item['price'];
            $data[$key]['sale'] = $item['sale'];
            $data[$key]['bought'] = $item['bought'];
            $data[$key]['trademark'] = $item['trademark'];
            $data[$key]['origin'] = $item['origin'];
            $sql2 =  "SELECT * FROM images_product WHERE id_product = {$item['id']}";
            $dataImage =  db_fetch_row($sql2);
            $row_img_check = db_num_row($sql2);
            if($row_img_check > 0) {
                $image = $dataImage['name_img'].'.'.$dataImage['type_img'];
            }else{
                $image = 'default.jpg';
            }
            $data[$key]['img'] =  $image;      
            $sql3 =  "SELECT * FROM description_product WHERE id_product = {$item['id']}";
            $dataDescription =  db_fetch_row($sql3);
            $data[$key]['description'] = $dataDescription['description'];
                
            $idProduct = $item['id'];

            $sql_product_evaluate = "SELECT * FROM product_evaluate WHERE  id_product = $idProduct";
            $row_product_evaluate = db_num_row($sql_product_evaluate);
            if($row_product_evaluate > 0){
                $data_product_evaluate = db_fetch_row($sql_product_evaluate);
                $sql_customer_evaluate = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_product_evaluate['id']}";
                $row_customer_evaluate = db_num_row($sql_customer_evaluate);
                $data[$key]['total_evaluate_star'] = $data_product_evaluate['total_evaluate'] / $row_customer_evaluate;
                $data[$key]['total_evaluate_customer'] = $row_customer_evaluate;
            }else{
                $data[$key]['total_evaluate_customer'] = 0;
            }

        }
        return $data;
    }
    
    function getNumRowProduct($where){
        $sql = "SELECT * FROM products WHERE $where";
        return db_num_row($sql);
    }

    function insertDataHistorySearch($idProduct){
        $table = 'history_search';
        $idCustomer = getIdCustomer();
        if($idCustomer != null){
            $sql = "SELECT * FROM $table WHERE id_product = $idProduct AND id_customer = $idCustomer";
            $row = db_num_row($sql);
            if($row == 0){
                $sql_histore = "SELECT * FROM $table WHERE id_customer = $idCustomer";
                $row_histore = db_num_row($sql_histore);
                if($row_histore > 3){
                    deleteHistorySearch();
                }
                $data_history =  [
                    'id_product' => $idProduct,
                    'id_customer' => $idCustomer,
                ];
                db_insert($table, $data_history);
            }
        }
    }

    function deleteHistorySearch(){
        $idCustomer = getIdCustomer();
        if($idCustomer != null){
            $table = 'history_search';
            $sql = "SELECT * FROM $table WHERE id_customer = $idCustomer";
            $data = db_fetch_array($sql);
            $id_last = '';
            foreach ($data as $row) {
                $id_last = $row['id'];
            }
            $where = "id = $id_last";
            db_delete($table, $where);
        }
    }
    function getCategory(){
        $sql = "SELECT * FROM categorys LIMIT 7";
        return db_fetch_array($sql);
    }
    function getDataSearch($search){
        $sql = "SELECT * FROM products WHERE name_search like '%$search%' ORDER BY id DESC LIMIT 4";
        $row =  db_num_row($sql);
        if($row > 0) {
            $result = db_fetch_array($sql);
            $data = [];
            foreach($result as $key => $item){
                $data[$key]['id'] = $item['id'];
                $data[$key]['name'] = base64_decode($item['name']);
                $data[$key]['bought'] = $item['bought'];
                $data[$key]['price'] = $item['price'];
                $data[$key]['sale'] = $item['sale'];
                $sql_img = "SELECT * FROM images_product WHERE id_product = {$item['id']}";
                $data_img = db_fetch_row($sql_img);
                $row_img_check = db_num_row($sql_img);
                if($row_img_check > 0) {
                    $image = $data_img['name_img'].'.'.$data_img['type_img'];
                }else{
                    $image = 'default.jpg';
                }
                $data[$key]['img'] = $image;

                $idProduct = $item['id'];

                $sql_product_evaluate = "SELECT * FROM product_evaluate WHERE  id_product = $idProduct";
                $row_product_evaluate = db_num_row($sql_product_evaluate);
                $data[$key]['total_evaluate_star'] = 0;
                if($row_product_evaluate > 0){
                    $data_product_evaluate = db_fetch_row($sql_product_evaluate);
                    $sql_customer_evaluate = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_product_evaluate['id']}";
                    $row_customer_evaluate = db_num_row($sql_customer_evaluate);
                    $data[$key]['total_evaluate_star'] = $data_product_evaluate['total_evaluate'] / $row_customer_evaluate;
                }else{
                }

            }
            return $data;
        }else{
            return null;
        }
    }


?>