<?php 
    function construct(){
        load_model('detail');
    }
    
    function likeProductAction(){
        $idProduct = $_POST['idProduct'];
        $idCustomer = getIdCustomer();
        $data = [
            'id_product' => $idProduct,
            'id_customer' => $idCustomer,
        ];
        insertLikeCustomer($data);
        return true;
    }

    function removelikeProductAction(){
        $idProduct = $_GET['idProduct'];
        removeLike($idProduct);
        return true;
    }
 
    
?>