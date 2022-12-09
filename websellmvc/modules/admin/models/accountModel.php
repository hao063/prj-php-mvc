<?php

    function getDataAccount(){
        $sql = "SELECT * FROM customers";
        return db_fetch_array($sql);
    }

?>