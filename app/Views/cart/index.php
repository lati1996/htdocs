<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9">
            <?php

            use app\ViewModels\CartVM;
            use app\ViewModels\SizeVM;
            use app\ViewModels\ProductVM;
            use core\Common;

            $model = new CartVM();
            $dataListCart = $model->GetCart($_SESSION["user"]["Id"]);
            ?>
            <!-- <h4 class="text-center">CHI TIẾT GIỎ HÀNG</h4> -->
            <table class="table table-hover text-center">

                <thead>
                    <tr style="background-color: #68CF82">
                        <th>Thứ tự</th>
                        <th>Sản phẩm</th>
                        <th>Tuỳ chọn sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalCart = 0;
                    if (!empty($dataListCart)) {
                        $i = 1;
                        while ($row = $dataListCart->fetch_array()) {
                            $_item = new CartVM($row);
                            $_prod = new ProductVM($_item->IdProd);
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td id="ProdName"><a class="text-decoration-none" href="/products/detail/product=<?php echo $_prod->Id; ?>"><img class="rounded-0" src="/public/uploads/<?php echo $_prod->Image; ?>" height="100"></br><?php echo $_prod->ProductName; ?></a></td>
                                <td style="max-width:180px;">
                                    <input type="hidden" id="idCart_<?php echo $_item->Id; ?>" value="<?php echo $_item->Id; ?>">
                                    <select class="form-control-custom text-center" id="slSize_<?php echo $_item->Id; ?>" onchange="sizechange(<?php echo $_item->Id; ?>)">
                                        <?php
                                        if ($_item->IdSize == '0') {
                                            echo '<option selected">Chọn:</option>';
                                            $sizeModelNull = new SizeVM();
                                            $listSizeInProd = $sizeModelNull->GetDataTable("`IdProd` = " . $_item->IdProd);
                                            if (!empty($listSizeInProd)) {
                                                while ($rowListSizeProd = $listSizeInProd->fetch_array()) {
                                                    $itemlistsizeprod = new SizeVM($rowListSizeProd);
                                        ?>
                                                    <option value="<?php echo $itemlistsizeprod->Id; ?>"><?php echo $itemlistsizeprod->SizeName; ?></option>
                                                <?php
                                                }
                                            }
                                        } else {
                                            $sizeModel = new SizeVM($_item->IdSize);
                                            $listSize = $sizeModel->GetDataTable("`IdProd` = " . $sizeModel->IdProd);
                                            if (!empty($listSize)) {
                                                while ($rowListSize = $listSize->fetch_array()) {
                                                    $itemlistsize = new SizeVM($rowListSize);
                                                ?>
                                                    <option value="<?php echo $itemlistsize->Id; ?>" <?php if ($sizeModel->Id == $itemlistsize->Id)
                                                                                                            echo "selected"; ?>><?php echo $itemlistsize->SizeName; ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td style="width: 170px;">
                                    <li class="list-inline-item text-right">
                                        <input type="hidden" name="product-quanity-<?php echo $_item->Id; ?>" id="product-quanity" value="<?php echo $_item->Quanity; ?>">
                                    </li>
                                    <li class="list-inline-item"><a href="/cart/minus/<?php echo $_item->Id; ?>" class="btn btn-success">-</a></li>
                                    <li class="list-inline-item"><span class="badge bg-secondary" id="var-value"><?php echo $_item->Quanity; ?></span></li>
                                    <li class="list-inline-item"><a href="/cart/plus/<?php echo $_item->Id; ?>" class="btn btn-success">+</a></li>
                                    <a class="btn" href="/cart/delete/<?php echo $_item->Id; ?>" style="height: 35px; margin-top: 5px;"><i class='fas fa-trash'></i></a>
                                </td>
                                <td><?php
                                    if (isset($sizeModel))
                                        echo $sizeModel->SizetoPrice(); ?>
                                </td>
                                <td><?php echo Common::ViewMoney($_item->TotalPrice()); ?></td>
                            </tr>
                    <?php
                            $i += 1;
                            $totalCart += $_item->TotalPrice();
                            unset($sizeModel);
                        }
                    } else {
                        echo "<td colspan='7'>Giỏ hàng của bạn không có sản phẩm nào, hãy mua sắm tiếp nhé!</td>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr style="background-color:#F5F5F5">
                        <th colspan="5">Tổng cộng đơn hàng</th>
                        <th>
                            <?php
                            echo Common::ViewMoney($totalCart);
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <form method="post" action="" enctype="multipart/form-data" autocomplete="off" class="col-md-3 m-auto" style="background-color: #F5F5F5;border-radius:0.75rem;border-color:#F1F1F1; border-style: solid;">
            <div class="form-group row">
                <div class="col-md-12" style="margin:20px;">
                    <h4>THÔNG TIN ĐƠN HÀNG</h4>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Tên khách hàng:</label>
                    <input type="text" class="form-control" style="background-color: #F5F5F5;border:none;font-weight:bold;" value="<?php echo $_SESSION["user"]["Name"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Số địa thoại:</label>
                    <input type="text" class="form-control" style="background-color: #F5F5F5;border:none;font-weight:bold;" value="<?php echo $_SESSION["user"]["Phone"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Email:</label>
                    <input type="text" class="form-control" style="background-color: #F5F5F5;border:none;font-weight:bold;" value="<?php echo $_SESSION["user"]["Email"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Địa chỉ: </label>
                    <textarea rows="2" id="Address" class="form-control" name="payment[DeliveryAddress]" value="" style="margin-top:5px; resize:none;background-color: #F5F5F5;border:none;font-style:italic;" readonly></textarea>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center" style="margin:5px;">
                    <label for="">Giá trị đơn hàng:
                        <p style="font-weight:bold;"><?php echo Common::ViewMoney($totalCart); ?></p>
                        <input type=" number" value="<?php echo $totalCart; ?>" name="payment[TotalCart]" hidden>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center" style="margin:5px;">
                    <label for="" style="font-style:italic;">Phương thức thanh toán</label>
                    <select class="form-control text-center" name="payment[PaymentMethod]">
                        <option value="0">Thanh toán qua MOMO</option>
                        <option value="1">Thanh toán khi nhận hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center" style="margin:5px;">
                    <?php
                    $dataListCartCheck = $model->GetCart($_SESSION["user"]["Id"]);
                    //var_dump($dataListCartCheck->fetch_all());
                    if (!empty($dataListCartCheck)) {
                        $array = $dataListCartCheck->fetch_all();
                        $arrayCheckList = [];
                        foreach ($array as $key => $value) {
                            $arrayCheckList[$key] = $value[3];
                        }
                        if (in_array("0", $arrayCheckList)) {
                            echo '<button name="btnConfirm" id="btnConfirm" class="btn btn-primary" type="submit" disabled><b>Xác nhận</b></button>';
                            echo '<p style="color:#64647d;"><i>Vui lòng chọn "Tuỳ chọn sản phẩm"</i></p>';
                        } else {
                            echo '<button name="btnConfirm" id="btnConfirm" class="btn btn-primary" type="submit"><b>Xác nhận</b></button>';
                        }
                    }
                    ?>
                </div>
            </div>
        </form>
        <div class="form-group row">
            <div class="col-md-12 text-center" style="margin:5px;">
                <a href="/account" id="" class="btn" style="color: #000;background-color: #F5F5F5;border:1px solid #878787;font-size:1rem;border-radius:0.5rem;"><b>Thay đổi thông tin cá nhân</b></a>
            </div>
        </div>
    </div>
</div>