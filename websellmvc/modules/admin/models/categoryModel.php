<?php 

    function insertCategory($table, $data){
        db_insert($table, $data);
        return true;
    }


    function getRemoveItem($id){
        $table = 'categorys';
        $where = "id = $id";
        db_delete($table, $where);
    }
    

    function getUpdateItem($id, $name){
        $table = 'categorys';
        $data = [
            'name' => $name
        ];
        $where = "id = $id";
        db_update($table, $data, $where);
        return true;
    }

    function getRowCategory($id) {
        $sql = "SELECT * FROM categorys WHERE id = $id";
        return db_num_row($sql);

    }

?>