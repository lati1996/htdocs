<?php

use core\Common;

?>
<div class="container py-5">
    <div id="paymentPanel" class="row py-5">
        <div class="col-md-4 m-auto" style="background-color: #F5F5F5;border-radius:0.75rem;border-color:#F1F1F1; border-style: solid;">
            <div class="form-group row text-center">
                <div class="col-md-12" style="margin-top:20px;">
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
                        <h5>Thanh toán qua MOMO</h5>
                    </label>
                </div>
                <div class="col-md-12" style="margin:5px;">
                    <img src="\public\assets\client\img\momo.jpg" height="300">
                </div>
                <div class="col-md-12" style="margin:5px;margin-bottom:20px;">
                    <button onclick="payment()" class="btn btn-primary">Đã thanh toán</button>
                </div>
            </div>
        </div>
    </div>
    <div id="thankPanel" class="row py-5 text-center" style="display:none">
        <h3>Cảm ơn bạn đã mua sản phẩm của chúng tôi, hy vọng bạn hài lòng và tiếp tục ủng hộ hT Store</h3>
    </div>
</div>