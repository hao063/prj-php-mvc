$(document).ready(function() {
    getCartHeader();
    getCartCheckOut();
    getQuantityCart();
    $("form#id-form-add-cart-item").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        $.ajax({
            url: './customs/customer/cart/add.php',
            type: 'POST',
            data: formData,
            success: function (data) {
                getCartHeader();
                getQuantityCart();
                if(data){
                    alertSlideShow('success', 'Đã thêm vào giỏ hàng');
                }else{
                    alertSlideShow('danger', 'Không thêm được vào giỏ hàng');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $(document).on('change', '.input-qty-number-item-cart', function (e) { 
        var valueNumber = $(this).val();
        var idProduct =  $(this).attr('data-id');
        $.ajax({
            url: `?contrl=cart&ac=changeQtyCart&valueNumber=${valueNumber}&idProduct=${idProduct}`,
            type: 'GET',
            success: function (data) {
                getCartHeader();
                getCartCheckOut();
            },
        });    
    });

    $(document).on('click', '.btn-delete-item-cart', function () {
        var idProduct =  $(this).attr('data-id');
        $.ajax({
            url: `?contrl=cart&ac=deteleCartItem&idProduct=${idProduct}`,
            type: 'GET',
            success: function (data) {
                getCartHeader();
                getCartCheckOut();
            },
        });  
    });

    $(document).on('click', '.btn-delete-all-item-cart', function () {
        var idProduct =  $(this).attr('data-id');
        $.ajax({
            url: `?contrl=cart&ac=deleteCart`,
            type: 'GET',
            success: function (data) {
                getCartHeader();
                getCartCheckOut();
                alertSlideShow('success', 'Đã xóa hết ');
            },
        });  
    });

    function getCartHeader(){
        $.ajax({
            url: './customs/customer/cart/cart-header.php',
            type: 'GET',
            success: function (data) {
                $('#result-model-info-cart-id').html(data);
            },
        });
    }

    function getCartCheckOut() {
        $.ajax({
            url: './customs/customer/cart/get-cart.php',
            type: 'GET',
            success: function (data) {
                $('.result-cart-and-check-out').html(data);
            },
        });
    }

    function getQuantityCart(){
        $.ajax({
            type: 'GET',
            url: `./customs/customer/cart/getQuantityCart.php`,
            success: function(data){
                $('.cart-quantity').html(data);
            }
        });
    }

    
});