<?php get_header(); 
?>

    <div id="content">
        <div class="contain-account">
        <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Tạo sổ địa chỉ</div>
                <div class="form-add-address">
                    <form action="?contrl=account&ac=postAddAddress" method="post">
                        <div class="group-input">
                            <label for="#" class="reponse-re">Họ và tên:</label>
                            <input type="text" name="username" id="" placeholder="Nhập họ tên" value="<?= isset($_POST["username"]) ? $_POST["username"] : ''?>">
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['username']) ? $data['errors']['username'] : ''?>&ensp;</p>
                        <div class="group-input">
                            <label for="#" class="reponse-re">Công ty: </label>
                            <input type="text" name="company" id="" placeholder="Nhập công ty (Có hoặc không)"  value="<?= isset($_POST["company"]) ? $_POST["company"] : ''?>">
                        </div>
                        <p class="validate-address">&ensp;</p>
                        <div class="group-input">
                            <label for="#" class="reponse-re">Số điện thoại:</label>
                            <input type="number" name="numberPhone" id="" placeholder="Nhập số điện thoại"  value="<?= isset($_POST["numberPhone"]) ? $_POST["numberPhone"] : ''?>">
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['phone']) ? $data['errors']['phone'] : ''?>&ensp;</p>
                        <div class="group-select">
                            <label for="#" class="reponse-re">Tỉnh/Thành Phố</label>
                            <select name="province-city" id="province_add_address">
                                <option value="">Chọn Tỉnh/Thành Phố</option>
                                <?php foreach ($data['dataProvince'] as $row): ?>
                                    <option <?= isset($_POST["province-city"]) ? $_POST["province-city"] == $row['id'] ? 'selected' : '' : ''?> value="<?= $row['id'] ?>"><?= $row['_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['provinceCity']) ? $data['errors']['provinceCity'] : ''?>&ensp;</p>

                        <div class="group-select">
                            <label for="#" class="reponse-re">Quận/Huyện</label>
                            <select name="district" id="district_add_address">
                                <option value="">Chọn Quận/Huyện</option>
                            </select>
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['district']) ? $data['errors']['district'] : ''?>&ensp;</p>

                        <div class="group-select">
                            <label for="#" class="reponse-re">Phường/Xã</label>
                            <select name="wards" id="wards_add_address">
                                <option value="">Chọn Phường/Xã</option>
                            </select>
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['wards']) ? $data['errors']['wards'] : ''?>&ensp;</p>

                        <div class="group-textbox">
                            <label for="#" class="reponse-re">Địa chỉ thường chú</label>
                            <textarea name="note-address" id=""><?=isset($_POST["note-address"]) ? $_POST['note-address'] : ''?></textarea>
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['noteAddress']) ? $data['errors']['noteAddress'] : ''?>&ensp;</p>

                        <div class="group-radio">
                            <label for="#"  class="reponse-re">Loại địa chỉ:</label>
                            <div>
                                <div><input type="radio" name="type_address" id="id_add_home_private_radio" value="1" <?= isset($_POST['type_address']) ? $_POST['type_address'] == 1 ? "checked" : '' : ''?>><label for="id_add_home_private_radio">Nhà riêng/Chung cư</label></div>
                                <div><input type="radio" name="type_address" id="id_add_company_radio" value="2" <?= isset($_POST['type_address']) ? $_POST['type_address'] == 2 ? "checked" : '' : ''?>><label for="id_add_company_radio">Cơ quan/Công ty</label></div>
                            </div>
                        </div>
                        <p class="validate-address"><?= !empty($data['errors']['type_address']) ? $data['errors']['type_address'] : ''?>&ensp;</p>

                        <p class="validate-address">&ensp;</p>
                        <div class="group-input">
                            <label for=""></label>
                            <button type="submit">Cập nhật</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION['flashAddressError'])):?>
        <?php unset($_SESSION['flashAddressError']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('danger', 'Lỗi thực hiện');
        })
        </script>
    <?php endif; ?>
<?php get_footer()?>
      