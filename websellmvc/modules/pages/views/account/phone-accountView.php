<?php get_header(); ?>
    <div id="content">
        <div class="contain-account">
            <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Cập nhật số điện thoại</div>
                <div class="container-number-phone">
                    <div class="form-change-numberphone">
                        <form action="?contrl=account&ac=postPhone" method="post">
                            <div class="label">Số điện thoại</div>
                            <div class="form-group">
                                <input type="number" name="phone" id="id_change_number_phone_account" value="">
                                <i class="fas fa-phone"></i>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION['flashNumber'])):?>
        <?php unset($_SESSION['flashNumber']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('danger', 'Số điện thoại không hợp lệ');
        })
        </script>
    <?php endif; ?>

<?php get_footer()?>
   