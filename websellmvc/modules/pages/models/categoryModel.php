<?php

    function getCategoryRow($idCategory){
        $sql = "SELECT * FROM categorys WHERE id = $idCategory";
        $row =  db_num_row($sql);
        return $row;
    }
    
    function getDataProduct($idCategory, $page){
        $result = [];

        $sql_category = "SELECT * FROM categorys WHERE id = $idCategory";
        $data_category = db_fetch_row($sql_category);
        $result['id_category'] = $data_category['id'];
        $result['name_category'] = $data_category['name'];
        $limit = 6;
        $sql_total_product = "SELECT * FROM products WHERE id_category = $idCategory";
        $total_product = db_num_row($sql_total_product);
        $offset = ($page - 1) * $limit;
        $total_page = ceil($total_product / $limit);
        $total_page_main = 
        $result['data_page'] = $total_page;
        $sql = "SELECT * FROM products WHERE id_category = $idCategory  LIMIT $limit  OFFSET $offset";
        $data =  db_fetch_array($sql);

        $result['category'] = [];
        foreach($data as $key => $row) {
            $result['category'][$key]['id'] = $row['id'];
            $result['category'][$key]['name'] = base64_decode($row['name']);
            $result['category'][$key]['price'] = $row['price'];
            $result['category'][$key]['sale'] = $row['sale'];
            $result['category'][$key]['total'] = $row['total'];
            $result['category'][$key]['bought'] = $row['bought'];
            $sql_image =  "SELECT * FROM images_product WHERE id_product = {$row['id']}";
            $row_check_img = db_num_row($sql_image);
            if($row_check_img > 0){
                // default.jpg
                $data_iamge = db_fetch_row($sql_image);
                $result['category'][$key]['image'] =  $data_iamge['name_img'].'.'.$data_iamge['type_img'];
            }else{
                $result['category'][$key]['image'] = 'default.jpg';
            }
            
            $idProduct = $row['id'];
            $sql_product_evaluate = "SELECT * FROM product_evaluate WHERE  id_product = $idProduct";
            $row_product_evaluate = db_num_row($sql_product_evaluate);
            $result['category'][$key]['total_evaluate_star'] = 0;
            if($row_product_evaluate > 0){
                $data_product_evaluate = db_fetch_row($sql_product_evaluate);
                $sql_customer_evaluate = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_product_evaluate['id']}";
                $row_customer_evaluate = db_num_row($sql_customer_evaluate);
                $result['category'][$key]['total_evaluate_star'] = $data_product_evaluate['total_evaluate'] / $row_customer_evaluate;
            } 
        }
        return $result;
    }

    function getDataCategory(){
        $sql = "SELECT * FROM categorys LIMIT 6";
        $data = db_fetch_array($sql);
        return $data;
    }
?>