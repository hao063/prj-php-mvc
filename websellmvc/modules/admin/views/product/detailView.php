<?php get_header('admin') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin&contrl=category">Danh
                            mục</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin&contrl=product&idCategory=<?=$data['idCategory']?>">Sản
                            phẩm</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Chi tiết
                            sản phẩm</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-1">
            <div class="col-lg-12 col-md-12 mt-1 mb-4">
                <div class="mb-5 d-flex flex-row-reverse bd-highlight">
                    <button class="btn btn-secondary m-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Xóa sản phẩm</button>
                    <button class="btn btn-primary m-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalEditProduct">Sửa sản phẩm</button>
                </div>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Thông tin sản phẩm</h6>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 ">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Tên sản phẩm</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Thương hiệu</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Xuất xứ</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Giá</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Giả giám</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                                            Tổng số sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center text-sm h5">
                                            <?= base64_decode($data['result']['name']) ?>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= !empty($data['result']['trademark']) ? $data['result']['trademark'] : 'Không' ?>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= !empty($data['result']['origin']) ? $data['result']['origin'] : 'Không' ?>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= $data['result']['price']?>đ
                                        </td>
                                        <td class="text-center text-sm">
                                            <del><?= $data['result']['sale'] ?>đ</del>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= $data['result']['total']?> / <?= $data['result']['total'] - $data['result']['bought']?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h5">Ảnh của sản phẩm</div>
        <div class="mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModalAddImg">Thêm ảnh</button>
        </div>
        <div class="row mt-3 result-image-product-detail">
        </div>

        <div class="row mt-4">
            <div class="col-lg-12 col-md-12">
                <div class="h4">Mô tả sản phẩm</div>
                <div class="result " id="data-desctription-detail-product">
                <?=base64_decode($data['descriptionProduct']['description'])?>
                </div>
                <div class="mt-2 mb-5">
                    <p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Sửa mô tả
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form method="post" action="?mod=admin&contrl=product&ac=editorDesctription&idCategory=<?= $data['idCategory'] ?>&idProduct=<?=$data['result']['id']?>">
                                <input type="hidden" name="idDesctription" value="<?=$data['descriptionProduct']['id']?>">
                            <textarea class="ckeditor" name="editorDesctription" cols="80" rows="10"><?=base64_decode($data['descriptionProduct']['description'])?></textarea>
                                <div class="mt-2">
                                <button type="submit" class="btn btn-primary m-2 " name="btnSave">Lưu lại</button>
                                <button class="btn btn-secondary m-2" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


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

    <!-- Sửa sản phẩm -->
    <div class="modal fade modal-edit-detail-product" id="exampleModalEditProduct" tabindex="-1" aria-labelledby="exampleModalLabelEditProduct"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelEditProduct">Thêm ảnh cho sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="form-detail-edit-data-product">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Tên sản phẩm</label>
                                        <input type="hidden" name="idCategory" value="<?= $data['idCategory'] ?>">
                                        <input type="hidden" name="idProduct" value="<?= $data['result']['id'] ?>">
                                        <input type="text" name="name" class="form-control border border-1 border-dark p-2" value="<?= base64_decode($data['result']['name'])
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Thương hiệu <span style="font-size: 13px;">(nếu có)</span></label>
                                        <input type="text" name="trademark" class="form-control border border-1 border-dark p-2" value="<?= $data['result']['trademark'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Xuất xứ <span style="font-size: 13px;">(nếu có)</span></label>
                                        <input type="text" name="origin" class="form-control border border-1 border-dark p-2" value="<?= $data['result']['origin'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Giá <span style="font-size: 13px;">(vnđ)</span></label>
                                        <input type="number" class="form-control border border-1 border-dark p-2 " min="0"
                                            max="10000000" name="price" value="<?= $data['result']['price'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Giảm giá<span style="font-size: 13px;">(nếu có)</span></label>
                                        <input type="number" name="sale" class="form-control border border-1 border-dark p-2" value="<?= $data['result']['sale'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-4">
                                    <div class="group-input">
                                        <label class="col-form-label">Tổng sản phẩm</label>
                                        <input type="number" name="total" class="form-control border border-1 border-dark p-2" value="<?= $data['result']['total'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary" name="saveEditProduct">Thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Thêm ảnh -->
    <div class="modal fade modal-add-more-image" id="exampleModalAddImg" tabindex="-1" aria-labelledby="exampleModalLabelAddImg"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelAddImg">Thêm ảnh cho sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" id="form-id-add-more-image">
                    <div class="modal-body">
                        <div class="input-group mt-3">
                            <input type="hidden" name="idProduct" value="<?=  $data['result']['id'] ?>">
                            <input type="file" name="addMoreImage[]" class="rounded-2 bg-secondary text-white" id="input-add-more-image" multiple>
                        </div>
                        <p style="font-size:13px" class="text-danger" id="validate-more-img">&ensp;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm ảnh</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    <!-- Xóa sản phẩm -->
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
                    <a href="?mod=admin&contrl=product&ac=removeProduct&idProduct=<?=$data['result']['id']?>&idCategory=<?= $data['idCategory']?>" class="btn btn-primary btn-delete-product-detail">Xóa</a>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_SESSION['flashDes'])):?>
        <?php unset($_SESSION['flashDes']); ?>
        <script>
        $(document).ready(function() {
            successAlert('Thay đổi thành công');
        })
        </script>
    <?php endif; ?>
        
   
<?php get_footer('admin') ?>

