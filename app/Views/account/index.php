<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="" autocomplete="off">
            <!-- <?php var_dump($_SESSION["user"]); ?> -->
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                    <input type="text" class="form-control mt-1" name="user[Id]" value="<?php echo $_SESSION["user"]["Id"]; ?>" hidden>
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Tên hiển thị</label>
                    <input type="text" class="form-control mt-1" name="user[Name]" placeholder="Tên hiển thị" value="<?php echo $_SESSION["user"]["Name"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Tài khoản</label>
                    <input type="text" class="form-control mt-1" name="user[Account]" placeholder="Tài khoản" readonly value="<?php echo $_SESSION["user"]["Account"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Số điện thoại</label>
                    <!-- <input type="text" class="form-control mt-1" name="user[Account]" placeholder="Tài khoản" readonly value=""> -->
                    <input type="number" onKeyPress="if(this.value.length==10) return false;" class=" form-control mt-1" id="phone" name="user[Phone]" placeholder="" onchange="CheckThisField('phone')" required value="<?php echo $_SESSION["user"]["Phone"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control mt-1" name="user[Email]" placeholder="Email" value="<?php echo $_SESSION["user"]["Email"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Đặt lại mật khẩu</label>
                    <input type="password" class="form-control mt-1" name="user[Password]" placeholder="Đặt lại mật khẩu">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" name="user[RePassword]" placeholder="Nhập lại...">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control mt-1" name="user[Address]" placeholder="Địa chỉ" value="<?php echo $_SESSION["user"]["Address"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for="">Tỉnh thành</label>
                    <select id="tinhThanh" name="user[Province]" class="form-control" data-value="<?php echo $_SESSION["user"]["Province"]; ?>">
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for="">Quận huyện</label>
                    <select id="quanHuyen" name="user[District]" class="form-control" data-value="<?php echo $_SESSION["user"]["District"]; ?>">
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for="">Phường xã</label>
                    <select id="phuongXa" name="user[Ward]" class="form-control" data-value="<?php echo $_SESSION["user"]["Ward"]; ?>">
                    </select>
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
                    <button name="btnUpdate" type="submit" class="btn btn-success btn-lg px-4">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>