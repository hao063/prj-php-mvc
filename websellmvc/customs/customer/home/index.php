<?php 
require '../../config.php';
$limit = 10;
if(!empty($_GET['page'])){
    $limit += (int)$_GET['page'];
}
$sql = "SELECT * FROM products LIMIT $limit";
$result = db_query($sql);
$sql_total = "SELECT * FROM products";
$total = db_num_row($sql_total);

?>
<?php if ($total > 0):?>
    <div class="result_pruducts">
        <?php foreach ($result as $row): ?>
            <?php
                $idProduct = $row['id'];    
                $imageProduct = 'default.jpg';
                $sql_img = "SELECT * FROM images_product WHERE id_product = $idProduct";
                $check_row_img = db_num_row($sql_img);
                if($check_row_img > 0){
                    $dataImage =  db_fetch_row($sql_img);
                    $imageProduct = $dataImage['name_img'].'.'.$dataImage['type_img'];
                }

                $sql_product_evaluate = "SELECT * FROM product_evaluate WHERE  id_product = $idProduct";
                $row_product_evaluate = db_num_row($sql_product_evaluate);
                $total_evaluate_star = 0;
                $total_evaluate_customer = 0;
                if($row_product_evaluate > 0){
                    $data_product_evaluate = db_fetch_row($sql_product_evaluate);
                    $sql_customer_evaluate = "SELECT * FROM customer_evaluate WHERE id_evaluate = {$data_product_evaluate['id']}";
                    $row_customer_evaluate = db_num_row($sql_customer_evaluate);
                    $total_evaluate_star = $data_product_evaluate['total_evaluate'] / $row_customer_evaluate;
                    $total_evaluate_customer = $row_customer_evaluate;
                }else{
                    $total_evaluate_customer = 0;
                }
            ?>
            <div class="item">
                <a href="?ac=detail&idProduct=<?=$row['id']?>">
                    <div>
                        <img src="./data/upload/<?=$imageProduct?>" alt="">
                    </div>
                    <div>
                        <p><?= formatTextIndex(base64_decode($row['name'])) ?></p>
                    </div>
                    <div>
                        <div class="container_evalution_star">
                            <?php if($total_evaluate_star != 0): ?>
                                <?php if($total_evaluate_star <= 1.3): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 1.9): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fas fa-star-half-alt checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 2.3): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 2.9): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fas fa-star-half-alt checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 3.3): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 3.9): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fas fa-star-half-alt checked"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 4.3): ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <?php elseif($total_evaluate_star <= 4.7): ?>
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
                        <div class="dau_ganh_hhu">|</div>
                        <div class="sold_product">
                            Đã bán <?= $row['bought'] > 100 ? '100+' : $row['bought'] ?>
                        </div>
                    </div>
                    <div class="price <?= $row['sale'] > 0 ? 'active' : ''?>">
                        <div>
                            <?php
                                if($row['sale'] > 0){
                                  echo  number_format($row['price'] - $row['sale'], 0, '', '.');
                                }else{
                                   echo number_format($row['price'], 0, '', '.');
                                }
                            ?>
                        </div>
                        <div>₫</div>
                        <?php if($row['sale'] != 0): ?>                        
                        <div>
                            <?= ceil(($row['sale'] / $row['price']) * 100)  ?> %
                        </div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="more-view-product-index">
        <button id="btn-more-view-product-index" data-id="<?= $limit++ ?>" 
        <?= $total < $limit ? 'disabled' : '' ?>
        >
        <?= $total < $limit ? 'Đã xem hết' : 'Xem thêm' ?></button>
    </div>
<?php endif;?>