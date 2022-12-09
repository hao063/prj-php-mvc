<?php get_header('admin') ?>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang chủ</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Danh mục</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-1">
        <div class="col-lg-12 col-md-12 mt-1 mb-4">
            <!-- main -->
            <div class="mb-5 d-flex flex-row-reverse bd-highlight">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">Thêm danh mục</button>
            </div>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Danh mục sản phẩm</h6>
                  </div>
                </div>
                <div class="card-body px-0">
                  <div class="table-responsive p-5">
                    <table class="table align-items-center mb-0 table-category">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">STT</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng sản phẩm</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                       
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
    <!-- Thêm category -->
    <div class="modal fade modal-add-category" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Thêm danh mục</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="form-add-category">
                <div class="modal-body">
                    <label class="col-sm-2 col-form-label mb-1">Tên</label>
                    <input type="text" class="form-control border border-1 border-primary p-2 input-add-category" name="name">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php get_footer('admin') ?>