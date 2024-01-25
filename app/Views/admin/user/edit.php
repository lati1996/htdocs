<?php

use app\App;
use app\ViewModels\UserVM;

$model = new UserVM(App::$__params[0]);

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
                                <input value="<?php echo $model->Id; ?>" name="user[Id]" hidden>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Họ tên</label>
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Họ tên" name="user[Name]" value="<?php echo $model->Name; ?>" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="">Tài khoản</label>
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Tài khoản" name="user[Account]" value="<?php echo $model->Account; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-user" id="" placeholder="Email" name="user[Email]" value="<?php echo $model->Email; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control form-control-user" id="" placeholder="Điện thoại" name="user[Phone]" value="<?php echo $model->Phone; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" class="form-control form-control-user" id="" placeholder="Mật khẩu" name="user[Password]" value="<?php echo $model->Password; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Nhập lại</label>
                                    <input type="password" class="form-control form-control-user" id="" placeholder="Nhập lại mật khẩu..." name="user[RePassword]" value="<?php echo $model->Password; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control form-control-user" id="" placeholder="Địa chỉ" name="user[Address]" value="<?php echo $model->Address; ?>" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <button name="btnEdit" type="submit" class="btn btn-primary btn-user btn-block">
                                        Xác nhận
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="javascript:history.back()" class="btn btn-google btn-user btn-block">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->Trở về
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </form>
                        <p style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                        <p style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>