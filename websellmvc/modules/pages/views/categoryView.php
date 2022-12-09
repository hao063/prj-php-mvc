<?php get_header(); ?>


        <div id="content">
            <div class="category-start-bar">
                <a href="?mod=pages">Trang chủ</a>  <i class="fas fa-angle-right"></i> <a href="#">Danh mục sản phẩm</a>
            </div>
            <div class="container-category">
                <div class="navbar-category">
                    <div class="name-category">
                        <div class="title">
                            DANH MỤC SẢN PHẨM
                        </div>
                        <div class="name">
                            <?php foreach($data['dataCategory'] as $item): ?>
                            <div class="item">
                                <a href="?contrl=category&ac=getCategory&idCategory=<?= $item['id'] ?>"><?= formatTextIndex($item['name']); ?></a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="review-category">
                        <div class="title">
                            ĐÁNH GIÁ 
                        </div>
                        <div class="name">
                            <div class="item">
                                <a href="#">
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <div>từ 5 sao</div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div>từ 4 sao</div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div>từ 3 sao</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="price-category">
                        <div class="title">
                             GIÁ 
                        </div>
                        <div class="name">
                            <div class="item">
                                <a href="#">
                                    Dưới 80.000
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                   Từ 80.000 đến 240.000
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                   trên 240.000
                                </a>
                            </div>
                        </div>
                        <div class="choose">
                            <form action="" method="post">
                                <div>
                                    Chọn khoảng giá
                                </div>
                                <div>
                                    <input type="number" name="" id=""> - <input type="number" name="" id="">
                                </div>
                                <div>
                                    <button>Áp dụng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-category">
                    <div class="title">
                        <?= $data['dataProduct']['name_category'] ?>
                    </div>
    
                    <div class="result_pruducts">
                        <?php foreach ($data['dataProduct']['category'] as $row): ?>
                        <div class="item">
                            <a href="?ac=detail&idProduct=<?= $row['id'] ?>">
                                <div>
                                    <img src="./data/upload/<?= $row['image'] ?>" alt="">
                                </div>
                                <div>
                                    <p><?= formatTextIndex($row['name']) ?></p>
                                </div>
                                <div>
                                    <div class="container_evalution_star">
                                    <?php if($row['total_evaluate_star'] != 0): ?>
                                        <?php if($row['total_evaluate_star'] <= 1.3): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 1.9): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fas fa-star-half-alt checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 2.3): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 2.9): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fas fa-star-half-alt checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 3.3): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 3.9): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fas fa-star-half-alt checked"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 4.3): ?>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                        <?php elseif($row['total_evaluate_star'] <= 4.7): ?>
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
                                        Đã bán <?= $row['bought'] > 100 ? '100+' : $row['bought'] ?>
                                    </div>
                                </div>
                                <div class="price">
                                    <div><?= number_format($row['price'] - $row['sale'], 0, '', '.'); ?></div>
                                    <div>₫</div>
                                    <div>
                                    <?= ceil(($row['sale'] / $row['price']) * 100)  ?> %
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if($data['dataProduct']['data_page'] > 1): ?>
                    <div class="container-pagination">
                        <div class="pagination">
                            <a href="#">«</a>
                                <?php for($i = 1 ; $i <= $data['dataProduct']['data_page'] ; $i++ ): ?>
                                    <a  class="
                                    <?= isset($_GET['page']) ? $_GET['page'] == $i ? 'active': '' : ($i == 1 ? 'active': '')?>
                                    " href="?contrl=category&ac=getCategory&idCategory=<?= $data['dataProduct']['id_category']?>&page=<?=$i?>"><?= $i ?></a>
                                <?php endfor; ?>
                            <a href="#">»</a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

<?php get_footer();?>
  