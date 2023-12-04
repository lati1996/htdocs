<?php

use app\ViewModels\MenuVM;

$model = new MenuVM();
$data = $model->GetDataTable();
?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm Menu</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Tên Menu" name="item[Name]" required>
                                </div>
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <select class="form-control" style="border-radius: 10rem;font-size: .8rem; height: 48px;" name="item[IdGroup]" required>
                                        <option value="0" selected>Chọn nhóm Menu</option>
                                        <?php

                                        if (!empty($data)) {
                                            while ($row = $data->fetch_array()) {
                                                $_item = new MenuVM($row);
                                        ?>
                                                <option value="<?php echo $_item->Id ?>"><?php echo $_item->MenuGroupName ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Link" name="item[Link]" required>
                                </div>
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Icon" name="item[Icon]">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-6 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="" placeholder="Thứ tự" name="item[OrderNum]" required>
                                </div>
                                <div class="col-sm-6 mb-6 mb-sm-0">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button name="btnAdd" type="submit" class="btn btn-primary btn-user btn-block">
                                        Xác nhận
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="/admin/menu/" class="btn btn-google btn-user btn-block">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <div class="text-center">
                            <p style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                            <p style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>