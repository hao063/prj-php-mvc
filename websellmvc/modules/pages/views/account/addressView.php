<?php get_header(); ?>
    <div id="content">
        <div class="contain-account">
            <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Sổ địa chỉ</div>
                <a href="?contrl=account&ac=getAddAddress">
                    <div class="add-new-address">
                        <div>
                            <div><i class="fas fa-plus"></i></div>
                            <div>Thêm địa chỉ mới</div>
                        </div>
                    </div>
                </a>
                <div class="address-for-you">
                    <?php if(isset($data['dataAddressActive'])): ?>
                        <div class="item-add-for-you">
                                <div>
                                    <span><?=  $data['dataAddressActive']['username'] ?></span>
                                    <span><i class="far fa-check-circle"></i> Địa chỉ mặc định</span>
                                </div> 
                            
                            <div class="address-you">
                                <span>Địa chỉ:</span>
                                <span><?=  $data['dataAddressActive']['address'] ?></span>
                            </div>
                            <div class="address-you">
                                <span>Điên thoại</span>
                                <span><?=  $data['dataAddressActive']['number_phone'] ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($data['dataAddress'])): ?>
                        <?php foreach ($data['dataAddress'] as $row): ?>
                            <div class="item-add-for-you">
                                <div class="name-more">
                                    <span><?= $row['username'] ?></span>
                                    <span><a href="?contrl=account&ac=getDefaultAddress&id=<?= $row['id'] ?>">Đặt làm địa chỉ mặc định</a>
                                    <a href="?contrl=account&ac=getDeleteAddress&idDel=<?= $row['id'] ?>">Xóa</a></span>
                                </div>
                                <div class="address-you">
                                    <span>Địa chỉ:</span>
                                    <span><?= $row['address'] ?></span>
                                </div>
                                <div class="address-you">
                                    <span>Điên thoại</span>
                                    <span><?= $row['number_phone'] ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer()?>
  