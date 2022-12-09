
$(document).ready(function() {
    $('#backtop-infocart').fadeOut();
    $(window).scroll(function() {
        if($(this).scrollTop() > 1000){
            $('#backtop-infocart').fadeIn();
        }else{
            $('#backtop-infocart').fadeOut();
        }
    });

    $('#backtop').click(function(){
        $('html, body').animate({
            scrollTop:0
        },1200)
    })
    
    $('#input-search-header').click(function(e) {
        var valueInput = $('#input-search-header').val();
        if(valueInput){
            $('.model-writing-search').addClass('show');
        }else{
            $('.model-search').addClass('show');
        }
    });

    $(document).click(function(e) {
        if(e.target.id != 'input-search-header'){
            $('.model-search').removeClass('show');
            $('.model-writing-search').removeClass('show');
        }
    })
    
    $('#input-search-header').on('input',function(e){
        var valueInput = $('#input-search-header').val();
        if(valueInput){
            $('.model-search').removeClass('show');
            $('.model-writing-search').addClass('show');
        }else{
            $('.model-writing-search').removeClass('show');
            $('.model-search').addClass('show');
        }
    });

});