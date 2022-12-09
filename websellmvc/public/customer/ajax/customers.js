$(document).ready(function() {

    $('.btn-action-login').click(function() {
        $.ajax({
            type: 'GET',
            url: '?contrl=customer&ac=modalLogin',
            dataType: 'json',
            success: function(data){
                if(data.case == 1){
                    $('.model-comfirm-email').css('display', 'block');
                }else{
                    $('.model-register-login').css('display', 'block');
                }
            }
        });
    });


    $("#login-custoner").validate({
        rules: {
            email: {
                required: true, 
                email: true
            },
            password:{
                required: true, 
            }
        },
        messages: {
            email: {
                required: "Bạn chưa nhập email", 
                email: "Bạn chưa nhập đúng định dạng"
            },
            password:{
                required: "Bạn chưa nhập password", 
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: 'POST',
                url: '?contrl=customer&ac=login',
                data: $(form).serialize(),
                contentType: "application/x-www-form-urlencoded;charset=utf-8",
                dataType: 'json',
                success: function(data){
                    if(!data.error){
                        if(data.case == 2){
                            $('.model-register-login').css('display', 'none');
                            alertSlideShow('success', 'Đăng nhập thành công');
                            setTimeout(function() { 
                                location.reload();
                            }, 2000)
                        }else if(data.case == 3){
                            $('.model-register-login').css('display', 'none');
                            alertSlideShow('danger', 'Tài khoản đã bị khóa!');
                            setTimeout(function() { 
                                location.reload();
                            }, 3000)
                        }else{
                            usernameText = data.username.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                return letter.toUpperCase();
                            });
                            $('.btn-action-login p').html('Tài khoản');   
                            usernameText = usernameText.length > 13 ?  usernameText.substring(0,13)+'...' : usernameText;
                            $('.btn-action-login span').html(usernameText);    
                            $('.model-register-login').css('display', 'none');
                            $('.model-comfirm-email').css('display', 'block');
                        }
                    }else{
                        $('.valid-login').html(data.messages);
                    }
                }
            });
        }
    });

    $("#register-custoner").validate({
        rules: {
            username: {
                required: true, 
                minlength: 3
            },
            email:{
                required: true, 
                email: true
            },
            password:{
                required: true, 
                minlength: 6
            },
            re_password:{
                required: true, 
                equalTo: "#register-password"
            }
        },
        messages: {
            username: {
                required: "Bạn chưa nhập Họ tên", 
                minlength: "Tên của bạn quá ngắn"
            },
            email: {
                required: "Bạn chưa nhập email", 
                email: "Email của bạn chưa đúng định dạng"
            },
            password: {
                required: "Bạn chưa nhập mật khẩu", 
                minlength: "Mật khẩu phải từ 6 kí tự trở lên"
            },
            re_password:{
                required: "Mật khẩu nhập lại vẫn còn trống", 
                equalTo: "Mật khẩu nhập lại không khớp"
            }
        },
        submitHandler: function(form){
            $('.valid-register').html('Vui lòng chờ...');
            $.ajax({
                type: 'POST',
                url: '?contrl=customer&ac=register',
                data: $(form).serialize(),
                contentType: "application/x-www-form-urlencoded;charset=utf-8",
                dataType: 'json',
                success: function(data){
                    if(!data.status){
                        $('.model-register-login').css('display', 'none');
                        alertSlideShow('success', 'Đăng kí thành công');
                        setTimeout(function() { 
                            location.reload();
                        }, 3000)
                    }else{
                        $('.valid-register').html(data.messages);
                    }
                }
            });
        }
    });

    $('.get-token-form-email').click(function(){
        $('.informing').html('Vui lòng chờ trong giây lát...');        
        $.ajax({
            type: 'GET',
            url: '?contrl=customer&ac=getTokenMailer',
            dataType: 'json',
            success: function(data){
                if(data == 1){
                    $('.informing').html('Mã xác nhận đã được gửi đến email của bạn.')       
                    setTimeout(function() { 
                    $('.informing').html('');       
                    }, 5000)              
                }
            }
        });
    });

    $("#id_confirm_email_token").validate({
        rules: {
            number_token_email: {
                required: true
            }
        },
        messages: {
            number_token_email: {
                required: "Bạn chưa nhập mã xác nhận", 
            }
        },
        submitHandler: function(form){
            $.ajax({
                type: 'POST',
                url: '?contrl=customer&ac=confimToken',
                data: $(form).serialize(),
                contentType: "application/x-www-form-urlencoded;charset=utf-8",
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data.status == 1){
                        $('.model-comfirm-email').css('display', 'none');
                        alertSlideShow('success', 'Xác nhận tài khoản thành công');
                        setTimeout(function() { 
                            location.reload();
                        }, 3000)
                    }else{
                        $('.informing').html('Mã xác nhận không đúng');        
                    }
                }
            });
        }
    });

    
})