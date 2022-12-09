<?php get_header() ?>
    <!-- content -->
    <div id="content">
        <div id="background_out_array"></div>
        <div class="slider-content">
            <div class="container-slider single-item-rtl">
                <div class="item-slider">
                    <img  src="./public/customer/images/760d728ee764e0cf7ad793a964f39ffc.png.webp" alt="">
                </div>
                <div class="item-slider">
                    <img src="./public/customer/images/318131170896bd57411dcfef47b96937.png.webp" alt="">
                </div>
            </div>
        </div>
        <?php if (count($data['dataProductSale']) > 6):?>
            <div class="discount_today">
                <div class="discount-title">
                    <div class="title">
                        Giá Sốc <i class="fas fa-bolt ligh_discount"></i> Hôm Nay
                    </div>
                    <div class="time_discount">
                        <span class="time-hour">01</span>
                        <span>:</span>
                        <span class="time-minute">12</span>
                        <span>:</span>
                        <span class="time-second">04</span>
                    </div>
                </div>
                <div class="result-discount  single-sale-flast">
                    <?php foreach($data['dataProductSale'] as $item): ?>
                        <a href="?ac=detail&idProduct=<?=$item['id']?>">
                            <div class="item-discount">
                                <img class="img_product" src="./data/upload/<?=$item['img']?>" alt="">
                                <div class="info-price">
                                    <div class="price">
                                        <?= number_format($item['sale'] > 0 ? $item['price'] - $item['sale'] : $item['price'], 0, '', ',');?>
                                    </div> 
                                    <div>₫</div>
                                    <div>
                                        <?= ceil(($item['sale'] / $item['price']) * 100)  ?> %
                                    </div>
                                </div>
                                <div class="container-bar">
                                    <div class="title">Đã bán <?= $item['bought'] ?></div>
                                    <img src="./public/customer/images/flast.png" alt="">
                                    <div class="bar-skill" style="width:
                                    <?= (100 - ceil(($item['bought'] / $item['total']) * 100)).'%' ?>
                                    ;"></div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="product_trend">
            <div><i class="fas fa-crown icon-crown"></i>Xu Hướng Mua Sắm</div>
            <div class="result_produc_trend autoplay">
                <?php foreach($data['dataProductTrend'] as $item): ?>
                    <div class="item_product">
                        <a href="?ac=detail&idProduct=<?=$item['id']?>">
                            <div class="title"><?= formatTextIndex(base64_decode($item['name'])) ?></div>
                            <div class="info-price">Giảm đến <?= ceil(($item['sale'] / $item['price']) * 100) ?>%</div>
                            <div class="container_img">
                                <?php foreach ($item['img'] as $itemImage):?>
                                    <div>
                                        <img src="./data/upload/<?=$itemImage?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="suggest_product">
            <div class="title_suggest">
                Gợi Ý Hôm Nay
            </div>
            <div class="container-result-product-today">
                
            </div>
        </div>
    </div>
<?php get_footer() ?>
