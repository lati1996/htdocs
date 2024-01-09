<?php

use core\Common;

?>
<div class="container py-5">
    <div id="paymentPanel" class="row py-5">
        <div class="col-md-4 m-auto" style="background-color: #F5F5F5;border-radius:0.75rem;border-color:#F1F1F1; border-style: solid;">
            <div class="form-group row text-center">
                <div class="col-md-12 text-success" style="margin-top:20px;">
                    <h4>THANH TOÁN ĐƠN HÀNG</h4>
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">
                        <h5><b>Tổng đơn hàng: <?php echo Common::ViewMoney($_SESSION["payment"]["TotalCart"]); ?></b></h5>
                    </label>
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">
                        <h5><i>Thanh toán khi nhận hàng bạn nhé!</i></h5>
                    </label>
                </div>
                <div class="col-md-12" style="margin:5px;margin-bottom:20px;">
                    <!-- <form method="post" action=""> -->
                    <button onclick="payment()" name="btnThanhToan" type="submit" class="btn btn-primary">Đã xong</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <div id="thankPanel" class="row py-5 text-center" style="display:none">
        <h3>Cảm ơn bạn đã mua sản phẩm của chúng tôi, vui lòng chú ý điện thoại, chúng tôi sẽ liên hệ với bạn trong thời gian sớm</h3>
    </div>
</div>