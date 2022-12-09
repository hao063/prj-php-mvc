<?php get_header(); ?>

<div id="content">
    <div class="taskbar-product">
        <a href="?mod=pages">Trang chủ </a>/ <a href="#">Sản phẩn chi tiết</a>
    </div>
    <div class="main-product">
        <div class="container-img-product">
            <div class="images-show">
                <?php foreach($data['dataDetail']['img'] as $img): ?>
                    <img src="./data/upload/<?=$img?>" alt="">
                <?php endforeach; ?>
            </div>
            <div class="images-slider-slick">
                <ul class="<?= count($data['dataDetail']['img']) > 3  ? 'slider-image-product-detail' : '' ?>">
                    <?php 
                        $num = 1;
                        foreach($data['dataDetail']['img'] as $img): 
                    ?>
                        <li>
                            <a class="item-img"  href="#" data-id="<?=$num++?>">
                                <img src="./data/upload/<?=$img?>" alt="">
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                </ul>
            </div>
            <div class="action-product-detail">
                <div>
                    <span>
                        <p>Chia sẻ:</p>
                    </span>
                    <span>
                        <i class="fab fa-facebook-messenger icon"></i>
                        <i class="fab fa-facebook-f icon"></i>
                        <i class="fab fa-pinterest-p icon"></i>
                    </span>
                </div>
                <div class="action-like-product">
                  
                </div>
            </div>
        </div>
        <div class="information-product-detail">
            <div class="infor-pay">
                <p>Đứng thứ 2 trong <a href="#">Top 100 sản phẩm Văn Phòng Phẩm</a></p>
            </div>
            <div class="info-name-product">
                <h3><?= base64_decode($data['dataDetail']['name']) ?></h3>
            </div>
            <div class="info-evaluate">
                <div class="container_evalution_star">
                    <?php if(isset($data['productEvalues']['total_evaluate_star'])): ?>
                        <?php if($data['dataOverEvaluate']['totalStar'] <= 1.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 1.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 2.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 2.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 3.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 3.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 4.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 4.7): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <?php else: ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <?php endif; ?>
                    <?php else: ?>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    <?php endif; ?>
                </div>

                <div>   
                    (Có <?= $data['productEvalues']['total_evaluate_customer'] ?> đanh giá) | Đã bán <?= $data['dataDetail']['bought'] ?>
                </div>

            </div>
            <div class="info-price">
                <div>
                <?= number_format($data['dataDetail']['sale'] > 0 ? $data['dataDetail']['price'] - $data['dataDetail']['sale'] : $data['dataDetail']['price'], 0, '', ',');?>₫</div>
                <?php if($data['dataDetail']['sale'] > 0): ?>
                <div> <del><?= number_format($data['dataDetail']['price'], 0, '', '.') ?> ₫</del> </div>
                <div>
                    <?= ceil(($data['dataDetail']['sale'] / $data['dataDetail']['price']) * 100) ?> %   
                </div>
                <?php endif; ?>
            </div>
            <form id="id-form-add-cart-item"  method="post">
                <div class="add-cart-quantity">
                    <div>Số lượng: </div>
                    <div class="group-number-quantity">
                        <input class="input-number-prev-next" type="number" name="qty-add-cart" value="1" id="" min="1" max="100">
                        <input type="hidden" name="idProduct" value="<?= $data['dataDetail']['id'] ?>">
                    </div>
                </div>
                <div class="add-cart-btn">
                    <?php if(getIdCustomer() != null): ?>
                        <button type="submit" class="btn-add-cart-product">Chọn mua</button>
                    <?php else: ?>
                        <p style="color:gray">Đăng nhập tài khoản để mua hàng</p>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <div class="similar_products">
        <div class="title_suggest">
            Sản Phẩm Tương Tự
        </div>

        <div class="result_pruducts">
            <?php foreach ($data['dataSimilar'] as $item):?>
            <div class="item">
                <a href="?ac=detail&idProduct=<?= $item['id'] ?>">
                    <div>
                        <img src="./data/upload/<?=$item['img']?>" alt="">
                    </div>
                    <div>
                        <p><?= formatTextIndex(base64_decode($item['name'])) ?></p>
                    </div>
                    <div>
                        <div class="container_evalution_star">
                            <?php if(isset($item['total_evaluate_star'])): ?>
                                <?php if($item['total_evaluate_star'] <= 1.3): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 1.9): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fas fa-star-half-alt checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 2.3): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 2.9): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fas fa-star-half-alt checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 3.3): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 3.9): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fas fa-star-half-alt checked"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 4.3): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                <?php elseif($item['total_evaluate_star'] <= 4.7): ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fas fa-star-half-alt checked"></span>
                                    <span class="fa fa-star"></span>
                                <?php else: ?>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            <?php endif; ?>
                        </div>
                        <div>|</div>
                        <div class="sold_product">
                            Đã bán <?= $item['bought'] > 100 ? '100+' : $item['bought'] ?>
                        </div>
                    </div>
                    <div class="price">
                        <div> 
                        <?= number_format($item['sale'] > 0 ? $item['price'] - $item['sale'] : $item['price'], 0, '', ',');?></div>
                        <div>₫</div>
                        <?php if($item['sale'] != 0): ?>                        
                            <div><?= ceil(($item['sale'] / $item['price']) * 100)  ?> %</div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="information-detail">
        <div class="title">
            Thông tin chi tiết
        </div>
        <div>
            <div>
                <div>Thương hiệu</div>
                <div>Xuất xứ</div>
            </div>
            <div>
                <div><?= $data['dataDetail']['trademark'] ?></div>
                <div><?= $data['dataDetail']['origin'] ?></div>
            </div>
        </div>
    </div>
    <div class="detailed-description">
        <div class="title">
        </div>
        <div class="result">
            <?= base64_decode($data['dataDetail']['description']) ?>
        </div>
    </div>
    <div class="reviews-from-customer">
        <?php if( $data['dataOverEvaluate'] != null ) :?>
        <div class="title">
            Đánh Giá - Nhận Xét Từ Khách Hàng
        </div>
        <div class="reviews-comment">
            <div class="star-reviews">
                <div class="param-star">
                    <div><?= $data['dataOverEvaluate']['totalStar'] ?></div>
                    <div>
                        <div>
                            <?php if($data['dataOverEvaluate']['totalStar'] <= 1.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 1.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 2.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 2.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 3.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 3.9): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 4.3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <?php elseif($data['dataOverEvaluate']['totalStar'] <= 4.7): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fas fa-star-half-alt checked"></span>
                            <span class="fa fa-star"></span>
                            <?php else: ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?= $data['dataOverEvaluate']['totalCustomerComment'] ?> nhận xét
                        </div>
                    </div>
                </div>
                <div class="quantity-star">
                    <div class="block">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div>
                            <div class="container-skil-bar">
                                <div class="blur"></div>
                                <div class="value-bar" style="width:<?= $data['dataOverEvaluate']['star-percent-5'] ?>%"></div>
                            </div>
                        </div>
                        <div>
                            <?= $data['dataOverEvaluate']['star-5'] ?>
                        </div>
                    </div>
                    <div class="block">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>
                            <div class="container-skil-bar">
                                <div class="blur" ></div>
                                <div class="value-bar" style="width:<?= $data['dataOverEvaluate']['star-percent-4'] ?>%"></div>
                            </div>
                        </div>
                        <div>
                        <?= $data['dataOverEvaluate']['star-4'] ?>
                        </div>
                    </div>
                    <div class="block">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>
                            <div class="container-skil-bar">
                                <div class="blur"></div>
                                <div class="value-bar" style="width:<?= $data['dataOverEvaluate']['star-percent-3'] ?>%"></div>
                            </div>
                        </div>
                        <div>
                        <?= $data['dataOverEvaluate']['star-3'] ?>
                        </div>
                    </div>
                    <div class="block">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>
                            <div class="container-skil-bar">
                                <div class="blur"></div>
                                <div class="value-bar" style="width:<?= $data['dataOverEvaluate']['star-percent-2'] ?>%"></div>
                            </div>
                        </div>
                        <div>
                        <?= $data['dataOverEvaluate']['star-2'] ?>
                        </div>
                    </div>
                    <div class="block">
                        <div>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div>
                            <div class="container-skil-bar">
                                <div class="blur"></div>
                                <div class="value-bar" style="width:<?= $data['dataOverEvaluate']['star-percent-1'] ?>%"></div>
                            </div>
                        </div>
                        <div>
                        <?= $data['dataOverEvaluate']['star-1'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-images-review">
                <div>
                    Tất cả hình ảnh (<?= $data['dataOverEvaluate']['total_imgae_eval'] ?>)
                </div>
                <div>
                    <div class="item-image">
                        <a href="./data/images/<?= $data['dataOverEvaluate']['data_img_total_put'][0]['name'] ?>" class="gimg_one">
                            <img src="./data/images/<?= $data['dataOverEvaluate']['data_img_total_put'][0]['name'] ?>" alt="">
                        </a>
                    </div>
                    <div class="item-image-blur-sum children_gimg">
                        <div><?= $data['dataOverEvaluate']['total_imgae_eval'] ?></div>
                        <?php foreach ($data['dataOverEvaluate']['data_img_total_put'] as $item):?>
                            <a href="./data/images/<?= $item['name'] ?>" class="gimg_all">
                                <img src="./data/images/<?= $item['name'] ?>"  alt="">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="result-comment-customer" id="header-location-comment">
            <?php foreach($data['dataOverEvaluate']['customer_comment'] as $key => $item): ?>
            <div>
                <div class="name-avatar-customer">
                    <div class="name-avatar">
                        <div class="avatar-customer">
                            <?=  $item['avata'] ?>
                        </div>
                        <div class="name-customer">
                            <?=  ucfirst($item['username']) ?>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <div class="star-review">
                        <div>
                            <?php if($item['star'] == 1 ): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span>Rất tệ</span>
                            <?php elseif($item['star'] == 2): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span>Không hài lòng</span>
                            <?php elseif($item['star'] == 3): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span>Bình thường</span>
                            <?php elseif($item['star'] == 4): ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span>Sản phẩm tốt</span>
                            <?php else: ?>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span>Cực kỳ hài lòng</span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <i class="far fa-check-circle"></i>
                            Đã mua hàng
                        </div>
                    </div>
                    <div class="result-text">
                        <?= $item['content'] ?>
                    </div>
                    <div class="resilt-view-images">
                        <div class="item-img">
                            <a href="./data/images/<?= $item['img'][0]['name'] ?>"" class="gimg_one">
                                <img src="./data/images/<?= $item['img'][0]['name'] ?>" alt="">
                            </a>
                        </div>
                        <div class="item-img-more children_gimg">
                            <div>+<?=count($item['img'])?></div>
                            <?php foreach($item['img'] as  $img): ?>
                            <a href="./data/images/<?=$img['name']?>" class="gimg_comment<?= $key ?>">
                                <img src="./data/images/<?=$img['name']?>" alt="">
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="time-comment">
                        01/06/2022
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="title">
           Không Có Đánh Giá Từ Khách Hàng
        </div>
        <?php endif; ?>
        
    </div>
</div>
<?php if(isset($_SESSION['flashCart'])):?>
        <?php unset($_SESSION['flashCart']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('success', 'Đã thêm vào giỏ hàng');
        })
        </script>
<?php endif; ?>




<?php get_footer()?>


