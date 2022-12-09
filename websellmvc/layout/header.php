<?php 
    $session_login =  isset($_SESSION['login_customer']) ? $_SESSION['login_customer'] : null;
    $cookie_login =  isset($_COOKIE['login_customer']) ? $_COOKIE['login_customer'] : null;
    $id_login = null;
    if($session_login != null || $cookie_login != null){
        $id_login = $session_login == null ? $cookie_login : $session_login ;
        checkLogin($id_login);
        $query_string = "SELECT id,username,email,token_login FROM customers WHERE id = $id_login";
        $result_login = db_fetch_row($query_string);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="./public/customer/css/loading.css">
    <link rel="stylesheet" href="./public/customer/css/index.css">
    <link rel="stylesheet" href="./public/customer/css/home.css">
    <link rel="stylesheet" href="./public/customer/css/login-register.css">
    <link rel="stylesheet" href="./public/customer/css/alert.css">
    <link rel="stylesheet" href="./public/customer/css/detail.css">
    <link rel="stylesheet" href="./public/customer/css/cart.css">
    <link rel="stylesheet" href="./public/customer/css/account.css">
    <link rel="stylesheet" href="./public/customer/css/address.css">
    <link rel="stylesheet" href="./public/customer/css/category.css">
    <link rel="stylesheet" href="./public/customer/css/loveProduct.css">
    <link rel="stylesheet" href="./public/customer/css/updatephone.css">
    <link rel="stylesheet" href="./public/customer/css/notification.css">
    <!-- font awesome6 -->
    <link rel="stylesheet" href="./public/customer/fontawesome6/css/all.min.css">
    <script src="./public/customer/fontawesome6/js/all.min.js"></script>
    <!-- jquery -->
    <script src="./public/customer/jquery/jquery.min.js"></script>
    <!-- slick jquery -->
    <link rel="stylesheet" href="./public/customer/css/slick.css">
    <script src="./public/customer/jquery/slick.min.js"></script>
    <!-- lazy load -->
    <link rel="stylesheet" href="./public/customer/css/animate.css">
    <script src="./public/customer/jquery/wow.min.js"></script>
    <!-- validate -->
    <script src="./public/customer/jquery/jquery.validate.min.js"></script>
    <!-- number -->
    <link rel="stylesheet" href="./public/customer/css/jquery.nice-number.css">
    <script src="./public/customer/jquery/jquery.nice-number.js"></script>
    <!-- image pupop -->
    <link rel="stylesheet" href="./public/customer/css/magnific-popup.css">
    <script src="./public/customer/jquery/jquery.magnific-popup.js"></script>
    <script src="./public/customer/jquery/jquery.magnific-popup.min.js"></script>

</head>

<body>
    <div class="wapper">
        <div class="alert hide">
            <span class="msg"></span>
            <span class="close-btn">
                <span>x</span>
            </span>
        </div>
        <div class="loader" >
            <hr>
            <hr>
            <hr>
            <hr>
        </div>
        <!-- header -->
        <header>
            <div class="header-logo">
                <a href="?mod=pages">
                    <img src="./public/customer/images/logo.png" alt="">
                </a>
            </div>
            <div class="header-search">
                <form action="?ac=getResult" method="post">
                    <div class="group-input-seacrh">

                        <div>
                                <input type="text" id="input-search-header" name="input-search" autocomplete="off"
                                    placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ...">
                                <button type="submit">Tìm kiếm</button>
                        </div>

                        <div class="model-search">
                        <?php if(getIdCustomer() != null): ?>
                            <div class="result-search">
                                <?php foreach (historySearch() as $row): ?>
                                    <div class="item-search">
                                        <div>
                                            <a href="?ac=detail&idProduct=<?=$row['id_product']?>">
                                                <img src="./public/customer/images/lockload.png" alt=""> 
                                                <span><?= formatTextIndex(base64_decode($row['name']), 15) ?></span> 
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                            <div class="search-popular">
                                <div class="title-popular">
                                    <i class="fas fa-chart-line chart-line"></i>
                                    <span>Tìm kiếm phổ biết</span>
                                </div>
                                <div class="results-popular">
                                    <?php foreach (dataSearchPopular() as $item): ?>
                                        <a href="?ac=detail&idProduct=<?= $item['id'] ?>">
                                            <div class="item-popular">
                                                <img src="./data/upload/<?= $item['img'] ?>" alt="">
                                                <p><?= formatTextIndex(base64_decode($item['name']), 5) ?></p>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="popular-category">
                                <div class="title-category">
                                    <h4>Danh Mục Nổi Bật</h4>
                                </div>
                                <div class="results-category">
                                    <?php foreach (dataSearchCategory() as $category): ?>
                                    <a href="?contrl=category&ac=getCategory&idCategory=<?= $category['id'] ?>">
                                        <div class="item-category">
                                            <div>
                                                <img src="./data/upload/<?= $category['img'] ?>" alt="">
                                                <p><?= $category['name'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="model-writing-search">
                            <div class="result-writing">
                                
                            </div>
                        </div>
                    </div>
                </form>
                <div class="group-click-search">
                    <ul>
                        <?php foreach(dataCategory() as $value): ?>
                        <li><a href="?contrl=category&ac=getCategory&idCategory=<?= $value['id'] ?>"><?= $value['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="header-actions">
                <!--hover: header-modal-acount -->
                <div class="header-action-acount <?= $id_login != null ? 'header-modal-acount' : '' ?>">
                    <div class="icon-acount">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="font-acount">
                        <?php if($id_login == null): ?>
                            <button class="btn-action-login">
                                <p>Đăng nhập / Đăng ký</p>
                                <span>Tài khoản</span>&ensp;<i class="fas fa-caret-down"></i>
                            </button>
                        <?php else: ?>
                            <?php 
                            $username = strlen($result_login['username']) > 13 ? substr($result_login['username'], 0, 13) : $result_login['username'];
                            ?>
                            <button>
                                <p>Tài khoản</p>
                                <span><?= ucwords($username) ?></span>&ensp;<i class="fas fa-caret-down"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="modal-acount">
                        <ul>
                            <li><a href="?mod=pages">Trang chủ</a></li>
                            <li><a href="?contrl=account&ac=getAccount">Tài khoản của tôi</a></li>
                            <li><a href="?contrl=account&ac=getManagerOrder">Quản lý đơn hàng</a></li>
                            <li><a href="?contrl=account&ac=getAddress"">Sổ địa chỉ</a></li>
                            <li><a href="?contrl=account&ac=getChangePassword"">Thay đổi mật khẩu</a></li>
                            <li><a href="?contrl=customer&ac=logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-action-cart" id="result-model-info-cart-id">
                    
                </div>
            </div>
        </header>