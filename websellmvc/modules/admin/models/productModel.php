<?php
    function totalProducts($idCategory){
        $sql = "SELECT * FROM products WHERE id_category = $idCategory";
        return db_num_row($sql);
    }

    function itemsProduct($idCategory){
        $sql = "SELECT * FROM products WHERE id_category = $idCategory";
        return db_fetch_array($sql);
    }
    function insertProductMain($table, $data){
        return db_insert($table, $data);
    }
    function insertProduct($table, $data){
        db_insert($table, $data);
        return true;
    }

    function numRowProduct($where){
        $sql = "SELECT * FROM products WHERE $where";
        return db_num_row($sql);
    }

    function getDetailProduct($id){
        $sql = "SELECT * FROM products WHERE id = '$id'";
        return db_fetch_row($sql);
    }

    function getImageProduct($idProduct){
        $sql = "SELECT * FROM images_product WHERE id_product = '$idProduct'";
        return db_fetch_array($sql);
    } 
    
    function getDescription($idProduct){
        $sql = "SELECT * FROM description_product WHERE id_product = '$idProduct'";
        return db_fetch_row($sql);
    }

    function getDeleteImage($idImage){
        $table = 'images_product';
        $where = "id = $idImage";
        return db_delete($table, $where);
    }

    function rowDataImage($idImage){
        $sql = "SELECT * FROM images_product WHERE id = $idImage";
        return db_fetch_row($sql);
    }

    function arrayDataImage($idProduct){
        $sql =  "SELECT * FROM images_product WHERE id_product = $idProduct";
        return db_fetch_array($sql);
    }

    function updateDataProduct($table, $data, $idProduct){
        $where = "id = $idProduct";
        return db_update($table, $data, $where);
        //  true;
    }

    function deleteProduct($idProduct){
        $table = 'products';
        $where = "id = $idProduct";
        return db_delete($table, $where);
    }
    
?>