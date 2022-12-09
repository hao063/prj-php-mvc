$(document).ready(function(){
    getDataCategorys();
    $("#form-add-category").validate({
        rules: {
            name: {
                required: true, 
            },
        },
        messages: {
            name: {
                required: "Bạn chưa nhập tên Danh Mục", 
            },
        },
        submitHandler: function(form){
            $.ajax({
                type: 'POST',
                url: '?mod=admin&contrl=category&ac=add',
                data: $(form).serialize(),
                contentType: "application/x-www-form-urlencoded;charset=utf-8",
                dataType: 'json',
                success: function(data){
                    getDataCategorys();
                    $(".modal-add-category").modal('hide');
                    $(".input-add-category").val('');
                    if(data == 1){
                        successAlert('Đã thêm thư mục');
                    }else{
                        dangerAlert();
                    }
                }
            });
        }
    });   
   

    $(document).on('click',".btn-edit-category", function(){
        var  idCategory = $(this).attr('data-id');
        var nameCategory = $(`.input-name-${idCategory}`).val();
        $.ajax({
            type: 'POST',
            url: `?mod=admin&contrl=category&ac=edit`,
            data: {idCategory:idCategory, nameCategory:nameCategory},
            dataType: 'json',
            success: function(data){
                getDataCategorys();
                $(".modal-edit-category").modal('hide');
                if(data.status == 1){
                    var nameCategoryNew = data.name;
                    successAlert(`Đã đã cập nhật Danh mục ${nameCategoryNew}`);
                }else{
                    dangerAlert();
                }
            }
        });
    });

    $(document).on('click', '.btn-remove-category', function(){
        var idCategory = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: `?mod=admin&contrl=category&ac=remove&idCategory=${idCategory}`,
            success: function(data){
                getDataCategorys();
                $(".modal-remove-category").modal('hide');
                if(data == 1){
                    successAlert('Đã xóa thư mục');
                }else{
                    dangerAlert();
                }
            }
        });
    });
    



    
    function getDataCategorys(){
        $.ajax({
            type: 'GET',
            url: 'customs/admin/category/index.php',
            success: function(data){
                $('.table-category tbody').html(data);
            }
        });
    }

})