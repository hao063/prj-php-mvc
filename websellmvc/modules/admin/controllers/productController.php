<?php 

    function construct(){
        load_model('category');
        load_model('product');
    }
    function indexAction(){
    
        if(isset($_GET['idCategory'])){
            $idCategory = $_GET['idCategory'];
            $row = getRowCategory($idCategory); 
            $data = [];
            if($row > 0){
                $data['products'] = itemsProduct($idCategory);
                $data['idCategory'] = $idCategory;
                load_view("product/index", $data);
            }else{
                headerLocation('?mod=errors&ac=error404');
            }
        }else{
            headerLocation('?mod=errors&ac=error404');
        }
    }

    function getAddAction(){
        if(!empty($_GET['idCategory'])){
            $row = getRowCategory($_GET['idCategory']);
            if($row > 0){
                $data['idCategory'] = $_GET['idCategory'];
                load_view('product/add', $data);   
            }else{
                headerLocation('?mod=errors&ac=error404');

            }
        }else{
            headerLocation('?mod=errors&ac=error404');
        }
    }

    function postAddAction(){
        // base64_decode
        // base64_encode
        $data = [
            'errors' => [],
            'idCategory'
        ];
        if(!empty($_GET['idCategory'])){
            $idCategory = $_GET['idCategory'];
            $data['idCategory'] = $idCategory;
        }
        
        if(isset($_POST['btn-save-product'])){
            $idCategory =  $_GET['idCategory'];
            $rowCategory = getRowCategory($idCategory);
            
            if($rowCategory > 0){
                $name = $_POST['name'];
                $trademark = $_POST['trademark'];
                $origin = $_POST['origin'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $total = $_POST['total'];
                $description = $_POST['description'];
                $imageProduct = $_FILES['imageProduct']['name'];
                $oldImageProduct = $_POST['oldImageProduct'];
                $image_tmp = $_FILES['imageProduct']['tmp_name'];
                if($name == ''){
                    $data['errors']['name'] = 'Vui lòng nhập Tên sản phẩm';
                }
                if($price == ''){
                    $data['errors']['price'] = 'Vui lòng nhập Giá sản phẩm';
                }
                if($total == ''){
                    $data['errors']['total'] = 'Vui lòng nhập Tổng số sản phẩm';
                }
                if($sale != 0){
                    if($sale > $price){
                        $data['errors']['sale'] = 'Giá và Giảm giá đang chênh lệnh';
                    }
                }
                if($total == ''){
                    $data['errors']['total'] = 'Vui lòng nhập Tổng số sản phẩm';
                }
                if($imageProduct[0] == null){
                    if($oldImageProduct != ''){
                        $imageProduct = $oldImageProduct;
                    }else{
                        $data['errors']['imageProduct'] = 'Vui lòng thêm ảnh';
                    }
                }else{
                    $allowed =  array('jpeg','jpg', "png");
                    foreach($imageProduct as $image){
                        $imageArr =  explode('.', $image);
                        $imgType =  strtolower(end($imageArr));
                        if(!in_array($imgType,$allowed)){
                            $data['errors']['imageProduct'] = 'Ảnh không hợp lệ';
                        }   
                    }
                    $imagesSize = $_FILES['imageProduct']['size'];
                    foreach ($imagesSize as $size) {
                        if($size > 1000000){
                            $data['errors']['imageProduct'] = 'Dung lượng ảnh quá lớn';
                        }
                    }
                }
                if($description == ''){
                    $data['errors']['description'] = 'Vui lòng nhập Mô tả sản phẩm';
                }
             
                if($data['errors'] == null) {
                    // insert product
                    $table_product = 'products';
                    $data_product = [
                        'id_category' => $idCategory, 
                        'name' => base64_encode($name), 
                        'name_search' => $name, 
                        'price' => $price,
                        'sale' => $sale,
                        'total' => $total,
                        'trademark' => $trademark,
                        'origin' => $origin,
                    ];
                    
                    $id_new_product = insertProductMain($table_product, $data_product);
                    $table_img =  'images_product';
                    foreach ($imageProduct as $key => $img) {
                        $img_new  = rand().'_'.$img;
                        $img_exp = explode('.', $img_new);
                        $data_img = [
                            'id_product' => $id_new_product, 
                            'name_img' => $img_exp[0],
                            'type_img' => end($img_exp ),
                        ];
                        foreach ($image_tmp as $key_tmp => $tmp){
                            if($key == $key_tmp){
                                move_uploaded_file($tmp,"data/upload/".$img_new);
                            }
                        }
                        insertProduct($table_img, $data_img);
                    }
                    $table_description = 'description_product';
                    $data_description = [
                        'id_product' => $id_new_product, 
                        'description' => base64_encode($description)
                    ];
                    $check = insertProduct($table_description, $data_description);
                    if($check){
                        $_SESSION['flashDes'] = 'success';
                        headerLocation('?mod=admin&contrl=product&idCategory='.$idCategory);
                    }
                }else{
                    if($imageProduct[0] != null) {
                        $data['errors']['dataOldImage'] = $imageProduct;
                    }
                    load_view('product/add', $data);   
                }
            }else{
                headerLocation('?mod=errors&ac=error404');
            }
        }else{
            load_view('product/add',$data);   
        }

    }

    function getDetailAction(){
        if(!empty($_GET['idCategory']) && !empty($_GET['idProduct'])){
            $idCategory = $_GET['idCategory'];
            $idProduct = $_GET['idProduct'];
            $where =  "id = $idProduct AND id_category = $idCategory";
            $row = numRowProduct($where);
            if($row > 0){
                $data['idCategory'] = $idCategory;
                $result = getDetailProduct($idProduct);
                $data['result'] = $result;
                $imagesProduct = getImageProduct($idProduct);
                $data['imagesProduct'] = $imagesProduct;
                $getDescription = getDescription($idProduct);
                $data['descriptionProduct'] = $getDescription;
                load_view('product/detail', $data);
            }else{
                headerLocation('?mod=errors&ac=error404');
            }

        }else{
            headerLocation('?mod=errors&ac=error404');
        }
    }

    function deleteAction(){
        $row = rowDataImage($_GET['idImage']);
        $image = $row['name_img'].'.'.$row['type_img'];
        if(unlink("data/upload/$image")){
            $result = getDeleteImage($_GET['idImage']);
            echo 1;
        }
    }

    function addImageAction(){
        $result = 0;
        if(isset($_POST['idProduct'])){
            if($_FILES['addMoreImage']['name'] != ['']){
                $nameArr = $_FILES['addMoreImage']['name'];
                $tmpArr = $_FILES['addMoreImage']['tmp_name'];
                $imagesSize = $_FILES['addMoreImage']['size'];
                $idProduct =  $_POST['idProduct'];
                $table_img = 'images_product';
                
                $allowed =  array('jpeg','jpg', "png");
                $data_img = [];
                for ($i = 0; $i < count($nameArr); $i++){
                    $newName =  rand().'_'.$nameArr[$i];
                    $imageArr = explode('.', $newName);
                    $typeImage = end($imageArr);
                    if(!in_array($typeImage,$allowed)){
                        $result = 2;
                    } 
                    if($imagesSize[$i] > 500000){
                        $result = 2;
                    }
                    if($result != 2){
                        $data_img = [
                            'id_product' => $idProduct,
                            'name_img' => $imageArr[0],
                            'type_img' => $typeImage,
                        ];
                        $result = 1;
                        move_uploaded_file($tmpArr[$i],"data/upload/".$newName);
                        insertProduct($table_img, $data_img);
                    }
                }
            }
        }        
        echo json_encode($result);
    }

    function editProductAction(){
        $result = 0;
        if(isset($_POST['saveEditProduct'])){
            $idCategory = $_POST['idCategory'];
            $idProduct  = $_POST['idProduct'];
            $name  = $_POST['name'];
            $trademark  = $_POST['trademark'];
            $origin  = $_POST['origin'];
            $price  = $_POST['price'];
            $sale  = $_POST['sale'];
            $total  = $_POST['total'];
            $where = "id = $idProduct AND id_category = $idCategory";
            $row_product = numRowProduct($where);
            if($row_product > 0) {
                $table = 'products';
                $data = [
                    'id_category' => $idCategory,
                    'name' => base64_encode($name),
                    'name_search' => $name,
                    'trademark' => $trademark,
                    'origin' => $origin,
                    'price' => $price,
                    'sale' => $sale,
                    'total' => $total,
                ];
                $result = updateDataProduct($table, $data, $idProduct);
                $result = 1;
            }
        }
        echo json_encode($result);
    }

    function removeProductAction(){
        if(isset($_GET['idProduct']) && isset($_GET['idCategory'])){
            $idProduct = $_GET["idProduct"];
            $idCategory = $_GET["idCategory"];
            $where = "id = $idProduct AND id_category = $idCategory";
            $row = numRowProduct($where);
            if($row > 0){
                $arrayImage = arrayDataImage($idProduct);
                foreach($arrayImage as $rowImage){
                    $img  = $rowImage['name_img'].'.'.$rowImage['type_img'];
                    unlink("data/upload/$img");
                }
                deleteProduct($idProduct);
                headerLocation("?mod=admin&contrl=product&idCategory=$idCategory");
            }else{
                headerLocation('?mod=errors&ac=error404');
            }
        }else{
            headerLocation('?mod=errors&ac=error404');
        }
        
    }

    function editorDesctriptionAction(){
        if(isset($_POST['btnSave'])){
            $idProduct = $_GET["idProduct"];
            $idCategory = $_GET["idCategory"];
            $idDesctription = $_POST["idDesctription"];
            $where = "id = $idProduct AND id_category = $idCategory";
            $row = numRowProduct($where);
            if($row > 0){
                $description = $_POST['editorDesctription'];
                $data = [
                    'id_product' => $idProduct,
                    'description' => base64_encode($description)
                ];
                $table = 'description_product';
                updateDataProduct($table, $data, $idDesctription);

                $_SESSION['flashDes'] = 'success';
                headerLocation("?mod=admin&contrl=product&ac=getDetail&idCategory=$idCategory&idProduct=$idProduct#data-desctription-detail-product");
            }
        }
    }
?>