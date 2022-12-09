<?php get_header('admin') ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin&contrl=category">Danh
                            mục</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin&contrl=product&idCategory=<?= $data['idCategory'] ?>">Sản phẩm</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Thêm sản phẩm</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <form action="?mod=admin&contrl=product&ac=postAdd&idCategory=<?= $data['idCategory'] ?>" method="post" enctype="multipart/form-data">
            <div class="row mt-1">
                <div class="h3">Thêm sản phẩm</div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-md-12 mt-1 mb-4">
                    <div class="group-input">
                        <label class="col-form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control border border-1 border-dark p-2 " value="<?= !empty($_POST['name']) ? $_POST['name'] : ''?>">
                        <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['name']) ? $data['errors']['name'] : ''?>&ensp;</p>
                    </div>
                    <div class="group-input">
                        <label class="col-form-label">Thương hiệu <span style="font-size: 13px;">(nếu có)</span></label>
                        <input type="text" name="trademark" class="form-control border border-1 border-dark p-2" value="<?= !empty($_POST['trademark']) ? $_POST['trademark'] : ''?>">
                        <p style="font-size:13px" class="text-danger">&ensp;</p>
                    </div>
                    <div class="group-input">
                        <label class="col-form-label">Xuất xứ <span style="font-size: 13px;">(nếu có)</span></label>
                        <input type="text" name="origin" class="form-control border border-1 border-dark p-2" value="<?= !empty($_POST['origin']) ? $_POST['origin'] : ''?>">
                        <p style="font-size:13px" class="text-danger">&ensp;</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-1 mb-4">
                    <div class="group-input">
                        <label class="col-form-label">Giá <span style="font-size: 13px;">(vnđ)</span></label>
                        <input type="number" name="price" class="form-control border border-1 border-dark p-2 " min="0" max="10000000"  value="<?= !empty($_POST['price']) ? $_POST['price'] : ''?>"> 
                        <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['price']) ? $data['errors']['price'] : ''?>&ensp;</p>
                    </div>
                    <div class="group-input">
                        <label class="col-form-label">Giảm giá <span style="font-size: 13px;">(nếu có)</span></label>
                        <input type="number" name="sale" class="form-control border border-1 border-dark p-2" value="<?= !empty($_POST['sale']) ? $_POST['sale'] : ''?>">
                        <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['sale']) ? $data['errors']['sale'] : ''?>&ensp;</p>
                    </div>
                    <div class="group-input">
                        <label class="col-form-label">Tổng sản phẩm</label>
                        <input type="number" name="total" class="form-control border border-1 border-dark p-2" value="<?= !empty($_POST['total']) ? $_POST['total'] : ''?>">
                        <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['total']) ? $data['errors']['total'] : ''?>&ensp;</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6 col-md-12">
                    <div>
                        <span class="h5">Thêm ảnh cho sản phẩm </span> <span style="font-size: 14px;">(nên thêm 4-10 chiếc)</span>
                    </div>
                    <div class="input-group mt-3">
                        <label for="imageAddProductId" class="custom-file-input">Chọn file</label>
                        <input type="file"  name="imageProduct[]" multiple style="display:none" id="imageAddProductId">  
                        <input type="hidden" name="oldImageProduct" value="<?php print_r(!empty($data['errors']['dataOldImage']) ? $data['errors']['dataOldImage'] : ''); ?>">
                    </div>
                    <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['imageProduct']) ? $data['errors']['imageProduct'] : ''?>&ensp;</p>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-lg-12 col-md-12">
                    <div clas="mb-1">
                        <span class="h5">Thêm mô tả sản phẩm </span> <span style="font-size: 14px;">(Sau khi ghi nội dung hãy nhấn vào nút <span class="text-danger">Mã HTML</span>)</span>
                    </div>
                    <div >
                        <textarea class="ckeditor " name="description" cols="80" rows="10">
                       <?= !empty($_POST['description']) ? $_POST['description'] : ''?>
                        </textarea>
                        <p style="font-size:13px" class="text-danger"><?=!empty($data['errors']['description']) ? $data['errors']['description'] : ''?>&ensp;</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="btn btn-primary btn-block" name="btn-save-product">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            Thuộc bản quyền
                            <a href="https://www.facebook.com/tamm.ekko/" class="font-weight-bold"
                                target="_blank">Nguyễn Hào</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc xóa sản phẩm này?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="text-danger">Lưu ý</span>: Sau khi xóa nhưng thông tin liên quan đến sản phẩm này cũng
                    sẽ biến mất theo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Thay đổi</button>
                </div>
            </div>
        </div>
    </div>
<?php get_footer('admin') ?>
