<?php

    require '../../config.php';
    if(checkRowOrder(2)){
        $data['orderPaymentMarket'] = OrderToMe(2);
    }

?>

<?php if(isset($data['orderPaymentMarket'])): ?>
    <?php foreach($data['orderPaymentMarket'] as $item): ?>
        <div class="container-item">
            <div class="item-header">
                <span class="awaiting_confirmation"> Đang chờ thanh toán...</span>
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
                        <a class="paid a-orderPaymentMarket" href="?contrl=order&ac=confimrOrder&status=3&id=<?= $item['id'] ?>">Đã thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?> 