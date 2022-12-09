<?php 
function construct(){
    load_model('index');
}
function indexAction(){
    $data = [];
    $data['active_admin'] = 'bg-gradient-primary';
    $data['dataInfoManager'] = getDataInfoManager();

    load_view('home', $data);
}


?>