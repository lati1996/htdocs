<?php

use app\App;
use app\ViewModels\ProductVM;
use app\ViewModels\ImageVM;
use app\ViewModels\SizeVM;

$idProd = App::$__params[0];
$idProd = str_replace("product=", "", $idProd);
$model = new ProductVM($idProd);
$modelmg = new ImageVM();
$modelSize = new SizeVM();
?>
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
<div class="loadHome">
</div>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <a id="myImg"><img class="card-img img-fluid" style="max-height:300px;" src="/public/uploads/<?php echo $model->Image; ?>" alt="Card image cap" id="product-detail"></a>
                </div>
                <div id="myModal" class="modalDetail">
                    <span class="closeDetail"><i class="fa fa-window-close"></i></span>
                    <img class="modal-content" id="img01">
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");
                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById("myImg");
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function() {
                        modal.style.display = "block";
                        modalImg.src = $('#product-detail').attr('src');
                        captionText.innerHTML = "<?php echo $model->ProductName; ?>";
                    }
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("closeDetail")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }
                </script>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/<?php echo $model->Image; ?>" alt="">
                                        </a>
                                    </div>
                                    <?php
                                    $dataimg1 = $modelmg->GetImageShow1($model->Id);
                                    if ($dataimg1) {
                                        while ($rowimg = $dataimg1->fetch_array()) {
                                            $itemimg = new ImageVM($rowimg);
                                    ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" alt="">
                                                </a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--/.First slide-->
                            <!--Second slide-->
                            <?php
                            $dataimg2 = $modelmg->GetImageShow2($model->Id);
                            if ($dataimg2) { ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php
                                        while ($rowimg = $dataimg2->fetch_array()) {
                                            $itemimg = new ImageVM($rowimg);
                                        ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" alt="">
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            $dataimg3 = $modelmg->GetImageShow3($model->Id);
                            if ($dataimg3) {
                            ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php
                                        while ($rowimg = $dataimg3->fetch_array()) {
                                            $itemimg = new ImageVM($rowimg);
                                        ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" alt="">
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            $dataimg4 = $modelmg->GetImageShow4($model->Id);
                            if ($dataimg4) {
                            ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php
                                        while ($rowimg = $dataimg4->fetch_array()) {
                                            $itemimg = new ImageVM($rowimg);
                                        ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" alt="">
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            $dataimg5 = $modelmg->GetImageShow5($model->Id);
                            if ($dataimg5) {
                            ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <?php
                                        while ($rowimg = $dataimg5->fetch_array()) {
                                            $itemimg = new ImageVM($rowimg);
                                        ?>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img style="max-height:81px;" class="card-img img-fluid" src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" alt="">
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?php echo $model->ProductName; ?></h1>
                        <input class="h3 py-2" id="showPrice" style="border:none;" value="<?php echo $model->toPrice(); ?>" readonly>
                        <p class="py-2">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                $star = $i <= $model->Rating ? "warning" : "muted";
                            ?>

                                <i class="text-<?php echo $star; ?> fa fa-star"></i>
                            <?php
                            }
                            ?>
                            <span class="list-inline-item text-dark"></span>
                        </p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Đơn vị:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?php echo $model->Unit; ?></strong></p>
                            </li>
                        </ul>
                        <ul class="list-inline" style="min-height:100px;">
                            <li class="list-inline-item">
                                <h6>Chọn kích thước:</h6>
                            </li>
                            <li>
                                <?php
                                $prodSize1 = $modelSize->GetDataTable("`IdProd` = " . $model->Id);
                                if (!empty($prodSize1)) {
                                    while ($it1 = $prodSize1->fetch_array()) {
                                        $itm1 = new SizeVM($it1);
                                ?>
                                        <div class="contentSize">
                                            <span id="mark_<?php echo $itm1->Id; ?>" class="mark"></span>
                                            <button class="btnCustom" id="btnSize_<?php echo $itm1->Id; ?>" onclick="selectButton(<?php echo $itm1->Id; ?>)" style="color: #000;background-color: #f3f1eb;"><?php echo $itm1->SizeName; ?></button>

                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </li>
                        </ul>

                        <form action="" method="POST">
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item text-right">
                                    <h6>Số lượng:</h6>
                                    <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                </li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                <li class="list-inline-item"><span class="badge bg-secondary" name="item[Quanity]" id="var-value">1</span></li>
                                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                            </ul>
                            <input id="fillIdSize" type="hidden" name="item[IdSize]" value="">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input id="number" name=item[Quanity] hidden value="1">
                                    <input id="id-prod" name=item[Id] value="<?php echo $model->Id; ?>" hidden>
                                    <button class="btn btn-lg" name="btnAddCart" style="color: #000;background-color: #f3f1eb;border-color: #f3f1eb;font-size:1rem;">
                                        <i class='fas fa-cart-plus'></i> Thêm vào giỏ hàng
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-success btn-lg" name="btnBuy" style="font-size: 1rem;">Mua ngay</button>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <p style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                                <p style="color:#64647d;"><i><?php echo isset($mess) ? $mess : null ?></i></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="h2 text-center mt-5"><strong><?php echo $model->ProductName; ?></strong></div>
                        <div class="text-center mt-5">
                            <img class="card-img img-fluid" src="/public/uploads/<?php echo $model->Image; ?>" style="width: 80%;" alt="Card image cap">
                        </div>
                        <div class="row">
                            <div class="col-sm-1 col-md-1 col-lg-1">
                            </div>
                            <div class="col-xs-10 col-sm-1 col-md-10 col-lg-10">
                                <p class="mt-5"><i>Chi tiết sản phẩm:</i> </p>
                                <?php echo $model->Description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Close Content -->
<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Sản phẩm cùng danh mục</h4>
        </div>
        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            <?php
            $carouselProd = new ProductVM();
            $carouseList = $carouselProd->GetListProdByCategory($model->IdCate);
            //var_dump($carouseList);
            if (!empty($carouseList)) {
                while ($row = $carouseList->fetch_array()) {
                    $item = new ProductVM($row);
                    if ($item->Id != $idProd) {
            ?>
                        <div class="p-2 pb-3">
                            <div class="product-wap card rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0" src="/public/uploads/<?php echo $item->Image; ?>" height="300">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <!-- <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li> -->
                                            <li><a class="btn btn-success text-white mt-2" href="/products/detail/product=<?php echo $item->Id; ?>"><i class="far fa-eye"></i></a></li>
                                            <div class="popup" onclick="myFunctionPopup(<?php echo $item->Id; ?>)">
                                                <li><button class="btn btn-success text-white mt-2" onclick="AddCart(<?php echo $item->Id; ?>,1)"><i class="fas fa-cart-plus"></i></button></li>
                                                <span class="popuptext" id="myPopup-<?php echo $item->Id; ?>">Đã thêm vào giỏ hàng</span>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-center mb-0"><a href="/products/detail/product=<?php echo $item->Id; ?>" class="h3 text-decoration-none"><?php echo $item->ProductName; ?></a></p>

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
                                        <li>
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                $star = $i <= $item->Rating ? "warning" : "muted";
                                            ?>
                                                <i class="text-<?php echo $star; ?> fa fa-star"></i>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0"><?php echo $item->toPrice(); ?></p>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>