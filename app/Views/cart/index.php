<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="">
            <?php

            use app\ViewModels\CartVM;
            use app\ViewModels\ProductVM;
            use core\Common;

            $model = new CartVM();
            $dataList = $model->GetDataTableWhere("`IdUser` = " . $_SESSION["user"]["Id"]);
            //var_dump($dataList);
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
                                <td style="width: 160px;">
                                    <li class="list-inline-item text-right">
                                        <input type="hidden" name="product-quanity-<?php echo $_item->Id; ?>" id="product-quanity" value="<?php echo $_item->Quantity; ?>">
                                    </li>
                                    <li class="list-inline-item"><button class="btn btn-success" id="btn-minus">-</button></li>
                                    <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                    <li class="list-inline-item"><button class="btn btn-success" id="btn-plus">+</button></li>
                                    <div><button class="btn btn-success" onclick="confirmQuanity(<?php echo $_item->Id; ?>)" id="">0k</button></div>
                                </td>
                                <td><?php echo $_prod->toPrice(); ?></td>
                                <td><?php echo Common::ViewMoney($_prod->Price * $_item->Quantity); ?></td>
                            </tr>
                    <?php
                            $i += 1;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>

    </div>
</div>