<?php

use app\App;
use app\ViewModels\CategoryVM;
use app\ViewModels\ProductVM;
use core\Common;

$modelCate = new CategoryVM();
$dataCate = $modelCate->GetDataTable();

$par = App::$__params[0];
$idCate = str_replace("tag=", "", $par);

$modelProd = new ProductVM();
$totalRow = 0;
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 6;
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$listProd = $modelProd->GetPagingByCategory(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow, $idCate);
?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-2">
            <h1 class="h3 pb-4 text-success">Sản phẩm</h1>
            <ul class="list-unstyled templatemo-accordion">
                <div class="pb-3">
                    <?php
                    if (!empty($dataCate)) {
                        while ($row = $dataCate->fetch_array()) {
                            $item = new CategoryVM($row);
                            $textgreen = $item->Id == $idCate ? "text-success" : "";
                            $h4 = $item->Id == $idCate ? "h4" : "";
                            $arrowgreen = $item->Id == $idCate ? '<i class="pull-right fas fa-caret-right"></i>' : '';
                            //$icon = $item->Id == $idCate ? "fas fa-caret-square-right" : "fas fa-caret-right";
                    ?>
                            <a class="collapsed d-flex justify-content-between text-decoration-none <?php echo $textgreen; ?> <?php echo $h4; ?>" href="/products/category/tag=<?php echo $item->Id; ?>">
                                <?php
                                echo $item->CategoryName;
                                echo $arrowgreen;
                                ?>
                            </a>
                            <br />
                    <?php
                        }
                    }
                    ?>
                    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                    </a>
                </div>
            </ul>
        </div>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="/products">Tất cả sản phẩm</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <form method="get" action="/products/category/<?php echo $par; ?>" class="form-control" style="border:none;" autocomplete="off">
                            <div class="input-group">
                                <input name="keyword" class="form-control" type="text" placeholder="Tìm..." value="<?php echo isset($keyword) ? $keyword : ""; ?>" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="">
                                    <button class="btn btn-success btn-lg" type=" submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="load">
                <img src="/public/assets/client/img/loader.gif">
            </div>
            <div class="row" id="loadproduct">
                <?php
                if (!empty($listProd)) {
                    while ($row = $listProd->fetch_array()) {
                        $_item = new ProductVM($row);
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="/public/uploads/<?php echo $_item->Image; ?>" height="300">
                                    <div id="myModal" class="modal">
                                        <span class="close"><i class="fa fa-window-close"></i></span>
                                        <img class="modal-content" id="img01">
                                    </div>
                                    <div id="myImg-<?php echo $_item->Id; ?>" class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <div class="popup" onclick="myFunctionPopup(<?php echo $_item->Id; ?>)">
                                                <span class="popuptext" id="myPopup-<?php echo $_item->Id; ?>">Đã thêm vào giỏ hàng</span>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("myImg-<?php echo $_item->Id; ?>");
                                    var modalImg = document.getElementById("img01");
                                    img.onclick = function() {
                                        modal.style.display = "block";
                                        modalImg.src = "/public/uploads/<?php echo $_item->Image; ?>";
                                    }

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }
                                </script>
                                <div class="card-body">
                                    <p id="ProdName" class="text-center mb-0"> <a href="/products/detail/product=<?php echo $_item->Id; ?>" class="h3 text-decoration-none"><?php echo $_item->ProductName; ?></a></p>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                $star = $i <= $_item->Rating ? "warning" : "muted";
                                            ?>

                                                <i class="text-<?php echo $star; ?> fa fa-star"></i>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0"><?php echo $_item->toPrice(); ?> / <?php echo $_item->Unit; ?></p>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-6">
                                            <button class="btn btn-success text-white mt-2" onclick="AddCart(<?php echo $_item->Id; ?>,1)"><i class="fas fa-cart-plus"></i></button>
                                        </div>
                                        <div class="form-group col-md-6 mb-6" style="text-align: right;">
                                            <button class="btn btn-success text-white mt-2" style="font-size: 1rem;" onclick="Buynow(<?php echo $_item->Id; ?>,1)">Mua Ngay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Hiện không có sản phẩm nào...";
                }
                ?>
            </div>
            <div div="row">
                <?php
                $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : "1";
                $trangHienTai = intval($_GET["page"]);
                $trangHienTai = max(1, $trangHienTai);
                $soTrang = ceil($totalRow / $pageNumber);
                Common::ProdPaging($soTrang, $trangHienTai, $totalRow, "/products/index/?page=[i]&number={$pageNumber}");
                ?>
            </div>
        </div>

    </div>
</div>