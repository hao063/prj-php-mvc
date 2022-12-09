<?php 
require '../../config.php';
$idProduct =  $_GET['idProduct'];
$sql = "SELECT * FROM description_product WHERE id_product = '$idProduct'";

$result = db_fetch_row($sql);

echo base64_decode($result['description']);

?>



