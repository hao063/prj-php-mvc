$(document).ready(function() {

    $('.single-item-rtl').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800,
        prevArrow: '<button><i class="fas fa-angle-left prev_arrow"></i></button>',
        nextArrow: '<button><i class="fas fa-angle-right next_arrow"></i></button>'
    });

    
    $('.single-sale-flast').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 800,
        prevArrow: '<button><i class="fas fa-angle-left prev_arrow"></i></button>',
        nextArrow: '<button><i class="fas fa-angle-right next_arrow"></i></button>'
    });

    
    $('.autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        prevArrow: '<button><i class="fas fa-angle-left prev_arrow"></i></button>',
        nextArrow: '<button><i class="fas fa-angle-right next_arrow"></i></button>'
    });
   
})




       