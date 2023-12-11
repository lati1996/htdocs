 <!-- Start Banner Hero -->
 <?php

    use app\ViewModels\ProductVM;
    use app\ViewModels\MenuItemVM;

    $menuitem = new MenuItemVM();
    ?>
 <div class="loadHome">
 </div>
 <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
     <ol class="carousel-indicators">
         <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
         <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
         <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
     </ol>
     <div class="loadHome">
     </div>
     <div class="carousel-inner">
         <div class="carousel-item active">
             <div class="container">
                 <div class="row p-5">
                     <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                         <div class="text-align-left align-self-center">
                             <?php
                                $dataitem = $menuitem->GetDataTable("`IdGroup` = 5 AND `OrderNum` = 1")->fetch_assoc();
                                echo $dataitem["Name"];
                                ?>
                         </div>
                     </div>
                     <div class="col-lg-6 mb-0 d-flex align-items-center">
                         <img src="/public/uploads/carousel/<?php echo $dataitem["Icon"]; ?>" alt="" height="600">
                     </div>
                 </div>
             </div>
         </div>
         <div class="carousel-item">
             <div class="container">
                 <div class="row p-5">
                     <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                         <?php
                            $dataitem1 = $menuitem->GetDataTable("`IdGroup` = 5 AND `OrderNum` = 2")->fetch_assoc();
                            ?>
                         <img src="/public/uploads/carousel/<?php echo $dataitem1["Icon"]; ?>" alt="" height="600">
                     </div>
                     <div class="col-lg-6 mb-0 d-flex align-items-center">
                         <div class="text-align-left">
                             <?php echo $dataitem1["Name"]; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="carousel-item">
             <div class="container">
                 <div class="row p-5">
                     <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                         <?php
                            $dataitem3 = $menuitem->GetDataTable("`IdGroup` = 5 AND `OrderNum` = 3")->fetch_assoc();
                            ?>
                         <img src="/public/uploads/carousel/<?php echo $dataitem3["Icon"]; ?>" alt="" height="600">
                     </div>
                     <div class="col-lg-6 mb-0 d-flex align-items-center">
                         <div class="text-align-left">
                             <?php echo $dataitem3["Name"]; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
         <i class="fas fa-chevron-left"></i>
     </a>
     <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
         <i class="fas fa-chevron-right"></i>
     </a>
 </div>
 <!-- End Banner Hero -->


 <!-- Start Categories of The Month -->
 <section class="container py-5">
     <div class="row text-center pt-3">
         <div class="col-lg-6 m-auto">
             <h1 class="h1">Top sản phẩm trong tháng</h1>
             <p>
                 Sản phẩm HOT có nhiều lượt mua và xem nhất trong tháng <br />Bạn không thể bỏ lỡ....
             </p>
         </div>
     </div>
     <div class="row">
         <?php
            $model = new ProductVM();
            $modelList = $model->GetTopProd(3);
            while ($row = $modelList->fetch_array()) {
                $item = new ProductVM($row);
            ?>
             <div class="col-12 col-md-4 p-5 mt-3">
                 <a href="/products/detail/product=<?php echo $item->Id; ?>"><img src="/public/uploads/<?php echo $item->Image ?>" class="rounded-circle border" height="340" width="340"></a>
                 <h5 class="text-center mt-3 mb-3"></h5>
                 <p class="text-center"><button onclick="AddCart(<?php echo $item->Id; ?>,1)" class="btn btn-success"><i class='fas fa-cart-plus' style='font-size:20px'></i> Thêm</button></p>
             </div>
         <?php
            }
            ?>
     </div>
 </section>
 <!-- End Categories of The Month -->


 <!-- Start Featured Product -->
 <section class="bg-light">
     <div class="container py-5">
         <div class="row text-center py-3">
             <div class="col-lg-6 m-auto">
                 <h1 class="h1">Sản phẩm mới</h1>
                 <p>
                     HT Shop cập nhật thêm mẫu vải đẹp, màu sắc mới, hình ảnh theo trend thị trường...
                 </p>
             </div>
         </div>
         <div class="row">
             <?php
                $modelListNew = $model->GetTopProd("3,3");
                if (!empty($modelListNew)) {
                    while ($row = $modelListNew->fetch_array()) {
                        $item = new ProductVM($row);
                ?>
                     <div class="col-12 col-md-4 mb-4">
                         <div class="card h-100">
                             <a href="/products/detail/product=<?php echo $item->Id; ?>">
                                 <img src="/public/uploads/<?php echo $item->Image; ?>" class="card-img-top" height="500">
                             </a>
                             <div class="card-body">
                                 <ul class="list-unstyled d-flex justify-content-between">
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
                                     <li class="text-muted text-right"><?php echo $item->toPrice(); ?></li>
                                 </ul>
                                 <p class="text-center"><a href="/products/detail/product=<?php echo $item->Id; ?>" class="h3 text-decoration-none text-dark"><?php echo $item->ProductName; ?></a></p>
                                 <p class="text-center">
                                     Chất liệu: <?php echo $item->Material; ?>
                                 </p>
                                 <!-- <p class="text-muted">Reviews (24)</p> -->
                             </div>
                         </div>
                     </div>
             <?php
                    }
                }
                ?>

         </div>
     </div>
 </section>