<?php get_header('admin') ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Đơn
                            hàng</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Chi tiết
                            đơn hàng</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row mt-1">
            <div class="col-lg-12 col-md-12 mt-1 mb-4">
                <!-- main -->
                <h5><?= $data['dataDetail']['username'] ?></h5>
                <p><?= $data['dataDetail']['phone'] ?></p>
                <h6><?= $data['dataDetail']['company'] ?></h6>
                <p><?= $data['dataDetail']['address'] ?></p>
                <p>Địa điểm gia hàng: <?= $data['dataDetail']['type_address'] ?></p>
                <p>Số lượng: <?= $data['dataDetail']['total_product'] ?></p>
                <p>Tổng tiền: <?= number_format($data['dataDetail']['total_price'], 0, '', '.') ?>Đ</p>
                <div class="container-fluid">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Danh mục sản phẩm</h6>
                                    </div>
                                </div>
                                <div class="card-body px-0">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0 ">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                        ID sản phẩm</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tên sản phẩm</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Số lượng</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Giá</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Giảm giá</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data['dataDetail']['order_detail'] as $key => $item): ?>
                                                    <tr>
                                                        <td class="text-center text-sm">
                                                            <?=  $item['id_product'] ?>
                                                        </td>
                                                        <td>
                                                            <?= base64_decode($item['name']) ?>
                                                        </td>
                                                        <td class="text-center text-sm">
                                                            <?=  $item['total_quantity'] ?>
                                                        </td>
                                                        <td class="text-center text-sm">
                                                            <?= number_format($item['price'] - $item['sale'], 0, '', '.') ?> đ
                                                        </td>
                                                        <td class="text-center text-sm">
                                                            <del><?= number_format($item['price'], 0, '', '.') ?>đ</del>
                                                        </td>
                                                        <td class="text-center text-sm">
                                                            <?= number_format($item['total_price'], 0, '', '.') ?>đ
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
                </div>
                <div class="m-4" style="display: flex;">
                <?php if($data['dataDetail']['status'] == 0): ?>
                    <a href="?mod=admin&contrl=order&ac=confirmOrder&status=1&idOrder=<?= $data['dataDetail']['id'] ?>" class="m-1 btn btn-primary">Xác nhận giao hàng</a>
                    <a href="?mod=admin&contrl=order&ac=confirmOrder&status=4&idOrder=<?= $data['dataDetail']['id'] ?>" class="m-1 btn btn-secondary">Từ chối</a>
                <?php elseif($data['dataDetail']['status'] == 1): ?>                    
                    <a href="?mod=admin&contrl=order&ac=confirmOrder&status=2&idOrder=<?= $data['dataDetail']['id'] ?>" class="m-1 btn btn-primary">Xác nhận đơn hàng đã giao đến nơi</a>
                <?php elseif($data['dataDetail']['status'] == 2): ?>                    
                    <a href="?mod=admin&contrl=order&ac=confirmOrder&status=3&idOrder=<?= $data['dataDetail']['id'] ?>" class="m-1 btn btn-success">Xác nhận đã thanh toán</a>
                    <a href="?mod=admin&contrl=order&ac=confirmOrder&status=4&idOrder=<?= $data['dataDetail']['id'] ?>" class="m-1 btn btn-secondary">Hủy hàng</a>
                <?php endif; ?>
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
