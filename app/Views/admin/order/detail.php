<!-- Page Heading -->
<?php

use app\ViewModels\OrderVM;
use app\ViewModels\CartVM;
use app\ViewModels\UserVM;
use app\App;
use app\ViewModels\ProductVM;
use core\Common;

$idOrder = App::$__params[0];
$model = new CartVM();
$totalRow = 0;
//trang hien tai
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
//so dong / trang
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 10;
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$data = $model->GetPaging(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow);
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn Đơn hàng <?php echo $idOrder; ?></h6>
    </div>
    <div class="card-body">
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên món hàng</th>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Phương thức thanh toán</th>
                        <th>Địa chỉ giao hàng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên món hàng</th>
                        <th>Người đặt</th>
                        <th>Số điện thoại</th>
                        <th>Phương thức thanh toán</th>
                        <th>Địa chỉ giao hàng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {

                        while ($row = $data->fetch_array()) {
                            $_item = new CartVM($row);
                            if ($_item->IdOrder == $idOrder) {
                    ?>
                                <tr>
                                    <td hidden>
                                        <?php echo $_item->Id; ?>
                                    </td>
                                    <td>
                                        <?php echo $_item->IdOrder; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php $prod = new ProductVM($_item->IdProd);
                                        echo $prod->ProductName;
                                        echo "<br/>";
                                        ?>
                                        <img class="rounded-0" src="/public/uploads/<?php echo $prod->Image; ?>" height="100">
                                    </td>
                                    <td>
                                        <?php $user = new UserVM($_item->IdUser);
                                        echo $user->Name;
                                        ?></td>
                                    <td>
                                        <?php $user = new UserVM($_item->IdUser);
                                        echo $user->Phone;
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($_item->IdOrder == 0) {
                                            echo "COD";
                                        } else {
                                            echo "Momo";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php
                                        $model = new OrderVM($idOrder);
                                        echo $model->DeliveryAddress;
                                        ?>
                                    </td>
                                </tr>
                    <?php
                            }
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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/order/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>