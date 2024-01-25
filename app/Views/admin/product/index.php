<!-- Page Heading -->
<?php

use app\ViewModels\CategoryVM;
use app\ViewModels\ProductVM;
use core\Common;

$model = new ProductVM();
$totalRow = 0;
$indexPage = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$pageNumber = isset($_GET["number"]) ? intval($_GET["number"]) : 20;
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th>Id</th> -->
                        <th>Tên sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Kích thước</th>
                        <th>Đơn vị</th>
                        <th>Chất liệu</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Đánh giá</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <!-- <th>Id</th> -->
                        <th>Tên sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Kích thước</th>
                        <th>Đơn vị</th>
                        <th>Chất liệu</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Đánh giá</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new ProductVM($row);
                    ?>
                            <tr>
                                <td>
                                    <?php echo $_item->ProductName; ?>
                                </td>
                                <td>
                                    <?php echo $_item->ProdCode; ?>
                                </td>
                                <td style="max-width:400px;">
                                    <?php echo $_item->Description; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Size; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Unit; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Material; ?>
                                </td>
                                <td>
                                    <?php
                                    $modelCate = new CategoryVM($_item->IdCate);
                                    echo $modelCate->CategoryName;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $_item->Quanity; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Rating; ?>
                                </td>
                                <td>
                                    <?php echo $_item->toPrice(); ?>
                                </td>
                                <td style="width:200px;">
                                    <img src="/public/uploads/<?php echo $_item->Image; ?>" style="width:100%;border-radius:5px;"><br />
                                </td>
                                <td class="text-center">
                                    <a href="/admin/product/edit/<?php echo $_item->Id ?>" class="btn btn-primary">Sửa</a>
                                    <a onclick="return confirm('Xoá mặt hàng này?')" href="/admin/product/delete/<?php echo $_item->Id ?>" class="btn btn-danger">Xoá</a>
                                    <a href="/products/detail/product=<?php echo $_item->Id ?>" class="btn" style="color: #fff; background-color:#efbf45;border-color:#efbf45;">Link</a>
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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/product/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>