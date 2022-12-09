<?php 

    function getDataAccount(){
        $id =  getIdCustomer();
        $sql = "SELECT * FROM customers WHERE id = $id";
        $data = db_fetch_row($sql);
        return $data;
    }

    function postDetailCustomer($data){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM customer_detail WHERE id_customer = $id_customer";
        $row = db_num_row($sql);
        $table = 'customer_detail';
        if($row > 0) {
            $where =  "id_customer = $id_customer"; 
            db_update($table, $data,$where);
        }else{
            db_insert($table, $data);
        }
    } 

    function dataAccDetail(){
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM customer_detail WHERE id_customer = $id_customer";
        $row = db_num_row($sql);
        $data = [];
        if($row){
            $result  = db_fetch_row($sql);
            $data['id'] = $result['id'];
            $data['id_customer'] = $result['id_customer'];
            $data['fullname'] = $result['fullname'];
            $data['phone'] = $result['phone'];
            $data['gender'] = $result['gender'];
            if($result['birthday'] != null) {
                $birthday = json_decode($result['birthday'], true);
                $data['day'] = $birthday['day'];
                $data['month'] = $birthday['month'];
                $data['year'] = $birthday['year'];
            }
        }
        return $data;
    }

    function postPhone($phone) {
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM customer_detail WHERE id_customer = $id_customer";
        $row = db_num_row($sql);
        $table = 'customer_detail';
        $data = [
            'id_customer' => $id_customer,
            'phone' => $phone
        ];
        if($row > 0) {
            $where =  "id_customer = $id_customer"; 
            db_update($table, $data, $where);
        }else{
            db_insert($table, $data);
        }
    }

    function getCheckPassword($password){
        $password_check = md5($password);
        $sql =  "SELECT * FROM customers WHERE password =  '$password_check'";
        $row = db_num_row($sql);
        return $row;
    }

    function changePassword($password){
        $table = 'customers';
        $data = [
            'password' => $password
        ];
        $id =  getIdCustomer();
        $where = "id = $id";
        db_update($table, $data, $where);
    }

    function getDataProvince(){
        $sql = "SELECT * FROM province";
        $data = db_fetch_array($sql);
        return $data;
    }

    function  getNameAddressSelect($provinceCity, $district, $wards){
        $sql_provin = "SELECT * FROM province WHERE id = $provinceCity";
        $sql_district = "SELECT * FROM district WHERE id = $district";
        $sql_ward = "SELECT * FROM ward WHERE id = $wards";

        $data_provin = db_fetch_row($sql_provin);
        $data_district = db_fetch_row($sql_district);
        $data_ward = db_fetch_row($sql_ward);

        $dataName['name_provin'] = $data_provin['_name'];
        $dataName['name_district'] = $data_district['_name'];
        $dataName['name_ward'] = $data_ward['_name'];
        return $dataName;
    }

    function getInsertAddress($data){
        $id = getIdCustomer();
        $sql_check_address =  "SELECT * FROM address WHERE id_customer = $id";
        $row_address = db_num_row($sql_check_address);
        $table = 'address';
        if($row_address == 0){
            $data['status'] = 'active';
            db_insert($table, $data);
        }elseif($row_address > 0 && $row_address < 3){
            db_insert($table, $data);
        }else{
            $sql_old = "SELECT * FROM `address` WHERE id_customer = $id AND status = 'no'";
            $data_old = db_fetch_array($sql_old);
            foreach($data_old as $old){
                $id_old = $old['id'];
            }
            $where = "id = $id_old";
            db_delete($table, $where);
            db_insert($table, $data);
        }
    }

    function getRowAddress($status) {
        $id_customer = getIdCustomer();
        $sql = "SELECT * FROM address WHERE id_customer = $id_customer AND status = '$status'";
        $row = db_num_row($sql);
        return $row;
    }



    function getDataAddress(){
        $id = getIdCustomer();
        $sql = "SELECT * FROM address WHERE id_customer = $id AND status = 'no'";
        $result = db_fetch_array($sql);
        foreach($result as $key => $row) {
            $data[$key]['id'] = $row['id'];
            $data[$key]['username'] = $row['username'];
            $data[$key]['address'] = $row['note_address'].', '.$row['wards'].', '.$row['district'].', '.$row['province_city'];
            $data[$key]['number_phone'] = $row['number_phone'];
            $data[$key]['status'] = $row['status'];
        }
       
        return $data;
    }

    function getdataAddressActive(){
        $id = getIdCustomer();
        $sql = "SELECT * FROM address WHERE id_customer = $id AND status = 'active'";
        $result = db_fetch_row($sql);
        $data_old['id'] = $result['id'];
        $data_old['username'] = $result['username'];
        $data_old['address'] = $result['note_address'].', '.$result['wards'].', '.$result['district'].', '.$result['province_city'];
        $data_old['number_phone'] = $result['number_phone'];
        $data_old['status'] = $result['status'];
        return $data_old;
    }
    
    
    function getDefaultAddress($id){
        $id_customer = getIdCustomer();
        $table = 'address';
        $data_action_old = [
            'status' => 'no'
        ];
        $where_action_old = "id_customer = $id_customer AND status = 'active'";
        db_update($table, $data_action_old, $where_action_old);
        $data_active_new = [
            'status' => 'active',
        ];
        $where = "id = $id";
        db_update($table, $data_active_new, $where);
        return true;
    }

    function getDeleteAddress($idDel){
        $table = 'address';
        $where = "id = $idDel";
        db_delete($table, $where);
    }

    
?>