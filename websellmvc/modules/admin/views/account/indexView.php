<?php get_header('admin') ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Tài khoản</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-1">
            <div class="col-lg-12 col-md-12 mt-1 mb-4">
                <!-- main -->
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Danh sách tài khoản</h6>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 ">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            STT</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tên Khác hàng</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $num = 1;
                                    foreach ($data['dataAccount'] as $item): ?>
                                    <tr>
                                        <td class="text-center text-sm">
                                            <?= $num++; ?>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= ucfirst($item['username']) ?>
                                        </td>
                                        <td class="text-center text-sm">
                                            <?= $item['email'] ?>
                                        </td>
                                        <?php if($item['token_login'] == 'true'): ?>
                                            <td class="text-center text-sm text-success">
                                                Active
                                            </td>
                                            <td class="text-center text-sm">
                                                <a href="?mod=admin&contrl=account&ac=closeAccount&id=<?= $item['id'] ?>">Đóng tài khoản</a>
                                            </td>
                                        <?php else: ?>
                                            <td class="text-center text-sm text-danger">
                                                false
                                            </td>
                                            <td class="text-center text-sm">
                                                <a href="?mod=admin&contrl=account&ac=openAccount&id=<?= $item['id'] ?>">Mở khoán tài khoản</a>
                                            </td>
                                        <?php endif; ?>
                                       
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
                            <a href="https://www.facebook.com/tamm.ekko/" class="font-weight-bold"
                                target="_blank">Nguyễn Hào</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?php get_footer('admin') ?>
   