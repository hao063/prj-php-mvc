<?php

    require '../../config.php';
    if(checkRowOrder(3)){
        $data['orderDelivered'] = OrderToMe(3);
    }

?>

<?php if(isset($data['orderDelivered'])): ?>
    <?php foreach($data['orderDelivered'] as $item): ?>
        <div class="container-item">
            <div class="item-header">
                <span class="all_order"><i class="fas fa-check-circle"></i> Giao hàng thành công</span><span>|</span><span>Đã đánh giá</span>
            </div>
            <div class="item-body">
                <?php foreach ($item['orderDetail'] as $item_detail): ?>
                    <a href="?contrl=order&ac=getEvaluate&idProduct=<?= $item_detail['id_product'] ?>">
                        <div class="item">
                            <div>
                                <img src="./data/upload/<?= $item_detail['image'] == '.' ? 'default.jpg' : $item_detail['image'] ?>" alt="">
                            </div>
                            <div>
                                <div><?= $item_detail['name_product'] ?></div>
                                <div>x<?= $item_detail['total_quantity'] ?></div>
                            </div>
                            <div>
                            <del>₫<?= number_format($item_detail['sale'], 0, '', '.')  ?></del><span><?= number_format($item_detail['total_price'], 0, '', '.') ?> ₫</span>

                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="item-footer">
                <div>
                    <div>
                    <span>Tổng tiền:  </span><span><?= number_format($item['total_price'], 0, '', '.') ?> ₫ </span>

                    </div>
                    <div>
                        <a class="delete-order" href="?contrl=order&ac=removeOrderCustomer&id=<?= $item['id'] ?>">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>  