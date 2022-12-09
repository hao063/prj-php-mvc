<?php get_header('admin') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                      chủ</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin&contrl=category">Danh
                      mục</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Sản phẩm</a></li>
                </ol>
            </div>
        </div>
      </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-1">
        <div class="col-lg-12 col-md-12 mt-1 mb-4">
          <div class="mb-5 d-flex flex-row-reverse bd-highlight">
              <a class="btn btn-primary"href="?mod=admin&contrl=product&ac=getAdd&idCategory=<?=$data['idCategory']?>">Thêm sản phẩm</a>
          </div>
            <!-- main -->
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Sản phẩm của danh mục Bút viết</h6>
                  </div>
                </div>
                <div class="card-body px-0">
                  <div class="table-responsive p-5">
                    <table class="table align-items-center mb-0 ">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center">STT</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tên sản phẩm</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Số lượng</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Giá</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Giảm giá</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $num = 1;
                        foreach ($data['products'] as $row): ?>
                            <tr>
                                <td class="text-center text-sm">
                                <?= $num++; ?>
                                </td>
                                <td class="text-sm font-weight-bolder">
                                        <?= strlen(base64_decode($row['name'])) > 30 ? substr(base64_decode($row['name']), 0, 30).'...' : base64_decode($row['name']) ?>
                                </td>
                                <td class="text-center text-sm">
                                    <?= $row['total'] - $row['bought'] > 0 ? $row['total'] - $row['bought'] : 'Hết hàng' ?>
                                </td>
                                <td class="text-center text-sm">
                                    <?= $row['price'] ?>
                                </td>
                                <td class="text-center text-sm">
                                    <?= $row['sale'] ?>
                                </td>
                                <td> 
                                    <div style="display: flex; justify-content: center;" class="btn-group">
                                        <a type="button" class="text-secondary dropdown-toggle-split " data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-equals"></i>
                                        </a>
                                        <ul class="dropdown-menu m-0">
                                        <li><a class="dropdown-item" href="?mod=admin&contrl=product&ac=getDetail&idCategory=<?=$data['idCategory']?>&idProduct=<?= $row['id'] ?>">Xem chi tiết</a></li>
                                        <li><button type="button" data-is="<?= $row['id'] ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalDelPro<?= $row['id'] ?>" >Xóa</button></li>
                                        </ul>
                                    </div>
                                    <div class="modal fade" id="exampleModalDelPro<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabelDelPro<?= $row['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelDelPro<?= $row['id'] ?>">Bạn có chắc xóa sản phẩm này?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <span class="text-danger">Lưu ý</span>: Những thông tin liên quan sẽ biến mất.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <a href="?mod=admin&contrl=product&ac=removeProduct&idProduct=<?= $row['id'] ?>&idCategory=<?=$data['idCategory']?>" class="btn btn-primary">Xóa</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
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
                <a href="https://www.facebook.com/tamm.ekko/" class="font-weight-bold" target="_blank">Nguyễn Hào</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
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
