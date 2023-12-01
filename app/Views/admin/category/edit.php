<?php

use app\App;
use app\ViewModels\CategoryVM;

$model = new CategoryVM(App::$__params[0]);

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
                            <h1 class="h4 text-gray-900 mb-4">Thay đổi thông tin</h1>
                        </div>
                        <form class="user" method="post" action="">
                            <div class="form-group row">
                                <input value="<?php echo $model->Id; ?>" name="category[Id]" hidden>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Họ tên" name="category[CategoryName]" value="<?php echo $model->CategoryName; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Tài khoản" name="category[Description]" value="<?php echo $model->Description; ?>" required>
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
                                    <a href="/admin/category/" class="btn btn-google btn-user btn-block">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>