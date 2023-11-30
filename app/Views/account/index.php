<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="" autocomplete="off">

            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Tên hiển thị</label>
                    <input type="text" class="form-control mt-1" id="email" name="user[Name]" placeholder="Tên hiển thị" value="<?php echo $_SESSION["user"]["Name"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Tài khoản</label>
                    <input type="text" class="form-control mt-1" id="email" name="user[Account]" placeholder="Tài khoản" readonly value="<?php echo $_SESSION["user"]["Account"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control mt-1" id="name" name="user[Email]" placeholder="Email" value="<?php echo $_SESSION["user"]["Email"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Đặt lại mật khẩu</label>
                    <input type="password" class="form-control mt-1" id="name" name="user[Password]" placeholder="Đặt lại mật khẩu">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <!-- <label for="inputname">Mật khẩu</label> -->
                    <input type="password" class="form-control mt-1" id="name" name="user[RePassword]" placeholder="Nhập lại...">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control mt-1" id="name" name="user[Address]" placeholder="Địa chỉ" value="<?php echo $_SESSION["user"]["Address"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="city" name="user[Province]" class="form-control">
                        <option selected value="<?php echo $_SESSION["user"]["Province"]; ?>"></option>
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="district" name="user[District]" class="form-control" data-value="<?php echo $_SESSION["user"]["District"]; ?>">
                    </select>
                </div>
                <div class="form-group col-md-2 mb-2">
                    <label for=""></label>
                    <select id="ward" name="user[Ward]" class="form-control" data-value="<?php echo $_SESSION["user"]["Ward"]; ?>">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                </div>
                <div class="form-group col-md-4 mb-3">
                    <button name="btnConfirm" type="submit" class="btn btn-success btn-lg px-4">Xác nhận</button>
                </div>
            </div>
            <?php var_dump($_SESSION["user"]); ?>
        </form>
    </div>
</div>