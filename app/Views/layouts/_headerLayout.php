    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">mhoang1996@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">039.8936.410</a>
                </div>
                <div>
                    <a class="text-light" href="#" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="/home">
                hT Store
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Giới thiệu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/manage">Dashboard</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="/cart">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                            <?php

                            use app\ViewModels\CartVM;

                            $model = new CartVM();
                            if (isset($_SESSION["user"])) {
                                $dataList = $model->GetCart($_SESSION["user"]["Id"]);
                                if (!empty($dataList)) {
                                    $number = count($dataList->fetch_all());
                                    echo $number;
                                }
                            }
                            ?>
                        </span>
                    </a>
                    <div class="nav-icon position-relative text-decoration-none">
                        <?php
                        if (isset($_SESSION["user"])) {
                        ?>
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn"> <i class="fa fa-fw fa-user text-dark mr-3"></i><?php echo $_SESSION["user"]["Name"]; ?></button>
                                <div id="myDropdown" class="dropdown-content">
                                    <a href="#">Tài khoản</a>
                                    <a href="/signin/signout">Đăng xuất</a>
                                </div>
                            </div>
                        <?php
                        } else {
                            echo '<a class="text-decoration-none" href="/signin">Đăng nhập</a>';
                        }
                        ?>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>