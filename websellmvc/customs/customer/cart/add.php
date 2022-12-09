<?php 
require '../../config.php';


?>

<?php 
$idProduct = (int)$_POST["idProduct"];
$sql = "SELECT * FROM products WHERE id = $idProduct";
$row = db_num_row($sql);
if($row > 0){
    $item = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    construct_cart($item);
    $qty = (int)$_POST['qty-add-cart'] > 1 ? (int)$_POST['qty-add-cart'] : 1;
    addCart($idProduct , $qty);
    start_session_cart();
    echo true;
}else{
    echo false;
}

?>