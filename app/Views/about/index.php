<?php

use app\ViewModels\MenuItemVM;

$modelitem = new MenuItemVM();
?>
<div class="loadHome">
</div>
<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <?php
                $doc1 = $modelitem->GetDataTableByIdGroupAndNum(6, 1);
                echo $doc1["Name"];
                ?>
            </div>
            <div class="col-md-4">
                <img src="/public/uploads/carousel/<?php echo $doc1["Icon"]; ?>" alt="About Hero">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <?php
            $doc2 = $modelitem->GetDataTableByIdGroupAndNum(6, 2);
            echo $doc2["Name"];
            ?>
        </div>
    </div>
    <div class="row">
        <?php
        $doc3 = $modelitem->GetDataTable("`IdGroup` = 6 LIMIT 2,10");
        if ($doc3) {
            while ($row = $doc3->fetch_array()) {
                $item = new MenuItemVM($row);
        ?>
                <div class="col-md-6 col-lg-3 pb-5">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center"><i class="<?php echo $item->Icon; ?>"></i></div>
                        <h2 class="h5 mt-4 text-center"><?php echo $item->Name; ?></h2>
                    </div>
                </div>
        <?php
            }
        }
        ?>



    </div>
</section>
<!-- End Section -->
<!-- Start Brands -->
<!--End Brands-->