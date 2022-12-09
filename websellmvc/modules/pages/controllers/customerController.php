<?php 
    function construct(){
        load_model('customers');
    }
    function modalLoginAction(){
        // trường hợp case = 0; -> web chưa được đăng nhập
        // trường hợp case = 1; -> web đã được đăng nhập như cần phải xác nhận token
        // trường hợp case = 2; -> web đăng nhập thành công
        // trường hợp case = 3; -> tài khoản của bạn đã bị khóa
        $return = [];
        if(isset($_SESSION['login_token_customer'])){
            $return['case'] = 1;
        }
        echo json_encode($return);
    }

    function loginAction(){
        $return = [
            'error' => false,
            'messages' => ''
        ];
        $email =  $_POST['email'];
        $password = $_POST['password'];
        $rememberLogin = !empty($_POST['remember_login']) ? $_POST['remember_login'] : 'off';

        if($email == ''){
            $return['error'] = true;
        }

        if($password == ''){
            $return['error'] = true;
        }

        if(!$return['error']){
            $password_md5 = md5($password);
            $query_string = "SELECT id,token_login,username FROM customers WHERE email = '$email' AND password = '$password_md5'";
            
            if(getLogin($query_string) > 0){    
                $resultInfoAcc = getArrayInfoAccount($query_string);
                $return['username'] = $resultInfoAcc['username'];
                if($resultInfoAcc['token_login'] == 'true'){
                    $return['case'] = 2;
                    if($rememberLogin == 'on'){
                        setcookie("login_customer", $resultInfoAcc['id'], time() + 86400, "/");
                    }else{
                        $_SESSION['login_customer'] = $resultInfoAcc['id'];
                    }
                }else{
                    if($resultInfoAcc['token_login'] == 'false'){
                        $return['case'] = 3;
                    }else{
                        $return['case'] = 1;
                        $arrResult = [];
                        if($rememberLogin == 'on'){
                            $arrResult['rememberLogin'] = 'on';
                        }else{
                            $arrResult['rememberLogin'] = 'off';
                        }
                        $arrResult['id'] =  $resultInfoAcc['id'];
                        $_SESSION['login_token_customer'] = $arrResult;
                    }
                }
            }else{
                $return['error'] = true;
                $return['messages'] = 'Sai tài khoản';
            }
        }
        print_r(json_encode($return));
    }
    function registerAction(){
        $errors = [
            'status' => false,
            'messages' => ''
        ];
        $username  = $_POST['username'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        if($username == ''){
            $errors['status'] = true;
        }
        if($email == ''){
            $errors['status'] = true;
        }else{
            $row = getEmailRegister($email);
            if($row > 0){
                $errors['status'] = true;
                $errors['messages'] = 'Email đã được sủ dụng';
            }else{
                $mail = new VerifyEmail();
                if(!$mail->check($email)){ 
                    $errors['status'] = true;
                    $errors['messages'] = 'Email không tồn tại';
                }
            }
        }
        if($password == ''){
            $errors['status'] = true;
        }else{
            if($re_password == ''){
                $errors['status'] = true;
            }else{
                if($re_password != $password){
                    $errors['status'] = true;
                }
            }
        }
        if(!$errors['status']){
            $table = 'customers'; 
            $token = rand(10000,99999);
            $password_md5 = md5($password); 
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password_md5, 
                'token_login' => $token,
            ];
            insertAccountCustomer($table, $data);
        }
        print_r(json_encode($errors));
    }

    function logoutAction() {
        if(isset($_SESSION['login_customer'])){
            unset($_SESSION['login_customer']);
        }
        if(isset($_COOKIE['login_customer'])){
            setcookie("login_customer", '', time() - 86400, "/");
        }
        if(isset($_SESSION['login_token_customer'])){
            unset($_SESSION['login_token_customer']);
        }      
        headerLocation('index.php');
    }
    
    function getTokenMailerAction() {
        $mailer = new Mailer();
        $id_customer  = $_SESSION['login_token_customer']['id'];
        $sql =  "SELECT username,email,token_login FROM customers WHERE id = $id_customer";        
        $arrayCustomer = getArrayInfoAccount($sql);
        $mailer->confirmEmail($arrayCustomer['email'], $arrayCustomer['token_login'], $arrayCustomer['username']);
        echo json_encode(1);
    }

    function confimTokenAction(){
        $token = $_POST['number_token_email'];
        $id_customer = $_SESSION['login_token_customer']['id'];
        $sql =  "SELECT id FROM customers WHERE id = $id_customer AND token_login = $token";        
        $row =  getLogin($sql);
        $return  = [];
        if($row > 0){
            $return['status'] = 1;
            $table = 'customers';
            $data = [
                'token_login' => 'true'
            ];
            $where = "id = $id_customer";
            updateInfoAccount($table, $data, $where);
            if($_SESSION['login_token_customer']['rememberLogin'] == 'on'){
                setcookie("login_customer", $id_customer, time() + 86400, "/");
                $return['login'] = true;
            }else{
                $_SESSION['login_customer'] = $id_customer;
                $return['login'] = true;
            }
            if(isset($return['login'])){
                unset($_SESSION['login_token_customer']);
            }
        }else{
            $return['status'] = 0;
        }
        print_r(json_encode($return));        
    }
?>