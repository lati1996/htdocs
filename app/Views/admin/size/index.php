<!-- Page Heading -->
<?php

use app\ViewModels\ProductVM;
use app\ViewModels\SizeVM;
use core\Common;

$model = new ProductVM();
$modelSize = new SizeVM();
$totalRow = 0;
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 50;
$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
$data = $model->GetPaging(["keyword" => $keyword], $indexPage, $pageNumber, $totalRow);
?>
<style>
    .table td,
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
</style>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Sản phẩm</h6>
    </div>
    <div class="card-body">
        <form method="get" action="/admin/product/index/" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
        <?php
        $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : "1";
        $trangHienTai = intval($_GET["page"]);
        $trangHienTai = max(1, $trangHienTai);
        $soTrang = ceil($totalRow / $pageNumber);
        Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/product/index/?page=[i]&number={$pageNumber}");
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Giá</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Giá</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new ProductVM($row);
                            $prodSize = $modelSize->GetDataTable("`IdProd` = " . $_item->Id);
                            if (!empty($prodSize)) {
                                $rows = count($prodSize->fetch_all()) + 1;
                            }
                    ?>
                            <tr>
                                <td style="width:200px;" rowspan="<?php if (!empty($rows)) echo $rows; ?>">
                                    <a href="/admin/product/edit/<?php echo $_item->Id; ?>"><img src="/public/uploads/<?php echo $_item->Image; ?>" style="width:100%;border-radius:5px;"></a><br />
                                </td>
                                <td rowspan="<?php if (!empty($rows)) echo $rows; ?>">
                                    <?php echo $_item->ProductName; ?>
                                </td>
                                <form action="/admin/size/add" method="POST" autocomplete="off">
                                    <td>
                                        <input type="text" name="size[SizeName]" class="form-control" placeholder="Kích thước">
                                        <input type="text" name="size[IdProd]" value="<?php echo $_item->Id; ?>" hidden>
                                    </td>
                                    <td>
                                        <input type="number" name="size[SizePrice]" class="form-control" placeholder="Giá">
                                    </td>
                                    <td class="text-center" style="min-width:200px;">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </td>
                                </form>
                            </tr>
                            <?php
                            $prodSize1 = $modelSize->GetDataTable("`IdProd` = " . $_item->Id);
                            if (!empty($prodSize1)) {
                                while ($it1 = $prodSize1->fetch_array()) {
                                    $itm1 = new SizeVM($it1);
                            ?>
                                    <tr>
                                        <form action="/admin/size/edit" method="POST">
                                            <input type="text" name="size[IdProd]" value="<?php echo $_item->Id; ?>" hidden>
                                            <input type="text" name="size[Id]" value="<?php echo $itm1->Id; ?>" hidden>
                                            <td> <input type="text" id="input1_<?php echo $itm1->Id; ?>" name="size[SizeName]" class="form-control text-center" value="<?php echo $itm1->SizeName; ?>" readonly> </td>
                                            <td> <input type="text" id="input2_<?php echo $itm1->Id; ?>" name="size[SizePrice]" class="form-control text-center" value="<?php echo Common::ViewMoney($itm1->SizePrice); ?>" readonly> </td>
                                            <td class="text-center">
                                                <a id="btnUnread_<?php echo $itm1->Id; ?>" class="btn btn-warning" onclick="btnUnread(<?php echo $itm1->Id; ?>)">Sửa</a>
                                                <button type="submit" id="btnUpdate_<?php echo $itm1->Id; ?>" class="btn btn-primary" style="display:none;position: absolute;">Xong</button>
                                                <a onclick="return confirm('Xoá option này?')" href="/admin/size/delete/<?php echo $itm1->Id ?>" class="btn btn-danger">Xoá</a>
                                            </td>
                                        </form>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                    <?php
                            unset($rows);
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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/product/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>