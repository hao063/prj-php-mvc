<?php get_header('admin') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12 col-md-12 mb-4">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="?mod=admin">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="#">Đơn hàng</a></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-log-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-new-tab" data-bs-toggle="tab" data-bs-target="#nav-order-new" type="button" role="tab" aria-controls="nav-new" aria-selected="true">Đơn hàng mới</button>
                        <button class="nav-link" id="nav-transported-tab" data-bs-toggle="tab" data-bs-target="#nav-order-transported" type="button" role="tab" aria-controls="nav-transported" aria-selected="false">Đang vận chuyển</button>
                        <button class="nav-link" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-order-payment" type="button" role="tab" aria-controls="nav-payment" aria-selected="false">Chờ thanh toán</button>
                        <button class="nav-link" id="nav-success-tab" data-bs-toggle="tab" data-bs-target="#nav-order-success" type="button" role="tab" aria-controls="nav-success" aria-selected="false">Thanh toán thành công</button>
                        <button class="nav-link" id="nav-cancel-tab" data-bs-toggle="tab" data-bs-target="#nav-order-cencel" type="button" role="tab" aria-controls="nav-cencel" aria-selected="false">Đơn hàng đã hủy</button>
                    </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-order-new" role="tabpanel" aria-labelledby="nav-new-tab">
                        <div class="container-fluid">
                            <?php foreach($data['dataOrderNew'] as $item): ?>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <?= $item['username'] ?>
                                </div>
                                <div class="col-md-2">
                                    Số lượng: <?= $item['total_product'] ?>
                                </div>
                                <div class="col-md-3">
                                    Tổng tiền: <?= number_format($item['total_price'], 0, '', '.') ?> đ
                                </div>
                                <div class="col-md-2">
                                    <a href="?mod=admin&contrl=order&ac=detail&status=0&idOrder=<?= $item['id'] ?>" class="text-succes" >
                                        Xem tri tiết
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <?= $item['time_order'] ?>
                                </div>
                            </div>
                           <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-order-transported" role="tabpanel" aria-labelledby="nav-transported-tab">
                        <div class="container-fluid">
                            <?php foreach($data['dataOrderTranspor'] as $item): ?>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <?= $item['username'] ?>
                                </div>
                                <div class="col-md-2">
                                    Số lượng: <?= $item['total_product'] ?>
                                </div>
                                <div class="col-md-3">
                                    Tổng tiền: <?= number_format($item['total_price'], 0, '', '.') ?> đ
                                </div>
                                <div class="col-md-2">
                                    <a href="?mod=admin&contrl=order&ac=detail&status=1&idOrder=<?= $item['id'] ?>" class="text-succes" >
                                        Xem tri tiết
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <?= $item['time_order'] ?>
                                </div>
                            </div>
                           <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-order-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                        <div class="container-fluid">
                                <?php foreach($data['dataOrderPayment'] as $item): ?>
                                <div class="row mt-5">
                                    <div class="col-md-3">
                                        <?= $item['username'] ?>
                                    </div>
                                    <div class="col-md-2">
                                        Số lượng: <?= $item['total_product'] ?>
                                    </div>
                                    <div class="col-md-3">
                                        Tổng tiền: <?= number_format($item['total_price'], 0, '', '.') ?> đ
                                    </div>
                                    <div class="col-md-2">
                                        <a href="?mod=admin&contrl=order&ac=detail&status=2&idOrder=<?= $item['id'] ?>" class="text-succes" >
                                            Xem tri tiết
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $item['time_order'] ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="nav-order-success" role="tabpanel" aria-labelledby="nav-success-tab">
                        <div class="container-fluid">
                            <?php foreach($data['dataOrderSuccess'] as $item): ?>
                            <div class="row mt-5">
                                <div class="col-md-2">
                                    <?= $item['username'] ?>
                                </div>
                                <div class="col-md-2">
                                    Số lượng: <?= $item['total_product'] ?>
                                </div>
                                <div class="col-md-2">
                                    Tổng tiền: <?= number_format($item['total_price'], 0, '', '.') ?> đ
                                </div>
                                <div class="col-md-2">
                                    <a href="?mod=admin&contrl=order&ac=detail&status=3&idOrder=<?= $item['id'] ?>" class="text-succes" >
                                        Xem tri tiết
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <?= $item['time_order'] ?>
                                </div>
                                <div class="col-md-2">
                                    <a href="?mod=admin&contrl=order&ac=deleteOrderAdmin&id=<?= $item['id'] ?>" class="text-danger">Xóa đơn</a>
                                </div>
                            </div>
                           <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-order-cencel" role="tabpanel" aria-labelledby="nav-cancel-tab">
                        <div class="container-fluid">
                            <?php foreach($data['dataOrderCencel'] as $item): ?>
                                <div class="row mt-5">
                                    <div class="col-md-2">
                                        <?= $item['username'] ?>
                                    </div>
                                    <div class="col-md-2">
                                        Số lượng: <?= $item['total_product'] ?>
                                    </div>
                                    <div class="col-md-2">
                                        Tổng tiền: <?= number_format($item['total_price'], 0, '', '.') ?> đ
                                    </div>
                                    <div class="col-md-2">
                                        <a href="?mod=admin&contrl=order&ac=detail&status=4&idOrder=<?= $item['id'] ?>" class="text-succes" >
                                            Xem tri tiết
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <?= $item['time_order'] ?>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="?mod=admin&contrl=order&ac=deleteOrderAdmin&id=<?= $item['id'] ?>" class="text-danger">Xóa đơn</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php get_footer('admin') ?>
