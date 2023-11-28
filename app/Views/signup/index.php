<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="" autocomplete="off">
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Họ và tên</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="name" name="user[Name]" placeholder="">
                </div>
            </div>
            <div class=" row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Địa chỉ:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="address" name="user[Address]" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Email:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="email" class="form-control mt-1" id="email" name="user[Email]" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Số điện thoại: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="number" onKeyPress="if(this.value.length==10) return false;" class=" form-control mt-1" id="phone" name="user[Phone]" placeholder="" onchange="CheckThisField('phone')">
                </div>
                <div id="w_phone" class="form-group col-md-4 mb-3" style="display:none; color: red;">
                    <label>
                        <p>Đã có người sử dụng</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Tài khoản: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="account" name="user[Account]" placeholder="" onchange="CheckThisField('account')">
                </div>
                <div id="w_account" class="form-group col-md-4 mb-3" style="display:none; color: red;">
                    <label>
                        <p>Đã có người sử dụng</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Mật khẩu: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="password" onchange="CheckPassword()" name="user[Password]" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="font-weight-bold">Nhập lại: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="repassword" name="user[RePassword]" onchange="CheckPassword()" placeholder="">
                </div>
                <div id="w_pass" class="form-group col-md-4 mb-3" style="display:none; color: red;">
                    <label>
                        <p>Mật khẩu không trùng khớp!</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <p class="font-weight-bold" style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                    <p class="font-weight-bold" style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <button name="btnSignup" type="submit" class="btn btn-success btn-lg px-4">Đăng ký</button>
                </div>
            </div>

        </form>
    </div>
</div>