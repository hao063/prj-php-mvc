<?php
    function construct(){
        load_model('category');
    }
    function getCategoryAction() {
        $idCategory = (int)$_GET['idCategory'];
        $row = getCategoryRow($idCategory);
        if($row > 0){
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $data['dataProduct'] = getDataProduct($idCategory, $page);
            $data['dataCategory'] = getDataCategory();
            load_view('category', $data);
        }else{
            headerLocation('?mod=errors&ac=error404');
        }
    }





?>