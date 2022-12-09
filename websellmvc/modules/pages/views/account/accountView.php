<?php get_header(); ?>
    <div id="content">
        <div class="contain-account">
           <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Thông tin tài khoản</div>
                <form action="?contrl=account&ac=postAccount" method="post">
                    <div class="form-account">
                        <div class="personal_information">
                            <div class="title">Thông tin cá nhân</div>
                            <div class="group-form">
                                <div class="group-input">
                                    <label for="account_username">Họ & Tên</label>
                                    <input type="text" name="fullname" id="account_username" placeholder="Thêm họ tên" value="<?= $data['dataAccDetail'] != null ? $data['dataAccDetail']['fullname'] : ''?>"> 
                                </div>
                                <div class="group-input">
                                    <label for="account_nickname">Nickname</label>
                                    <input type="text" name="nickname" id="account_nickname" placeholder="Thêm nickname"  value="<?= ucfirst($data['dataAccount']['username']) ?>"> 
                                </div>
                                <div class="group-select">
                                    <label for="">Ngày sinh</label>
                                    <div>
                                        <select name="day" id="">
                                            <option value="">Ngày</option>
                                            <?php for($i = 1; $i <= 31; $i++): ?>
                                            <option <?= $data['dataAccDetail'] != null ? isset($data['dataAccDetail']['day']) ? $data['dataAccDetail']['day'] == $i ? 'selected' : '' : '' : ''?>  value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <select name="month" id="">
                                            <option value="">Tháng</option>
                                            <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option <?= $data['dataAccDetail'] != null ? isset($data['dataAccDetail']['month']) ? $data['dataAccDetail']['month'] == $i ? 'selected' : '' : '' : ''?> value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <select name="year" id="">
                                            <option value="">Năm</option>
                                            <?php for($i = 1920; $i <= date("Y") - 18; $i++): ?>
                                            <option <?= $data['dataAccDetail'] != null ? isset($data['dataAccDetail']['year']) ? $data['dataAccDetail']['year'] == $i ? 'selected' : '' : '' : ''?> value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="group-checkradio">
                                    <label>Giới tính</label>
                                    <div>
                                        <input type="radio" name="gender" id="account_radio_men" value="1" <?=  $data['dataAccDetail'] != null ? $data['dataAccDetail']['gender'] == '1' ? 'checked' : '' : ''?> >
                                        <label for="account_radio_men">Nam</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" id="action_radio_woman" value="0" <?=  $data['dataAccDetail'] != null ? $data['dataAccDetail']['gender'] == '0' ? 'checked' : '' : ''?> >
                                        <label for="action_radio_woman">Nữ</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="gender" id="action_radio_different" value="2" <?=  $data['dataAccDetail'] != null ? $data['dataAccDetail']['gender'] == '2' ? 'checked' : '' : ''?> >
                                        <label for="action_radio_different">Khác</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="numberphone_email">
                            <div class="title">Số điện thoại và Email</div>
                            <div class="update_phone_email">
                                <div>
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <div>Số điện thoại</div>
                                    <div><?= $data['dataAccDetail'] != null ? $data['dataAccDetail']['phone'] : ''?></div>
                                </div>
                                <div>
                                    <a href="?contrl=account&ac=getPhone">Cập nhật</a>
                                </div>
                            </div>
                          
                            <div class="title change_password_css">Bảo mật</div>
                            <div class="update_phone_email">
                                <div>
                                    <i class="fas fa-lock class_lock"></i>
                                </div>
                                <div class="change_pass_title">
                                    Đổi mật khẩu
                                </div>
                                <div>
                                    <a href="?contrl=account&ac=getChangePassword">Thay đổi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-save-info-account">
                        <button>Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>


    <?php if(isset($_SESSION['flashPassSuccess'])):?>
        <?php unset($_SESSION['flashPassSuccess']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('success', 'Thay đổi mật khẩu thành công');
        })
        </script>
    <?php endif; ?>
<?php get_footer()?>
    