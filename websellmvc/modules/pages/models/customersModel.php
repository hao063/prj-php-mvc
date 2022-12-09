<?php 
    function getEmailRegister($email){
        $sql = "SELECT id FROM customers WHERE email = '$email'";
        return db_num_row($sql);
    }
    
    function insertAccountCustomer($table, $data){
        db_insert($table, $data);
    }

    function getLogin($query_string){
        return db_num_row($query_string);
    }

    function getArrayInfoAccount($query_string){
        return db_fetch_row($query_string);
    }

    function updateInfoAccount($table, $data, $where){
        db_update($table, $data, $where);
    }
?>