<?php

namespace core;

class Common

{
    public static function ViewMoney($price)
    {
        return number_format($price, 0, ".", ",") . "đ";
    }
    public static function ToUrl($path)
    {
        header("Location: {$path}");
        exit();
    }
    public static function ProdPaging($soTrang, $trangHienTai, $totalRow, $link = "[i]")
    {
        ob_start();
        $truoc = $trangHienTai - 1;
        $truoc = max(1, $truoc);
        $sau = $trangHienTai + 1;
        $sau = min($sau, $soTrang);
        $linkTruoc = str_replace("[i]", $truoc, $link);
        $linkSau = str_replace("[i]", $sau, $link);
?>
        <ul class="pagination pagination-lg justify-content-end">
            <?php
            for ($i = 1; $i <= $soTrang; $i++) {
                $linkPages = str_replace("[i]", $i, $link);
                $active = $i == $trangHienTai ? "active" : "";
                $disabled = $i == $trangHienTai ? "disabled" : "";
                $textdark = $i != $trangHienTai ? "text-dark" : "";
            ?>
                <li class="page-item <?php echo $disabled; ?>">
                    <a class="page-link <?php echo $active; ?> rounded-0 mr-3 shadow-sm border-top-0 border-left-0 <?php echo $textdark; ?>" href="<?php echo $linkPages ?>"><?php echo $i; ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
        $str = ob_get_clean();
        echo $str;
    }
    public static function Paging($soTrang, $trangHienTai, $totalRow, $link = "[i]")
    {
        ob_start();
        $truoc = $trangHienTai - 1;
        $truoc = max(1, $truoc);
        $sau = $trangHienTai + 1;
        $sau = min($sau, $soTrang);
        $linkTruoc = str_replace("[i]", $truoc, $link);
        $linkSau = str_replace("[i]", $sau, $link);
    ?>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"><?php echo $totalRow; ?> kết quả</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">

                    <ul class="pagination">
                        <li class="paginate_button page-item previous <?php if ($trangHienTai == 1) {
                                                                            echo "disabled";
                                                                        } ?>" id="dataTable_previous">
                            <a href="<?php echo $linkTruoc; ?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Trước</a>
                        </li>
                        <?php
                        for ($i = 1; $i <= $soTrang; $i++) {
                            $linkPages = str_replace("[i]", $i, $link);
                            $active = $i == $trangHienTai ? "active" : "";
                        ?>
                            <li class="paginate_button page-item <?php echo $active ?>">
                                <a href="<?php echo $linkPages ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="paginate_button page-item next <?php if ($trangHienTai == $soTrang) {
                                                                        echo "disabled";
                                                                    } ?>" id="dataTable_next">
                            <a href="<?php echo $linkSau; ?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Sau</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<?php
        $str = ob_get_clean();
        echo $str;
    }
}
?>