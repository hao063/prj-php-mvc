<?php

    require '../../config.php';
    if(checkRowOrder(1)){
        $data['orderBeingTransported'] = OrderToMe(1);
    }

?>

<?php if(isset($data['orderBeingTransported'])): ?>
    <?php foreach($data['orderBeingTransported'] as $item): ?>
        <div class="container-item">
            <div class="item-header">
                <span class="being_transported"><i class="fas fa-truck"></i> Đang vận chuyển...</span>
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
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
 