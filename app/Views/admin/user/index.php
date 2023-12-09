<!-- Page Heading -->
<?php

use app\ViewModels\UserVM;
use core\Common;

$model = new UserVM();
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
        <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
    </div>
    <div class="card-body">
        <form method="get" action="/admin/user/index/" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Địa chỉ</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Địa chỉ</th>
                        <th>Tuỳ chỉnh</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($data)) {
                        while ($row = $data->fetch_array()) {
                            $_item = new UserVM($row);
                    ?>
                            <tr>
                                <td scope="row" hidden>
                                    <?php echo $_item->Id; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Name; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Email; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Phone; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Account; ?>
                                </td>
                                <td style="width: 100px;">
                                    <?php echo $_item->Password; ?>
                                </td>
                                <td>
                                    <?php echo $_item->Address; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/admin/user/edit/<?php echo $_item->Id ?>" class="btn btn-primary">Sửa</a>
                                    <a onclick="return confirm('Xoá người dùng này?')" href="/admin/user/delete/<?php echo $_item->Id ?>" class="btn btn-danger">Xoá</a>

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
            Common::Paging($soTrang, $trangHienTai, $totalRow, "/admin/user/index/?page=[i]&number={$pageNumber}");
            ?>
        </div>
    </div>
</div>