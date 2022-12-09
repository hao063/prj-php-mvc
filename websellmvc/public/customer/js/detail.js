$(document).ready(function() {
    $('.gimg_one').magnificPopup({
        type: 'image',
    }) 

    $('.children_gimg').click(function(e) {
        e.preventDefault();
        var childrenThis = $(this).children('a').attr('class');
        childrenThis = '.'+childrenThis;
        $(`${childrenThis}`).magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
            },
            zoom: {
                enabled: true, 
                duration: 300,
                easing: 'ease-in-out', 
                opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            },
        }) 
    })
    
    $('.item-img').click(function(e){
        e.preventDefault();
        var width = $('.images-show').innerWidth();
        var dataId = $(this).attr('data-id');
        var  widthSlider = (dataId - 1) * width;
        $('.images-show').css('transform',`translateX(-${widthSlider}px)`);
    });

    $('.slider-image-product-detail').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplaySpeed: 2000,
        prevArrow: '<button><i class="fas fa-angle-left prev_arrow"></i></button>',
        nextArrow: '<button><i class="fas fa-angle-right next_arrow"></i></button>'
    });

   

   
});

