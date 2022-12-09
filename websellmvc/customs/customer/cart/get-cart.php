<?php 
require '../../config.php';

if(isset($_SESSION['cart'])){
    if($_SESSION['cart']['items'] == null){
        unset($_SESSION['cart']);
    }
}

$id = getIdCustomer();
if($id!==null){
    $sql = "SELECT * FROM  address WHERE id_customer = $id AND status = 'active'";
    $row = db_num_row($sql);
    if($row > 0) {
        $data_address = db_fetch_row($sql);
        $address =  $data_address['note_address'].', '.$data_address['wards'].', '.$data_address['district'].', '.$data_address['province_city'];
    }
}


?>

<?php if(getIdCustomer() != null): ?>

    <?php if(isset($_SESSION['cart'])):
    
        ?>

    <div class="container-item-cart">
        <div class="container-header-cart">
            <div>
                <label for="checkbox" class="label">Tất cả (<?= $_SESSION['cart']['totalQty'] ?>)</label>
            </div>
            <div>
                Đơn giá
            </div>
            <div>
                Số lượng
            </div>
            <div>
                Thành tiền
            </div>
            <div>
                <button type="button" class="btn-delete-all-item-cart" style="background:none;border:none;">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        </div>

        <div class="container-body-cart">
            <?php foreach ($_SESSION['cart']['items'] as $value): ?>
            <div class="item-product-cart">
            
                <div>
                    <div>
                        <img src="data/upload/<?= $value['image'] == '.' ? 'default.jpg' : $value['image'] ?>" alt="">
                    </div>
                </div>
                <div>
                    <a href="" style="color:#000">
                        <?= base64_decode($value['item']['name']) ?>
                    </a>
                </div>
                <div>
                    <span><?= number_format($value['item']['price'] -  $value['item']['sale'], 0, '', '.')?>đ</span>
                    <del><?= number_format($value['item']['price'], 0, '', '.')?>đ</del>
                </div>
                <div>
                
                    <div class="group-number-quantity">
                        <input type="number" name="qty-cart" value="<?= $value['qty']?>" id="" min="1" class="input-qty-number-item-cart"
                        max="<?= $value['item']['total'] - $value['item']['bought']?>" 
                        data-id="<?= $value['item']['id'] ?>"
                        >
                        <p style="font-size:12px;">
                            <?= ($value['item']['total'] - $value['item']['bought']) < 4 ? 'Còn 3 sản phẩm' : '' ?>
                        </p>
                    </div>
                </div>
                <div>
                    <?= number_format($value['price'], 0, '', '.') ?>đ    
                </div>
                <div>
                    <button style="border:none;background:none" type="button" class="btn-delete-item-cart" data-id="<?= $value['item']['id'] ?>">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="checkout-cart">
        <div class="change-address">
            <?php if(isset($data_address)): ?>
                <div>
                    <div>Giao tới</div>
                    <div><a href="?contrl=account&ac=getAddress">Thay đổi</a></div>
                </div>
                <div>
                    <span><?= $data_address['username'] ?></span>
                    <span>|</span>
                    <span><?= $data_address['number_phone'] ?></span>
                </div>
                <div>
                    <p><?= $address ?></p>
                </div>  
            <?php else: ?>
                <a href="?contrl=account&ac=getAddress" style="color: blue; font-size: 14px;">Bạn vẫn chưa có địa chỉ</a>
            <?php endif; ?>
        </div>

        <div class="total-order">
            <div>Tổng Tiền: </div>
            <div> <?= number_format($_SESSION['cart']['totalPrice'], 0, '', '.')?> đ</div>
        </div>
        <a href="?contrl=cart&ac=getCheckoutSubmit">
            <div class="btn-pay-order">
                <button>Mua Hàng (<?= $_SESSION['cart']['totalQty'] ?>)</button>                        
            </div>
        </a>
    </div>

    <?php else: ?>
        <div class="empty-get-cart">
            <div>
                <img src="./public/customer/images/mascot@2x.png" alt="">
            </div>
            <div>
                <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
            </div>
            <div>
                <a href="?mod=pages">Tiếp tục mua sắm</a>
            </div>
        </div>
    <?php endif; ?>

<?php else: ?>
    <div class="empty-get-cart">
        <div>
            <img src="./public/customer/images/mascot@2x.png" alt="">
        </div>
        <div>
            <p>Hãy đang nhập tải khoản của bạn.</p>
        </div>
    </div>
<?php endif; ?>