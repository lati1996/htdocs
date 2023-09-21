<?php

use app\App;
use app\ViewModels\CategoryVM;
use app\ViewModels\ProductVM;

$model = new CategoryVM();
$data = $model->GetDataTable();

require_once 'app/ViewModels/ProductVM.php';
$modelP = new ProductVM(App::$__params[0]);
//var_dump($modelP);
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa thông tin Sản phẩm</h1>
                        </div>
                        <form class="user" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" name=product[Id] value="<?php echo $modelP->Id; ?>" hidden>
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" class="form-control form-control-user" id="" value="<?php echo $modelP->ProductName; ?>" placeholder="Tên sản phẩm" name="product[ProductName]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Mã sản phẩm</label>
                                    <input type="text" class="form-control form-control-user" id="" value="<?php echo $modelP->ProdCode; ?>" placeholder="Mã sản phẩm" name="product[ProdCode]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Danh mục</label>
                                    <select class="form-control" style="border-radius: 10rem;font-size: .8rem; height: 48px;" name="product[IdCate]" value required>
                                        <?php
                                        if (!empty($data)) {
                                            while ($row = $data->fetch_array()) {
                                                $_item = new CategoryVM($row);
                                        ?>
                                                <option value="<?php echo $_item->Id ?>" <?php if ($_item->Id == $modelP->IdCate)
                                                                                                echo "selected"; ?>>
                                                    <?php echo $_item->CategoryName ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Đánh giá</label>
                                    <input type="text" class="form-control form-control-user" id="" value="<?php echo $modelP->Rating; ?>" placeholder="Đánh giá" name="product[Rating]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="">Số lượng</label>
                                    <input type="number" class="form-control form-control-user" value="<?php echo $modelP->Quanity; ?>" id="" placeholder="Số lượng" name="product[Quanity]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Kích thước</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $modelP->Size; ?>" id="" placeholder="Số lượng" name="product[Size]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Chất liệu</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $modelP->Material; ?>" id="" placeholder="Chất liệu" name="product[Material]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Giá tiền</label>
                                    <input type="text" class="form-control form-control-user" id="" value="<?php echo $modelP->Price; ?>" placeholder="Giá sản phẩm" name="product[Price]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="">Hình ảnh</label><br />
                                    <input type="file" class=" btn btn-light btn-icon-split" name="fileToUpload" id="fileToUpload">
                                    <img src="/public/uploads/<?php echo $modelP->Image; ?>" height="300"><br />
                                    <?php echo $modelP->Image; ?><br />
                                </div>
                                <div class="col-sm-8">
                                    <label for="">Mô tả</label><br />
                                    <input type="text" class="form-control form-control-user" value="<?php echo $modelP->Description; ?>" name="product[Description]" required>
                                    <br />
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <button name="btnEdit" type="submit" class="btn btn-primary btn-user btn-block">
                                                Xác nhận
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="/admin/product/" class="btn btn-google btn-user btn-block">
                                                <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-center" style="color:red;"><?php echo isset($error) ? $mess : null ?></p>
                                        <p class="text-center" style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>