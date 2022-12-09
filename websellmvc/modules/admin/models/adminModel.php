<?php 
    function getLogins($email, $password){
        $sql = "SELECT id FROM admins WHERE email = '$email' AND password = '$password'";
        $row = db_num_row($sql);
        return $row;
    }

    function getInfoLogin($email , $password){
        $sql = "SELECT id FROM admins WHERE email = '$email' AND password = '$password'";
        return db_fetch_row($sql);
    }

?>