<?php

    require '../../config.php';
    if(checkRowOrder(4)){
        $data['orderCancelled'] = OrderToMe(4);
    }

?>

<?php if(isset($data['orderCancelled'])): ?>
    <?php foreach($data['orderCancelled'] as $item): ?>
        <div class="container-item">
            <div class="item-header">
                <span class="cencel-order"><i class="fas fa-ban"></i> Đơn hàng đã bị hủy</span>
            </div>
            <div class="item-body">
                <?php foreach ($item['orderDetail'] as $item_detail): ?>
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