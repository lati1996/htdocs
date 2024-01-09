<?php

use app\App;
use app\ViewModels\CategoryVM;
use app\ViewModels\ProductVM;
use app\ViewModels\ImageVM;

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
                                <div class="col-sm-2">
                                    <label for="">Số lượng</label>
                                    <input type="number" class="form-control form-control-user" value="<?php echo $modelP->Quanity; ?>" id="" placeholder="Số lượng" name="product[Quanity]" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Đơn vị</label>
                                    <select class="form-control" style="border-radius: 10rem;font-size: .8rem; height: 48px;" name="product[Unit]" required>
                                        <?php
                                        $unit = array("Bộ", "Cái", "Mét vuông", "Mét");
                                        foreach ($unit as $itemunit) {
                                        ?>
                                            <option value="<?php echo $itemunit; ?>" <?php if ($modelP->Unit == $itemunit)
                                                                                            echo "selected"; ?>><?php echo $itemunit; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Kích thước</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $modelP->Size; ?>" id="" placeholder="Số lượng" name="product[Size]" required>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Chất liệu</label>
                                    <input type="text" class="form-control form-control-user" value="<?php echo $modelP->Material; ?>" id="" placeholder="Chất liệu" name="product[Material]" required>
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Giá tiền</label>
                                    <input type="text" class="form-control form-control-user" id="" value="<?php echo $modelP->Price; ?>" placeholder="Giá sản phẩm" name="product[Price]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-12 mb-sm-0">
                                    <label for="">Mô tả</label><br />
                                    <textarea rows="4" style="resize: none;" class="form-control" id="editor1" placeholder="Mô tả" name="product[Description]" required><?php echo $modelP->Description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-6 mb-sm-0 text-center">
                                    <label for="">Ảnh chính (Tối đa 01 ảnh)</label><br />
                                    <input type="file" class="btn btn-light btn-icon-split" name="fileToUpload" id="fileToUpload" multiple>
                                    <img src="/public/uploads/<?php echo $modelP->Image; ?>" width="500" style="border-radius:5px;"><br />
                                    <?php echo $modelP->Image; ?><br />
                                </div>
                                <div class="col-sm-6 text-center">
                                    <label for="">Ảnh phụ (Tối đa 14 ảnh)</label><br />
                                    <input type="file" class="form-control-user" name="fileToUploadBonus[]" id="fileToUploadBonus" multiple>
                                    <table>
                                        <?php
                                        $img = new ImageVM();
                                        $dataImage = $img->GetDataTable();
                                        if ($dataImage) {
                                            while ($rowi = $dataImage->fetch_array()) {
                                                $itemimg = new ImageVM($rowi);
                                                if ($itemimg->IdProd == $modelP->Id) {
                                        ?>
                                                    <tr>
                                                        <td> <img src="/public/uploads/bonus/<?php echo $itemimg->Image; ?>" width="250px" style="border-radius:5px;"></td>
                                                        <td class="text-center" style="width: 150px;">
                                                            <a onclick="return confirm('Xoá ảnh này?')" href="/admin/product/deleteImg/<?php echo $itemimg->Id ?>" class="btn btn-danger"><i class='fas fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">

                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <button name="btnEdit" type="submit" class="btn btn-primary btn-user btn-block">
                                        Xác nhận
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <a href="/admin/product" class="btn btn-google btn-user btn-block">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                    </a>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <p style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                                <p style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>