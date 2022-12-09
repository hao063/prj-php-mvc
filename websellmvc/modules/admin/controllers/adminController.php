<?php 

function construct(){
    load_model('admin');
}
function indexAction(){
    load_view('login/index');
}

function loginAction(){
    $errors = [];
    if(isset($_POST['btn-login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = !empty($_POST['rememberMe']) ? $_POST['rememberMe'] : 'off';
        if($email == ''){
            $errors['email'] = 'Email vẫn còn chống';
        }
        if($password == ''){
            $errors['password'] = 'Password vẫn còn chống';
        }
        if($errors == null){
            $password = md5($password);
            $row = getLogins($email, $password);
            if($row > 0){
                $result =  getInfoLogin($email , $password);
                if($rememberMe == 'on'){
                    setcookie("login_admin", $result['id'], time() + 86400, "/");
                }else{
                    $_SESSION['login_admin'] = $result['id'];
                }
                headerLocation('?mod=admin');
            }else{
                $errors['password'] = 'Tài khoản không chính sác';
            }
        }
        if($errors != null){
            load_view('login/index', $errors);
        }   
    }
}

function logoutAction() {
    if(isset($_SESSION['login_admin'])){
        unset($_SESSION['login_admin']);
    }
    if(isset($_COOKIE['login_admin'])){
        setcookie("login_admin", '', time() - 86400, "/");
    }
    headerLocation('?mod=admin');
}

?>