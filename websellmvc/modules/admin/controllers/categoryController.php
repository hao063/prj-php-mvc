<?php 
    function construct(){
        load_model('category');
    }
    function indexAction(){
        $data['active_category'] = 'bg-gradient-primary';
        load_view('category/index', $data);
    }
    function addAction(){
        $name  = $_POST['name'];
        $table = 'categorys';
        $data = [
            'name' => $name
        ];
        insertCategory($table, $data);
        print_r(json_encode(1));
    }

    function removeAction(){
        $id = $_GET['idCategory'];
        getRemoveItem($id);
        print_r(json_encode(1));
    }

    function editAction() {
        $idCategory =  $_POST['idCategory'];
        $nameCategory =  $_POST['nameCategory'];
        getUpdateItem($idCategory, $nameCategory);
        $resutl  = [];
        $resutl['status'] = 1;
        $resutl['name'] = $nameCategory;
        print_r(json_encode($resutl));
    }
?>