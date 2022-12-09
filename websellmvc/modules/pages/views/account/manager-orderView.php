<?php get_header(); ?>
    <div id="content">
        <div class="contain-account">
            <?php get_sidebar(); ?>
            <div class="selection-account">
                <div class="title">Đơn hàng của tôi</div>
                <div class="container-manager-order">
                    <div class="tabs-menu-header">
                        <div class="active" data="0">Tất cả đơn</div>
                        <div data="1">Đang xử lý</div>
                        <div data="2">Đang vận chuyển</div>
                        <div data="3">chờ thanh toán</div>
                        <div data="4">Đã giao</div>
                        <div data="5">Đã hủy</div>
                    </div>
                    <div class="tabs-menu-indicator"></div>
                    <div class="tabs-menu-body">
                        <div class="item-tab-menu-0 active item-result-data-order-1">
                             
                        </div>
                        <div class="item-tab-menu-1  item-result-data-order-2">
                            
                        </div>
                        <div class="item-tab-menu-2 item-result-data-order-3">
                               
                        </div>
                        <div class="item-tab-menu-3 item-result-data-order-4">
                             
                        </div>
                        <div class="item-tab-menu-4 item-result-data-order-5">
                           
                        </div>
                        <div class="item-tab-menu-5 item-result-data-order-6">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_SESSION['flashOrderComment'])):?>
        <?php unset($_SESSION['flashOrderComment']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('danger', 'Bạn đã đánh giá rồi');
        })
        </script>
    <?php endif; ?>
<?php get_footer()?>
 