<!-- Page Heading -->
<?php

use app\ViewModels\OrderVM;
use core\Common;

$model = new OrderVM();
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
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn hàng</h6>
    </div>
    <div class="card-body">
        <form method="get" action="/admin/order/index/" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="keyword" type="text" class="form-control bg-light border-0 small" placeholder="Tìm..." value="<?php echo isset($keyword) ? $keyword : ""; ?>" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng hàng (món)</th>
                        <th>Ngày tạo đơn</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Tổng giá</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng hàng (món)</th>
                        <th>Ngày tạo đơn</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Tổng giá</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new OrderVM($row);
                    ?>
                            <tr>
                                <td>
                                    <?php echo $_item->Id; ?>
                                </td>
                                <td>
                                    <?php echo $_item->TotalItem; ?>
                                </td>
                                <td>
                                    <?php echo $_item->DateCreate; ?>
                                </td>
                                <td>
                                    <?php if ($_item->PaymentMethod == 0) {
                                        echo "COD";
                                    } else {
                                        echo "Momo";
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($_item->PaymentStatus == 0) {
                                        echo "Chưa thanh toán";
                                    } else {
                                        echo "Đã thanh toán";
                                    } ?>
                                </td>
                                <td>
                                    <?php echo Common::ViewMoney($_item->TotalPrice); ?>
                                </td>
                                <td class="text-center">
                                    <a href="/admin/order/detail/<?php echo $_item->Id ?>" class="btn btn-primary">Chi tiết</a>
                                    <a onclick="return confirm('Huỷ đơn hàng này?')" href="/admin/order/delete/<?php echo $_item->Id ?>" class="btn btn-danger">Huỷ</a>

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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/order/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>