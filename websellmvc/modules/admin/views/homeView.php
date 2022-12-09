
<?php get_header('admin') ?>

<div class="container-fluid py-4">
    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div
            style="display: flex;
                justify-content: center;
                align-items:center;"
            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="fas fa-file-signature text-white"></i>
            </div>
            <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Doanh thu hôm nay</p>
            <h4 class="mb-0">
                <?= number_format($data['dataInfoManager']['totalOrder'], 0, '', '.') ?> đ</h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div
            style="display: flex;
                justify-content: center;
                align-items:center;"
            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="fas fa-users text-white"></i>
            </div>
            <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Tổng tài khoản</p>
            <h4 class="mb-0"><?= $data['dataInfoManager']['totalAccount'] ?></h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div
            style="display: flex;
                justify-content: center;
                align-items:center;"
            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="fas fa-clipboard text-white"></i>
            </div>
            <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Đơn hàng đang chờ</p>
            <h4 class="mb-0"><?= $data['dataInfoManager']['totalOrdernew'] ?></h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
        <div class="card-header p-3 pt-2">
            <div
            style="display: flex;
                justify-content: center;
                align-items:center;"
            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fas fa-truck text-white"></i>  
            </div>
            <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Đơn hàng đang chuyển</p>
            <h4 class="mb-0"><?= $data['dataInfoManager']['totalTransported'] ?></h4>
            </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
        </div>
    </div>
    </div>
    <div class="row mt-4">
    <div class="col-lg-12 col-md-12 mt-4 mb-4">
        <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="300"></canvas>
            </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="mb-0 ">Tổng đơn hàng trong một tuần</h6>
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

<?php get_footer('admin-more'); ?>
<?php get_footer('admin') ?>
