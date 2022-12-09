<?php 

    function construct(){
        load_model('account');
    }

    function getAccountAction() {
        $data['dataAccount'] = getDataAccount();
        $data['dataAccDetail'] = dataAccDetail();
        load_view('account/account', $data);
    }
    function postAccountAction() {
        $id_customer = getIdCustomer();
        $fullname = $_POST['fullname']; 
        $day = $_POST['day'] ;
        $month = $_POST['month'] ;
        $year = $_POST['year'] ;
        $birthday = '';
        if($day != null && $month != null && $year != null){
            $birthday = '{"day":"'.$day.'","month":"'.$month.'","year":"'.$year.'"}';
        }
        $gender = isset($_POST['gender']) ? $_POST['gender'] : NULL;
        $data = [
            'id_customer' => $id_customer,
            'fullname' => $fullname,
            'birthday' => $birthday,
            'gender' => $gender
        ];

        postDetailCustomer($data);
        headerLocation('?contrl=account&ac=getAccount');
    }

    function getPhoneAction(){
        load_view('account/phone-account');
    }

    function postPhoneAction() {
        $phone = $_POST['phone'];
        if(strlen($phone) == 10){
            postPhone($phone);
            headerLocation('?contrl=account&ac=getAccount');
        }else{
            $_SESSION['flashNumber'] = 'success';
            headerLocation('?contrl=account&ac=getPhone');
        }
    }

    function getChangePasswordAction(){
        load_view('account/change-password');
    }

    function postChangePasswordAction() { 
        $password_current = $_POST['password_current'];
        $row_check =  getCheckPassword($password_current);
        if($row_check > 0){
            $password_new = $_POST['password_new'];
            $re_password_new = $_POST['re_password_new'];
            if( $password_current != $password_new  && $password_new  == $re_password_new){
                changePassword(md5($password_new));
                $_SESSION['flashPassSuccess'] = 'success';
                headerLocation('?contrl=account&ac=getAccount');
            }else{
                $_SESSION['flashPassError'] = 'success';
                headerLocation('?contrl=account&ac=getChangePassword');
            }
        }else{
            $_SESSION['flashPassError'] = 'success';
            headerLocation('?contrl=account&ac=getChangePassword');
        }
    }

    function getInforimgToMeAction(){
        load_view('account/inforimg');
    }

    function getManagerOrderAction() {
        load_view('account/manager-order');
    }

    function getAddressAction() {
        $data = [];
        if(getRowAddress('active') > 0){
            $data['dataAddressActive'] =  getdataAddressActive();
        }
        if(getRowAddress('no') > 0) {
            $data['dataAddress'] = getDataAddress();
        }
        load_view('account/address', $data);
    }

    function getAddAddressAction(){
        $data['dataProvince'] = getDataProvince();
        load_view('account/add-address', $data);
    }

    function getProductLoveAction() {
        load_view('account/product-love');
    }

    function postAddAddressAction(){
        if(isset($_POST['username'])){
            $username =  $_POST['username'];
            $company =  $_POST['company'];
            $numberPhone =  $_POST['numberPhone'];
            $provinceCity =  $_POST['province-city'];
            $district =  $_POST['district'];
            $wards =  $_POST['wards'];
            $noteAddress =  $_POST['note-address'];
            $errors = [];
            if($username == ''){
                $errors['username'] = 'Không được để trống';
            }
            if($provinceCity == ''){
                $errors['provinceCity'] = 'Không được để trống';
            }
            if($district == ''){
                $errors['district'] = 'Không được để trống';
            }
            if($wards == ''){
                $errors['wards'] = 'Không được để trống';
            }
            if($noteAddress == ''){
                $errors['noteAddress'] = 'Không được để trống';
            }
            if($numberPhone == ''){
                $errors['phone'] = 'Không được để trống';
            }else{
                if(strlen($numberPhone) != 10){
                    $errors['phone'] = 'Số điện thoại không hợp lệ';
                }
            }
            if(!isset($_POST['type_address'])){
                $errors['type_address'] = 'Không được để trống';
            }else{
                $typeAddress =  $_POST['type_address'];
            }
            if($errors == null){
                $id_customer = getIdCustomer();
                $nameAddress = getNameAddressSelect($provinceCity, $district, $wards);
                $dataAddress = [
                    'id_customer' => $id_customer,
                    'username' => $username,
                    'company' => $company,
                    'number_phone' => $numberPhone,
                    'province_city' => $nameAddress['name_provin'],
                    'district' => $nameAddress['name_district'],
                    'wards' => $nameAddress['name_ward'],
                    'note_address' => $noteAddress,
                    'type_address' => $typeAddress,
                ];
                getInsertAddress($dataAddress);
                headerLocation('?contrl=account&ac=getAddress');
            }else{
                $data['dataProvince'] = getDataProvince();
                $data['errors'] = $errors;
                load_view('add-address', $data);
            }
        }else{
            headerLocation('?contrl=account&ac=getAddAddress');
        }
    } 
    
    function getDefaultAddressAction(){
        $id = $_GET['id'];
        getDefaultAddress($id);
        headerLocation('?contrl=account&ac=getAddress');
    }

    function getDeleteAddressAction(){
        $idDel = $_GET['idDel'];
        getDeleteAddress($idDel);
        headerLocation('?contrl=account&ac=getAddress');
    }

   
    

?>