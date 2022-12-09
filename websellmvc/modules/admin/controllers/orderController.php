<?php 
    function construct(){
        load_model('order');
    }
    function indexAction(){
        $data['active_order'] = 'bg-gradient-primary';
        $data['dataOrderNew'] = getDataOrder('0');
        $data['dataOrderTranspor'] = getDataOrder('1');
        $data['dataOrderPayment'] = getDataOrder('2');
        $data['dataOrderSuccess'] = getDataOrder('3');
        $data['dataOrderCencel'] = getDataOrder('4');
        load_view('order/index', $data);
    }

    function detailAction(){
        $idOrder = $_GET['idOrder'];
        $status = $_GET['status'];
        $data['active_order'] = 'bg-gradient-primary';
        $data['dataDetail'] = getDataDetail($idOrder, $status);
        load_view('order/detail', $data);
    }

    function confirmOrderAction(){
        $idOrder = $_GET['idOrder'];
        $status = $_GET['status'];
        $table = 'orders';
        $data = [
            'status' => $status 
        ];
        $where = "id = $idOrder";
        db_update($table, $data, $where);
        headerLocation('?mod=admin&contrl=order');
    }

    function deleteOrderAdminAction(){
        $idOrder =  $_GET['id'];
        getDeleteAdminOrder($idOrder);
        headerLocation('?mod=admin&contrl=order');
    }
   

?>