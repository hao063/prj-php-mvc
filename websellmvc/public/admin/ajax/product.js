$(document).ready(function() {
    getDataImageproduct();

    $(document).on('click', '.btn-del-image-product', function() {
        var idImage = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: `?mod=admin&contrl=product&ac=delete&idImage=${idImage}`,
            success: function(data){
                getDataImageproduct();
                $(".modal-remove-product").modal('hide');
                if(data == 1){
                    successAlert('Đã xóa ảnh của sản phẩm');
                }else{
                    dangerAlert();
                }
            }
        });
    });

    $("form#form-id-add-more-image").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
        $.ajax({
            url: '?mod=admin&contrl=product&ac=addImage',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                getDataImageproduct();
                if(data == 1){
                    $(".modal-add-more-image").modal('hide');
                    successAlert('Thêm ảnh thành công');
                    $('#validate-more-img').html('&ensp;');
                    $('#input-add-more-image').val('');
                }else if(data == 2){
                    $('#validate-more-img').html('Ảnh không hợp lệ');
                }else{
                    $('#validate-more-img').html('Ảnh không được để trống');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#form-detail-edit-data-product').validate( {
        rules: {
            idProduct: {
                required: true, 
            },
            name:{
                required: true, 
            },
            price:{
                required: true, 
            },
            total:{
                required: true, 
            }
        },
        messages: {
            name:{
                required: "Bạn chưa nhập Tên", 
            },
            price:{
                required: "Bạn chưa nhập Giá", 
            },
            total:{
                required: "Bạn chưa nhập tổng sản phẩm", 
            },
        },
        submitHandler: function(form){
            $.ajax({
                type: 'POST',
                url: '?mod=admin&contrl=product&ac=editProduct',
                data: $(form).serialize(),
                contentType: "application/x-www-form-urlencoded;charset=utf-8",
                dataType: 'json',
                success: function(data){
                    if(data == 1){
                        successAlert('Thêm sử sản phẩm thành công');
                        $('.modal-edit-detail-product').modal('hide');
                        setTimeout(function() { 
                            location.reload();
                        }, 2000)
                    }else{
                        dangerAlert();
                    }
                }
            });
        }
    });

    function getDataImageproduct(){
        var idProduct = getUrlParameter('idProduct');
        $.ajax({
            type: 'GET',
            url: `customs/admin/product/image.php?idProduct=${idProduct}`,
            success: function(data){
                $('.result-image-product-detail').html(data);
            }
        });
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