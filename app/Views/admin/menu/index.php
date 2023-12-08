<!-- Page Heading -->
<?php

use app\ViewModels\MenuVM;
use app\ViewModels\MenuItemVM;
use core\Common;

$model = new MenuItemVM();
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
        <h6 class="m-0 font-weight-bold text-primary">Danh sách Menu</h6>
    </div>
    <div class="card-body">
        <form method="get" action="/admin/menu/index/" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                        <th>ID</th>
                        <th>Tên Menu</th>
                        <th>Nhóm Menu</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th>Thứ tự</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên Menu</th>
                        <th>Nhóm Menu</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th>Thứ tự</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new MenuItemVM($row);
                    ?>
                            <tr>
                                <td>
                                    <?php echo $_item->Id; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Name; ?>
                                </td>
                                <td>
                                    <?php
                                    $group = new MenuVM($_item->IdGroup);
                                    echo $group->MenuGroupName;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $_item->Link; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Icon; ?>
                                </td>
                                <td>
                                    <?php echo $_item->OrderNum; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/admin/menu/edit/<?php echo $_item->Id ?>" class="btn btn-primary">Sửa</a>
                                    <a onclick="return confirm('Xoá Danh mục sản phẩm này?')" href="/admin/menu/delete/<?php echo $_item->Id ?>" class="btn btn-danger">Xoá</a>

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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/menu/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>