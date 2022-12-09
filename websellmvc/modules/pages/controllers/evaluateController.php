<?php 

    function construct(){
        load_model('evaluate');
    }

    function postEvaluateAction(){
        if(isset($_POST['submit'])){
            $errors = [];
            $id_product = $_POST['idProduct'];
            if(!isset($_POST['rate_star'])){
                $errors['rate_star'] = 'Bạn cần chọn mức độ đánh giá';
            }
            if($_POST['content'] == ''){
                $errors['content'] = 'Bạn cần nhập đánh giá';
            }
            if($_FILES['imageProduct']['name'][0] == ''){
                $errors['image'] = 'Bạn cần chọn ảnh của sản phẩm';
            }
            
            if($errors == null){
                $id_customer = getIdCustomer();
                $star = $_POST['rate_star'];
                $content = $_POST['content'];
                $image_tmp =$_FILES['imageProduct']['tmp_name'];
                $nameImageArray = $_FILES['imageProduct']['name'];

                $id_evaluate = '';
                if(check_val_star($id_product)){
                    $data_product_evl =  getDataProductEvaluate($id_product);
                    $id_evaluate =  $data_product_evl['id'];
                    $start = $data_product_evl['total_evaluate'];
                    $start += $star;
                    $data = [
                        'total_evaluate' => $start
                    ];
                    $where = "id = $id_evaluate";
                    $table = 'product_evaluate';
                    db_update($table, $data, $where);
                }else{
                    $data_star_product = [
                        'id_product' => $id_product,
                        'total_evaluate' => $star
                    ];
                    $table = 'product_evaluate';
                    $id_evaluate = db_insert($table, $data_star_product);
                }
                $data_customer_eval = [
                    'id_evaluate' => $id_evaluate,
                    'id_customer' => $id_customer,
                    'content' => $content,
                    'star' => $star,
                ];
                $table_customer_eval = 'customer_evaluate';
                $id_cus_evaluate = db_insert($table_customer_eval, $data_customer_eval);
                foreach($nameImageArray as $key => $img){
                    $nameImage = explode('.', $img);
                    $name_new = rand().'_'.$nameImage[0];
                    $imageNew = $name_new.'.'.$nameImage[1];
                    $data_img = [
                        'id_customer_evaluate' => $id_cus_evaluate, 
                        'name' => $imageNew,
                    ];
                    db_insert('image_evaluate', $data_img);
                    foreach ($image_tmp as $key_tmp => $tmp){
                        if($key == $key_tmp){
                            move_uploaded_file($tmp,"data/images/".$imageNew);
                        }
                    }
                }
                headerLocation("?ac=detail&idProduct=$id_product#header-location-comment");
            }else{
                $data = $errors;
                load_view('account/evaluate', $data);
            }

        }else{
            load_view('account/evaluate');
        }
    }


?>