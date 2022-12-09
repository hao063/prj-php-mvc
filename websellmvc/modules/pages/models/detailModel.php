                
<?php 
    function getRowProductId($id) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $row = db_num_row($sql);
        if($row > 0) {
            return true;
        }else{
            return headerLocation('?mod=errors&ac=error404Customer');
        }
    }

    function insertLikeCustomer($data){
        $table = 'like_product';
        db_insert($table, $data);
        return true;
    }
        
    function removeLike($idProduct){
        $table = 'like_product';
        $idCustomer = getIdCustomer();
        $where = "id_product = $idProduct AND id_customer = $idCustomer";
        db_delete($table, $where);
    }


    function getDataOverEvaluate($idProduct){
        $sql_evaluate = "SELECT * FROM product_evaluate WHERE id_product = $idProduct";
        $row_evaluate =  db_num_row($sql_evaluate);
        if($row_evaluate > 0){
            $data_valuate = db_fetch_row($sql_evaluate);
            $sql_eval_customer =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']}";
            $row_eval_customer  = db_num_row($sql_eval_customer);
            $data_eval_customer = db_fetch_array($sql_eval_customer);
            $data['totalStar'] = $data_valuate['total_evaluate'] / $row_eval_customer;
            $data['totalCustomerComment'] =  $row_eval_customer;
            $sql_star_5 =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']} AND star = 5";
            $data['star-5'] = db_num_row($sql_star_5);
            $sql_star_4 =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']} AND star = 4";
            $data['star-4'] = db_num_row($sql_star_4);
            $sql_star_3 =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']} AND star = 3";
            $data['star-3'] = db_num_row($sql_star_3);
            $sql_star_2 =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']} AND star = 2";
            $data['star-2'] = db_num_row($sql_star_2);
            $sql_star_1 =  "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_valuate['id']} AND star = 1";
            $data['star-1'] = db_num_row($sql_star_1);
            if($data['star-5'] == 0) {
                $data['star-percent-5'] = 0;
            }else{
                $data['star-percent-5'] = ($data['star-5'] / $row_eval_customer  ) * 100;
            }
            if($data['star-4'] == 0) {
                $data['star-percent-4'] = 0;
            }else{
                $data['star-percent-4'] = ($data['star-4'] / $row_eval_customer  ) * 100;
            }
            if($data['star-3'] == 0) {
                $data['star-percent-3'] = 0;
            }else{
                $data['star-percent-3'] = ($data['star-3'] / $row_eval_customer  ) * 100;
            }
            if($data['star-2'] == 0) {
                $data['star-percent-2'] = 0;
            }else{
                $data['star-percent-2'] = ($data['star-2'] / $row_eval_customer  ) * 100;
            }
            if($data['star-1'] == 0) {
                $data['star-percent-1'] = 0;
            }else{
                $data['star-percent-1'] = ($data['star-1'] / $row_eval_customer  ) * 100;
            }
            $data['total_imgae_eval'] = 0;
            foreach($data_eval_customer as $key => $item){
                $sql_total_image = "SELECT * FROM image_evaluate WHERE id_customer_evaluate = {$item['id']}";
                $data['total_imgae_eval'] += db_num_row($sql_total_image);
                $data_img = db_fetch_array($sql_total_image);
            }

            $sql_total_img_put = "SELECT * FROM `product_evaluate` INNER JOIN customer_evaluate ON product_evaluate.id = customer_evaluate.id_evaluate INNER JOIN image_evaluate ON customer_evaluate.id = image_evaluate.id_customer_evaluate WHERE product_evaluate.id_product = $idProduct;
            ";
            $data_totalimg_put = db_fetch_array($sql_total_img_put);
            
            foreach($data_totalimg_put as  $key => $value){
                $data['data_img_total_put'][$key]['name'] = $value['name'];
            }
            // get comment custommers

            $id_evaluate = $data_valuate['id'];
            $sql_comment_data = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$id_evaluate}";
            $data_comment_data = db_fetch_array($sql_comment_data);
            foreach ($data_comment_data as $key => $item){
                $id_customer = $item['id_customer'];
                $sql_get_info_customer = "SELECT * FROM customers WHERE id = {$id_customer}";
                $data_get_info_customer = db_fetch_row($sql_get_info_customer);
                $data['customer_comment'][$key]['id_customer'] = $id_customer;
                $data['customer_comment'][$key]['username'] = $data_get_info_customer['username'];

                $name_avata_array = explode(' ', $data_get_info_customer['username']);
                $name_avata = '';
                if(count($name_avata_array) > 1){
                    $text1 = substr(ucfirst($name_avata_array[0]), 0, 1);
                    $text2 = substr(ucfirst($name_avata_array[1]), 0, 1);
                    $name_avata = $text1.''.$text2;
                }else{
                    $text1 = substr(ucfirst($name_avata_array[0]), 0, 1);
                    $name_avata = $text1;
                }
                $data['customer_comment'][$key]['avata'] =  $name_avata;
                $data['customer_comment'][$key]['star'] = $item['star'];
                $data['customer_comment'][$key]['content'] = $item['content'];
                $data['customer_comment'][$key]['time'] = $item['time'];
                $sql_img = "SELECT * FROM image_evaluate WHERE id_customer_evaluate = {$item['id']}";
                $data_img = db_fetch_array($sql_img);
                foreach($data_img as $key2 => $val){
                    $data['customer_comment'][$key]['img'][$key2]['name'] = $val['name'];
                }
            }
            return $data;
        }else{
            return null;
        }
    }

    function getProductEvalues($idProduct){
        $sql_product_evaluate = "SELECT * FROM product_evaluate WHERE  id_product = $idProduct";
        $row = db_num_row($sql_product_evaluate);
        if($row > 0){
            $data_product_evaluate = db_fetch_row($sql_product_evaluate);
            $data = [];
            $sql_customer_evaluate = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_product_evaluate['id']}";
            $row_customer_evaluate = db_num_row($sql_customer_evaluate);
            $data['total_evaluate_star'] = $data_product_evaluate['total_evaluate'] / $row_customer_evaluate;
            $data['total_evaluate_customer'] = $row_customer_evaluate;
            return $data;
        }else{
            $data['total_evaluate_customer'] = 0;
            return $data;
        }
    }
?>