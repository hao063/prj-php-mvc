<?php

    function construct(){
        load_model('account');
    }
    function indexAction(){
        $data['active_account'] = 'bg-gradient-primary';
        $data['dataAccount'] =  getDataAccount();
        load_view('account/index', $data);
    }

    function closeAccountAction(){
        $id = $_GET['id'];
        $table  = 'customers';
        $where = "id = $id";
        $data = [
            'token_login' => 'false',
        ];
        db_update($table, $data, $where);
        headerLocation('?mod=admin&contrl=account');
    }

    function openAccountAction(){
        $id = $_GET['id'];
        $table = 'customers';
        $where = "id = $id";
        $data = [
            'token_login' => 'true',
        ];
        db_update($table, $data, $where);
        headerLocation('?mod=admin&contrl=account');
    }

    


?>