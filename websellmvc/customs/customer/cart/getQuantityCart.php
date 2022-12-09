<?php 
require '../../config.php';

if(isset($_SESSION['cart'])){
    print_r($_SESSION['cart']['totalQty']);
}else{
    echo '0';
}

?>