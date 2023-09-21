<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <?php

            use app\ViewModels\CartVM;
            use app\ViewModels\ProductVM;
            use core\Common;

            $model = new CartVM();
            $dataList = $model->GetDataTableWhere($_SESSION["user"]["Id"]);
            ?>
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Thứ tự</th>
                        <th colspan="2">Sản phẩm</th>
                        <th>Quy cách</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalCart = 0;
                    if (!empty($dataList)) {
                        $i = 1;
                        while ($row = $dataList->fetch_array()) {
                            $_item = new CartVM($row);
                            $_prod = new ProductVM($_item->IdProd);
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img src="/public/uploads/<?php echo $_prod->Image; ?>" height="100"></td>
                                <td> <?php echo $_prod->ProductName; ?> </td>
                                <td><?php echo $_prod->Size; ?></td>
                                <td style="width: 170px;">
                                    <li class="list-inline-item text-right">
                                        <input type="hidden" name="product-quanity-<?php echo $_item->Id; ?>" id="product-quanity" value="<?php echo $_item->Quanity; ?>">
                                    </li>
                                    <li class="list-inline-item"><a href="/cart/minus/<?php echo $_item->Id; ?>" class="btn btn-success">-</a></li>
                                    <li class="list-inline-item"><span class="badge bg-secondary" id="var-value"><?php echo $_item->Quanity; ?></span></li>
                                    <li class="list-inline-item"><a href="/cart/plus/<?php echo $_item->Id; ?>" class="btn btn-success">+</a></li>
                                    <a class="btn" href="/cart/delete/<?php echo $_item->Id; ?>" style="height: 35px; margin-top: 5px;"><img src="\public\assets\client\img\trash.svg"></a>
                                </td>
                                <td><?php echo $_prod->toPrice(); ?></td>
                                <td><?php echo Common::ViewMoney($_item->TotalPrice()); ?></td>
                            </tr>
                    <?php
                            $i += 1;
                            $totalCart += $_item->TotalPrice();
                        }
                    } else {
                        echo "<td colspan='7'>Giỏ hàng của bạn không có sản phẩm nào, hãy mua sắm tiếp nhé!</td>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">Tổng cộng đơn hàng</th>
                        <th>
                            <?php
                            echo Common::ViewMoney($totalCart);
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-3 m-auto" style="background-color: #F5F5F5;border-radius:0.75rem;border-color:cornflowerblue; border-style: solid;">
            <div class="form-group row">
                <div class="col-md-12" style="margin:20px;">
                    <h4>THÔNG TIN THANH TOÁN</h4>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Tên khách hàng:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["user"]["Name"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Số địa thoại:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["user"]["Phone"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Email:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["user"]["Email"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Địa chỉ:</label>
                    <input type="text" class="form-control" value="<?php echo $_SESSION["user"]["Address"]; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12" style="margin:5px;">
                    <label for="" style="font-size: 15px !important;">Phương thức thanh toán:</label>
                    <select class="form-control">
                        <option value="0">Thanh toán qua MOMO</option>
                        <option value="1">Thanh toán khi nhận hàng</option>
                    </select>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 20px;margin-bottom: 20px;">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <a name="" id="" class="btn btn-primary" href="#" role="button"><b>Thanh toán</b></a>
                </div>
            </div>
        </div>
    </div>
</div>