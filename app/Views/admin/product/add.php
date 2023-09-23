<?php

use app\ViewModels\CategoryVM;

$model = new CategoryVM();
$data = $model->GetDataTable();
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm Sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Tên sản phẩm" name="product[ProductName]" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Mã sản phẩm" name="product[ProdCode]" required>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" style="border-radius: 10rem;font-size: .8rem; height: 48px;" name="product[IdCate]" required>
                                        <option value="0" selected>Chọn Danh mục sản phẩm</option>
                                        <?php
                                        if (!empty($data)) {
                                            while ($row = $data->fetch_array()) {
                                                $_item = new CategoryVM($row);
                                        ?>
                                                <option value="<?php echo $_item->Id ?>"><?php echo $_item->CategoryName ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" id="" placeholder="Đánh giá" name="product[Rating]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <input type="number" class="form-control form-control-user" id="" placeholder="Số lượng" name="product[Quanity]" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Kích thước" name="product[Size]" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Chất liệu" name="product[Material]" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Giá sản phẩm" name="product[Price]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="file" class="form-control-user" name="fileToUpload" id="fileToUpload" required>
                                    <!-- <input type="text" class="form-control form-control-user" id="" placeholder="Hình ảnh" name="product[Image]" required> -->
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Mô tả" name="product[Description]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button name="btnAdd" type="submit" class="btn btn-primary btn-user btn-block">
                                        Xác nhận
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="/admin/product/" class="btn btn-google btn-user btn-block">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                    </a>
                                </div>
                            </div>
                        </form>
                        <p style="color:red;"><?php echo isset($error) ? $mess : null ?></p>
                        <p style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>