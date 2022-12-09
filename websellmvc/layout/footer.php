        <!-- footer -->
        <footer>
            <div class="block1">
                <div class="support-customer">
                    <h4>Hỗ trợ khách hàng</h4>
                    <ul>
                        <li>Hotline: <span>0981-965-431</span></li>
                        <li>Các câu hỏi thường gặp</li>
                        <li>Gửi yêu cầu hỗ trợ</li>
                        <li>Hướng dẫn đặt hàng</li>
                        <li>Phường thức vẫn chuyển</li>
                        <li>Chính sách đổi trả</li>
                        <li>Hướng dẫn trả góp</li>
                        <li>Chính sách hàng nhập khẩu</li>
                        <li>Hỗ trợ khách hàng: phihao063@gmail.com</li>
                        <li>Báo lỗi bảo mật: vipha0603@gmail.com</li>
                    </ul>
                </div>
                <div class="from-hpro">
                    <h4>Về HPRO</h4>
                    <ul>
                        <li>Giới thiệu HPRO</li>
                        <li>Tuyển dụng</li>
                        <li>Chính sách bảo mật thanh toán</li>
                        <li>Chính sách bảo mật thông tin cá nhân</li>
                        <li>Chính sách giải quết khiếu nại</li>
                        <li>Điều khoản sử dụng</li>
                        <li>Giới thiệu HPRO Xu</li>
                        <li>TiếP thị liên kết cùng HPRO</li>
                    </ul>
                </div>
                <div class="cooperation-and-association">
                    <h4>Hợp tác và liên kết</h4>
                    <ul>
                        <li>Quy chế hoạt động Sản GDTMĐT</li>
                        <li>bán hàng cùng Tiki</li>
                    </ul>
                </div>
                <div class="payment-methods">
                    <h4>Phương thức thanh toán</h4>
                    <div>
                        No
                    </div>
                </div>
                <div class="connect-with-us">
                    <h4>Kết nối với chúng tôi</h4>
                    <div>
                        <i class="fab fa-facebook icon-connect"></i>
                        <i class="fab fa-youtube icon-connect"></i>
                        <i class="fab fa-twitter icon-connect"></i>
                    </div>
                </div>
            </div>
            <div class="block2">
                <ul>
                    <li>Địa chỉ văn phòng: 977 Phúc Diễn, Tây Mỗ, Từ Liêm, Hà Nội</li>
                    <li>HPRO nhận đặt hàng trực tuyến và giao hàng tận nơi, chưa hỗ trợ mua và nhận hàng trực tiếp tại văn phòng hoặc trung tâm xử lý đơn hàng</li>
                    <li>Giấy chứng nhận Đăng ký Kinh doanh số 0123456789 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 01/01/2022</li>
                    <li>© 2021 - Bản quyền của Công Ty Cổ Phần HPRO - hpro.vn</li>
                </ul>
            </div>
        </footer>

        <div id="backtop-infocart">
            <div id="backtop">
                <i class="fas fa-angle-up"></i>
            </div>
                
            <div id="infocart-scroll">
                <div class="cart-quantity"></div>
                <a href="?contrl=cart&ac=getCart">
                    <i class="fas fa-shopping-basket"></i>
                </a>
            </div>
        </div>
    </div>

    
    
    <?php
    get_modal('login-register');
    get_modal('comfirm-token');
    ?>


</body>

    <script>
        $(window).on("load",function(){
            $(".loader").fadeOut("slow");
            $('.input-number-prev-next').niceNumber();
            
        });
        function alertSlideShow(alertColor, alertText) {
            $('.alert').removeClass('hide');
            $('.alert').addClass('show');
            $('.alert').addClass('showAlert');
            $('.alert').addClass(alertColor);
            $('.close-btn').addClass(alertColor);
            setTimeout(function () {
                $('.alert').removeClass('show');
            $('.alert').addClass('hide');
            }, 2500);
            $('.msg').html(alertText);
            $('.close-btn').click(function () {
                $('.alert').removeClass('show');
                $('.alert').addClass('hide');
            });
        }
    </script>
    <script src="./public/customer/js/index.js"></script>
    <script src="./public/customer/js/home.js"></script>
    <script src="./public/customer/js/detail.js"></script>
    <script src="./public/customer/js/login-register.js"></script>
    <script src="./public/customer/js/notification.js"></script>

    <script src="./public/customer/ajax/customers.js"></script>
    <script src="./public/customer/ajax/index.js"></script>
    <script src="./public/customer/ajax/cart.js"></script>
    <script src="./public/customer/ajax/account.js"></script>
</html>