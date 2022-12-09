<?php 
require '../../config.php';
?>

<a href="?contrl=cart&ac=getCart">
    <div>
        <i class="fas fa-shopping-cart shoppingCart"></i>
        <?php if(getIdCustomer() != null): ?>
            <div class="quantity-cart">
                <div?><?= isset($_SESSION['cart']) ? $_SESSION['cart']['totalQty'] : 0; ?></div>
            </div>
        <?php endif; ?>
    </div>
    <div class="text-cart-header">
        Giỏ Hàng
    </div>
</a>
<?php if(isset($_SESSION['cart']) && getIdCustomer() != null): ?>
    <div class="model-info-cart">
            <div>
                <?php foreach ($_SESSION['cart']['items'] as $key => $value): ?>
                    <ul>
                        <li><img src="data/upload/<?=$value['image'] == '.' ? 'default.jpg' : $value['image']?>" alt=""></li>
                        <li><?= formatTextIndex(base64_decode($value['item']['name']), 7) ?></li>
                        <li><?= $value['qty'] ?>x</li>
                        <li><?=  number_format($value['price'], 0, '', '.') ?>₫</li>
                    </ul>
                <?php endforeach; ?>
            </div>
            <div>
                <a href="?contrl=cart&ac=getCart">
                    Xem giỏ hàng
                </a>
            </div>
    </div>
<?php endif; ?>
