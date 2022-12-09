<?php 
require '../../config.php';
$idProduct = $_GET['idProduct'];
$idCustomer = getIdCustomer();
$like = "SELECT * FROM `like_product` WHERE id_product = $idProduct";
$number_like = db_num_row($like);

if($idCustomer != null) {
    $sql_check_like = "SELECT * FROM `like_product` WHERE id_product = $idProduct AND id_customer = $idCustomer";
    $check_like_customer = db_num_row($sql_check_like);
}

?>

<!--
    đã tim: fas 
    chưa tim: far
-->
<?php if($idCustomer != null): ?>
    <?php if($check_like_customer > 0): ?>
        <i class="fas fa-heart icon-like remove-love-product-action" data-id="<?= $idProduct ?>"></i> 
        <p>Đã thích (<?= $number_like ?>)</p>
    <?php else: ?>
        <i class="far fa-heart icon-like love-product-action" data-id="<?= $idProduct ?>"></i> 
        <p>Đã thích (<?= $number_like ?>)</p>
    <?php endif; ?>
<?php endif; ?>