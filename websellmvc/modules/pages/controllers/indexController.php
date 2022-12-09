<?php 

    function construct(){
        load_model('home');
        load_model('detail');
    }
    function indexAction(){
        $data['dataProductSale'] = getDataSale();
        $data['dataProductTrend'] = getDataTrend();
        load_view('index', $data);
    }

    function detailAction(){
        $idProduct =  (int)$_GET["idProduct"];
        $where = "id = $idProduct";
        $row =  getNumRowProduct($where);
        if($row > 0){
            $data['dataDetail'] = getDataDetailIndex($idProduct);
            $data['dataSimilar'] = getDataSimilar($idProduct);
            $data['dataOverEvaluate'] = getDataOverEvaluate($idProduct);
            $data['productEvalues'] = getProductEvalues($idProduct);
            if(isset($_GET['search'])){
                insertDataHistorySearch($idProduct);
            }
            load_view('detail', $data);
        }else{
            headerLocation('?mod=errors&ac=error404Customer');
        }
    }

    function getResultAction(){
        $search = $_POST['input-search'];
        if($search == ''){
            headerLocation('?mod=pages');
        }else{
            $data['dataCategory'] = getCategory();
            $data['Search'] = getDataSearch($search);
            $data['inputSearch'] = $search;
            load_view('resultProduct', $data);
        }
       
    }
    

?>