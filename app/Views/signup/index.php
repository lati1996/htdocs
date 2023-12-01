<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="" autocomplete="off">
            <div class="row">
                <div class="form-group col-md-12 mb-12 text-center">
                    <label>
                        <h1 class="h1 text-success"><b>hT</b> Store</h1>
                        <p class="h2">Đăng ký tài khoản</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 mb-12 text-center">
                    <label>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="">Họ và tên</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="name" name="user[Name]" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="">Email:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="email" class="form-control mt-1" id="email" name="user[Email]" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="">Số điện thoại: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="number" onKeyPress="if(this.value.length==10) return false;" class=" form-control mt-1" id="phone" name="user[Phone]" placeholder="" onchange="CheckThisField('phone')" required>
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
                        <p class="">Tài khoản: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="account" name="user[Account]" placeholder="" onchange="CheckThisField('account')" required>
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
                        <p class="">Mật khẩu: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="password" onchange="CheckPassword()" name="user[Password]" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="">Nhập lại: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="repassword" name="user[RePassword]" onchange="CheckPassword()" placeholder="" required>
                </div>
                <div id="w_pass" class="form-group col-md-4 mb-3" style="display:none; color: red;">
                    <label>
                        <p>Mật khẩu không trùng khớp!</p>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label>
                        <p class="">Địa chỉ:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="address" name="user[Address]" placeholder="Số nhà, tên đường, tên cơ quan..." required>
                </div>
            </div>
            <!-- <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="city" name="user[Province]" class="form-control">
                        <option>Chọn tỉnh thành</option>
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="district" name="user[District]" class="form-control">
                        <option>Chọn quận huyện</option>
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="ward" name="user[Ward]" class="form-control">
                        <option>Chọn phường xã</option>
                    </select>
                </div>
            </div> -->
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="col-2 form-group">
                    <label for="">Tỉnh</label>
                    <select id="tinhThanh" name="user[Province]" class="form-control"> </select>
                </div>
                <div class="col-2 form-group">
                    <label for="">Huyện</label>
                    <select id="quanHuyen" name="user[District]" class="form-control"> </select>

                </div>
                <div class="col-2 form-group">
                    <label for="">Xã</label>
                    <select id="phuongXa" name="user[Ward]" class="form-control"> </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <p class="" style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                    <p class="" style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
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