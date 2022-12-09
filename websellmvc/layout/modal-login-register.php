<!-- login end register -->
<div class="model-register-login">
        <div class="form-box">
            <div class="button-box">
                <div id="btn-login-box"></div>
                <button type="button" class="toggle-btn login-btn">Đăng Nhập</button>
                <button type="button" class="toggle-btn register-btn">Đăng Ký</button>
            </div>
            <div class="social-icons">
                <div>
                    <a href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <div>
                    <a href="">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </div>
            </div>
            <form id="login-custoner" method="post" class="form-group"  >
                <div class="input-field">
                    <input  placeholder="Nhập email" type="text" name="email" >
                    
                </div>
                <div class="input-field-password">
                    <i class='fas fa-eye eye-show-login'></i>
                    <input  placeholder="Nhập mật khẩu" type="password" name="password" class="input-login-password" >
                </div>
                <div class="checkbox">
                    <input id="check-login-remember" name="remember_login" type="checkbox"> <label for="check-login-remember">Nhớ mật khẩu</label>
                </div>
                <div class="input-field">
                    <p style="font-size:17px; text-align:center;" class="validate valid-login">&ensp;</p>
                    <button type="submit" class="submit-btn">Đăng Nhập</button>
                </div>
                    
            </form>
            <form id="register-custoner" method="post" class="form-group"  >
                <div class="input-field">
                    <input placeholder="Nhập họ tên đầy đủ" type="text" name="username" >
                </div>
                <div class="input-field">
                    <input placeholder="Nhập email" type="text" name="email" >
                </div>
                <div class="input-field-password">
                    <i class='fas fa-eye eye-show-register'></i>
                    <input placeholder="Nhập mật khẩu" type="password" class="input-register-password" name="password" id="register-password" >
                </div>
                <div class="input-field-password">
                    <i class='fas fa-eye eye-show-re-register'></i>
                    <input placeholder="Xác nhận lại mật khẩu" type="password" class="input-re-register-password" name="re_password" >
                </div>
                <div class="input-field">
                    <p style="font-size:17px; text-align:center;" class="validate valid-register">&ensp;</p>
                    <button type="submit" class="submit-btn">Đăng Nhập</button>
                </div>

            </form>
        </div>
    </div>