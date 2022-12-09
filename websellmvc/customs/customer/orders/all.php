<?php
    require '../../config.php';
    if(checkRowOrder(0)){
        $data['orderProcessing'] = OrderToMe(0);
    }
    if(checkRowOrder(1)){
        $data['orderBeingTransported'] = OrderToMe(1);
    }
    if(checkRowOrder(2)){
        $data['orderPaymentMarket'] = OrderToMe(2);
    }
    if(checkRowOrder(3)){
        $data['orderDelivered'] = OrderToMe(3);
    }
    if(checkRowOrder(4)){
        $data['orderCancelled'] = OrderToMe(4);
    }

?>

<?php if(isset($data['orderProcessing'])): ?>
    <?php foreach($data['orderProcessing'] as $item): ?>
        <div class="container-item">
            <div class="item-header">
                <span class="awaiting_confirmation"> Đang chờ xác nhận...</span>
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
                        <a class="cancel-order" href="?contrl=order&ac=confimrOrder&status=4&id=<?= $item['id'] ?>">Hủy đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>   

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