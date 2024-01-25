<!-- Page Heading -->
<?php

use app\ViewModels\OrderVM;
use app\ViewModels\CartVM;
use app\ViewModels\UserVM;
use app\ViewModels\SizeVM;
use app\App;
use app\ViewModels\ProductVM;
use core\Common;

$idOrder = App::$__params[0];
$model = new CartVM();

$totalRow = 0;
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 10;
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$data = $model->GetPagingWithIdOrder(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow, $idOrder);
$data1 = $model->GetPagingWithIdOrder(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow, $idOrder)->fetch_all();
$idUserCart = 0;
foreach ($data1 as $value) {
    $idUserCart = $value[1];
    break;
}
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none;" href="javascript:history.back()">Quay lại</a></li>
        <li class=" breadcrumb-item active"><a style="text-decoration: none;" href="/admin/order/detail/<?php echo $idOrder; ?>">Chi tiết <?php echo $idOrder; ?></a></li>
    </ol>
    <div class="card-header py-3 text-center">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $idOrder; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>Người đặt hàng:</td>
                    <td>
                        <?php $user = new UserVM($idUserCart);
                        echo $user->Name;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>
                        <?php $user = new UserVM($idUserCart);
                        echo $user->Phone;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ giao hàng:</td>
                    <td>
                        <?php
                        $model = new OrderVM($idOrder);
                        echo $model->DeliveryAddress;
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên món hàng</th>
                        <th>Tuỳ chọn</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên món hàng</th>
                        <th>Tuỳ chọn</th>
                        <th>Số lượng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new CartVM($row);
                    ?>
                            <tr>
                                <td hidden>
                                    <?php echo $_item->Id; ?>
                                </td>
                                <td class="text-center">
                                    <?php $prod = new ProductVM($_item->IdProd); ?>
                                    <img class="rounded-0" src="/public/uploads/<?php echo $prod->Image; ?>" height="100"> </br>
                                    <?php echo $prod->ProductName; ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $modelSize = new SizeVM($_item->IdSize);
                                    echo $modelSize->SizeName;
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $_item->Quanity; ?>
                                </td>
                            </tr>
                    <?php

                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : "1";
            $trangHienTai = intval($_GET["page"]);
            $trangHienTai = max(1, $trangHienTai);
            $soTrang = ceil($totalRow / $pageNumber);
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/order/detail/$idOrder/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>