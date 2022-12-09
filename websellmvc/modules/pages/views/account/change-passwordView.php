<?php get_header(); ?>
    <div id="content">
        <div class="contain-account">
            <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Cập nhật số điện thoại</div>
                <div class="container-number-phone">
                    <div class="form-change-numberphone">
                        <form action="?contrl=account&ac=postChangePassword" method="post">
                            <div class="label">Nhập mật khẩu hiện tại</div>
                            <div class="form-group">
                                <input type="password" name="password_current" id="id_change_number_phone_account" value="">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="label">Nhập mật khẩu mới</div>
                            <div class="form-group">
                                <input type="password" name="password_new" id="id_change_number_phone_account" value="">
                                <i class="fas fa-key"></i>
                            </div>
                            <div class="label">Nhập lại mật khẩu mới</div>
                            <div class="form-group">
                                <input type="password" name="re_password_new" id="id_change_number_phone_account" value="">
                                <i class="fas fa-key"></i>
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

    <?php if(isset($_SESSION['flashPassError'])):?>
        <?php unset($_SESSION['flashPassError']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('danger', 'Lỗi thực hiện');
        })
        </script>
    <?php endif; ?>

<?php get_footer()?>
   