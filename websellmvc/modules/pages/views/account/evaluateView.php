<?php get_header(); ?>
<div id="content">
    <div class="contain-account">
        <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Đánh giá sản phẩm</div>
                <div class="container-start-post">
                    <form action="?contrl=evaluate&ac=postEvaluate" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idProduct" value="<?= $data['idProduct']?>">
                        <div class="star-widget">
                            <input type="radio" name="rate_star" id="rate-5" value="5" >
                            <label for="rate-5" ><i class="fas fa-star"></i></label>
                            <input type="radio" name="rate_star" id="rate-4" value="4" >
                            <label for="rate-4" ><i class="fas fa-star"></i></label>
                            <input type="radio" name="rate_star" id="rate-3" value="3" >
                            <label for="rate-3" ><i class="fas fa-star"></i></label>
                            <input type="radio" name="rate_star" id="rate-2" value="2" >
                            <label for="rate-2" ><i class="fas fa-star"></i></label>
                            <input type="radio" name="rate_star" id="rate-1" value="1" >
                            <label for="rate-1" ><i class="fas fa-star"></i></label>
                        </div>
                        <p class="validate-star"><?= !empty($data['rate_star']) ? $data['rate_star'] : ''?>&ensp;</p>
                        <div class="conten">
                            <div class="textarea">
                                <textarea name="content"  cols="30"></textarea>
                                <p class="validate-star"><?= !empty($data['content']) ? $data['content'] : ''?>&ensp;</p>
                            </div>
                            <div class="img">
                                <input type="file" name="imageProduct[]" multiple >
                                <p class="validate-star"><?= !empty($data['image']) ? $data['image'] : ''?>&ensp;</p>
                            </div>
                            <div class="btn">
                                <button type="submit" name="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php get_footer()?>
