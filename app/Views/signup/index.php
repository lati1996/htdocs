<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="" autocomplete="off">
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Họ và tên</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="name" name="user[Name]" placeholder="Full name">
                </div>
            </div>
            <div class=" row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Địa chỉ:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="address" name="user[Address]" placeholder="Address">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Email:</p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="email" class="form-control mt-1" id="email" name="user[Email]" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Số địa thoại: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="number" class="form-control mt-1" id="phone" name="user[Phone]" placeholder="Phone">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Tài khoản: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputemail">Tài khoản/Email</label> -->
                    <input type="text" class="form-control mt-1" id="email" name="user[Account]" placeholder="Account">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Mật khẩu: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="password" name="user[Password]" placeholder="Password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <label>
                        <p>Nhập lại mật khẩu: </p>
                    </label>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="repassword" name="user[RePassword]" placeholder="Retype password">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <button name="btnSignup" type="submit" class="btn btn-success btn-lg px-4">Đăng ký</button>
                </div>
                <p style="color:red;"><?php echo isset($error) ? $error : null ?></p>
                <p style="color:blue;"><?php echo isset($mess) ? $mess : null ?></p>
            </div>
        </form>
    </div>
</div>