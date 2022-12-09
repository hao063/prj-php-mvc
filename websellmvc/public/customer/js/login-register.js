$(document).ready(function() {

    $(document).click(function(e){
        if(e.target.classList[0] == 'model-register-login'){
            $('.model-register-login').css('display', 'none');
        }
        if(e.target.classList[0] == 'model-comfirm-email'){
            $('.model-comfirm-email').css('display', 'none');
            window.history.back();
        }
    })
    
    

    // $('.submit-btn').click(function() {
    //     $('.model-register-login').css('display', 'none');
    //     $('.model-comfirm-email').css('display', 'block');
    // });

    $('.login-btn').click(function() {
        $('#login-custoner').css('left', '40px');
        $('#register-custoner').css('left', '400px');
        $('#btn-login-box').css('left', '0px')
        $('.login-btn').addClass('active-btn');
        $('.register-btn').removeClass('active-btn');
    });

    $('.register-btn').click(function() {
        $('#login-custoner').css('left', '-400px');
        $('#register-custoner').css('left', '40px');
        $('#btn-login-box').css('left', '110px')
        $('.login-btn').removeClass('active-btn');
        $('.register-btn').addClass('active-btn');
    });

    $.fn.showPassword = function (param) {
        $(this).click(function(){
            var elPassword = $(`${param}`);
            if(elPassword.prop('type') == 'password'){
                elPassword.attr('type', 'text');
                $(this).css('color', '#000');
            }else{
                elPassword.attr('type', 'password');
                $(this).css('color', '#ccc');
            }
        })
    };
    $('.eye-show-login').showPassword('.input-login-password');
    $('.eye-show-register').showPassword('.input-register-password');
    $('.eye-show-re-register').showPassword('.input-re-register-password');

});