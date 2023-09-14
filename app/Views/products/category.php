<?php

use app\App;
use app\ViewModels\CategoryVM;
use app\ViewModels\ProductVM;
use core\Common;

$modelCate = new CategoryVM();
$dataCate = $modelCate->GetDataTable();

$idCate = App::$__params[0];
$idCate = str_replace("tag=", "", $idCate);

$modelProd = new ProductVM();
$totalRow = 0;
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 6;
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$listProd = $modelProd->GetPagingByCategory(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow, $idCate);
?>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Danh mục Sản phẩm</h1>
            <ul class="list-unstyled templatemo-accordion">
                <div class="pb-3">
                    <?php
                    if (!empty($dataCate)) {
                        while ($row = $dataCate->fetch_array()) {
                            $item = new CategoryVM($row);
                            $textgreen = $item->Id == $idCate ? "text-success" : "";
                    ?>
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none <?php echo $textgreen; ?>" href="/products/category/tag=<?php echo $item->Id; ?>">
                                <?php echo $item->CategoryName; ?>
                                <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
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
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="/products">Tất cả</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Sắp xếp...</option>
                            <option>A - Z</option>
                            <option>Danh mục</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if (!empty($listProd)) {
                    while ($row = $listProd->fetch_array()) {
                        $_item = new ProductVM($row);
                ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="/public/uploads/<?php echo $_item->Image; ?>" height="380">
                                    <div id="myModal" class="modal">
                                        <span class="close">&times;</span>
                                        <img class="modal-content" id="img01">
                                        <div id="caption"></div>
                                    </div>
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <!-- <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li> -->
                                            <li><a class="btn btn-success text-white mt-2" id="myImg-<?php echo $_item->Id; ?>"><i class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("myImg-<?php echo $_item->Id; ?>");
                                    var modalImg = document.getElementById("img01");
                                    var captionText = document.getElementById("caption");
                                    img.onclick = function() {
                                        modal.style.display = "block";
                                        modalImg.src = "/public/uploads/<?php echo $_item->Image; ?>";
                                        captionText.innerHTML = "<?php echo $_item->ProductName; ?>";
                                    }

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                        modal.style.display = "none";
                                    }
                                </script>
                                <div class="card-body">
                                    <p class="text-center mb-0"> <a href="/products/detail/product=<?php echo $_item->Id; ?>" class="h3 text-decoration-none"><?php echo $_item->ProductName; ?></a></p>
                                    <p class="text-center mb-0">Kích thước: <?php echo $_item->Size; ?></p>
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
                                    <p class="text-center mb-0"><?php echo $_item->toPrice(); ?></p>
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