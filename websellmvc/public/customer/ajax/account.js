$(document).ready(function() {
    getDataAllOrder();
    getDataCancellOrder();
    getDataDeliveredOrder();
    getDataPaymentOrder();
    getDataProcessingOrder();
    getDataTránportedOrder();
    $('#province_add_address').change(function() {
        var id =  $(this).val();
        $.ajax({
            type: 'GET',
            url: `./customs/customer/address/district.php?id=${id}`,
            success: function(data){
                $('#district_add_address').html(data);
            }
        });
    });

    $(document).on('change', '#district_add_address', function() {
        var id =  $(this).val();
        $.ajax({
            type: 'GET',
            url: `./customs/customer/address/ward.php?id=${id}`,
            success: function(data){
                $('#wards_add_address').html(data);
            }
        });
    });

    $('.a-orderPaymentMarket').click(function () {

    });

    function getDataAllOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/all.php`,
            success: function(data){
                $('.item-result-data-order-1').html(data);
            }
        });
    }

    function getDataCancellOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/cancelled.php`,
            success: function(data){
                $('.item-result-data-order-6').html(data);
            }
        });
    }
    function getDataDeliveredOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/delivered.php`,
            success: function(data){
                $('.item-result-data-order-5').html(data);
            }
        });
    }
    function getDataPaymentOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/payment-market.php`,
            success: function(data){
                $('.item-result-data-order-4').html(data);
            }
        });
    }
    function getDataProcessingOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/processing.php`,
            success: function(data){
                $('.item-result-data-order-2').html(data);
            }
        });
    }

    function getDataTránportedOrder() {
        $.ajax({
            type: 'GET',
            url: `./customs/customer/orders/transported.php`,
            success: function(data){
                $('.item-result-data-order-3').html(data);
            }
        });
    }
});