<?php 

    function construct(){
        load_model('order');
    }

    function getEvaluateAction(){
        $data['idProduct'] = $_GET["idProduct"];
        if(check_comment($data['idProduct']) > 0){
            $_SESSION["flashOrderComment"] = "success";
            headerLocation('?contrl=account&ac=getManagerOrder');
        }else{
            load_view('account/evaluate', $data);
        }
    }


    function confimrOrderAction(){
        $status = $_GET['status'];
        $id = $_GET['id'];
        getModelConfirmOrder($status, $id);
        headerLocation('?contrl=account&ac=getManagerOrder');
    }

    function removeOrderCustomerAction(){
        $id = $_GET['id'];
        getRemoveOrderCustomer($id);
        headerLocation('?contrl=account&ac=getManagerOrder');
    }

?>