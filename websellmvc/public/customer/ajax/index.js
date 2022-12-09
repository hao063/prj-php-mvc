$(document).ready(function() {
    getDataProducIndex();
    getDataLikesProduct();
    function getDataProducIndex(page) {
        $.ajax({
            type: 'get',
            url: `./customs/customer/home/index.php?page=${page}`,
            success: function(data){
                $('.container-result-product-today').html(data);
            }
        });
    }
    $(document).on('click','#btn-more-view-product-index', function(){
        var moreValue = $(this).data('id');
        getDataProducIndex(moreValue);
    })

    function countDown() {
        var countDate = new Date("01 01 2050 00:00:00").getTime();
        var now = new Date().getTime();
        var gap = countDate  - now;
        var second = 1000;
        var minute = second  * 60;    
        var hour = minute * 60;     
        var day = hour * 24;   
        var textDay = Math.floor(gap / day);
        var textHour = Math.floor((gap % day) / hour);
        var textMinute = Math.floor((gap % hour) / minute);
        var textSecond = Math.floor((gap % minute) / second);
        textHour = textHour < 10 ? '0' + textHour : textHour; 
        $('.time-hour').html(textHour);
        $('.time-minute').html(textMinute);
        $('.time-second').html(textSecond);
    }
    setInterval(countDown, 1000)

    $('#input-search-header').keydown(function (e) { 
        var valueSearch = $(this).val();
        $.ajax({
            type: 'GET',
            url: `./customs/customer/home/search.php?search=${valueSearch}`,
            success: function(data){
                $('.result-writing').html(data);
            }
        });
    });

    $(document).on('click', '.love-product-action', function() {
        var idProduct = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '?contrl=detail&ac=likeProduct',
            data: {idProduct: idProduct},
            success: function(data){
                if(data){
                    getDataLikesProduct();
                }
            }
        });
    });

    $(document).on('click', '.remove-love-product-action', function() {
        var idProduct = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: `?contrl=detail&ac=removelikeProduct&idProduct=${idProduct}`,
            success: function(data){
                if(data){
                    getDataLikesProduct();
                }
            }
        });
    });

    function getDataLikesProduct(){
        var idProduct = getUrlParameter('idProduct');
        if(idProduct){
            $.ajax({
                type: 'GET',
                url: `./customs/customer/home/like.php?idProduct=${idProduct}`,
                success: function(data){
                    $('.action-like-product').html(data);
                }
            });
        }
    }


    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };
    

});