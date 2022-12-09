<?php get_header(); ?>

<div id="content">
    <h3>GIỎ HÀNG</h3>
    <div class="container-cart result-cart-and-check-out">
        
    </div>

</div>

<?php if(isset($_SESSION['flashCheckOut'])):?>
        <?php unset($_SESSION['flashCheckOut']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('danger', 'Bạn chưa thêm địa trỉ đặt hàng');
        })
        </script>
<?php endif; ?>

<?php if(isset($_SESSION['orderSucces'])):?>
        <?php unset($_SESSION['orderSucces']); ?>
        <script>
        $(document).ready(function() {
            alertSlideShow('success', 'Đặt hàng thành công');
        })
        </script>
<?php endif; ?>


<?php get_footer()?>
