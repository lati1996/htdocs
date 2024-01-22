<!-- End Featured Product -->
<section class="py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h2 class="h2"></h2>
                <p>
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <!-- <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div> -->
                    <!--End Controls-->
                    <!--Carousel Wrapper-->
                    <!-- <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">

                            <div class="carousel-inner product-links-wap" role="listbox">
 
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/public/assets/client/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">hT Store</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <?php

                    use app\ViewModels\MenuItemVM;

                    $model = new MenuItemVM();
                    $datainfo = $model->GetDataTable(" `IdGroup` = 2 ORDER BY `OrderNum` DESC");
                    if (!empty($datainfo)) {
                        while ($row = $datainfo->fetch_array()) {
                            $item = new MenuItemVM($row);
                    ?>
                            <li>
                                <i class="<?php echo $item->Icon; ?>"></i>
                                <a class="text-decoration-none" href="#"><?php echo $item->Name; ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="col-md-5 pt-5">
                <!-- <h2 class="h2 text-light border-bottom pb-3 border-light">SẢN PHẨM</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Màn cửa</a></li>
                    <li><a class="text-decoration-none" href="#">Drap</a></li>
                    <li><a class="text-decoration-none" href="#">Nệm</a></li>
                    <li><a class="text-decoration-none" href="#">Gia công theo yêu cầu</a></li>
                </ul> -->
            </div>

            <div class="col-md-3 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">THÔNG TIN</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="/home">Trang chủ</a></li>
                    <li><a class="text-decoration-none" href="/about">Giới thiệu</a></li>
                    <li><a class="text-decoration-none" href="/location">Địa chỉ</a></li>
                    <li><a class="text-decoration-none" href="/contact">Liên hệ</a></li>
                </ul>
            </div>

        </div>

        <!-- <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Địa chỉ Email</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                    <div class="input-group-text btn-success text-light">Subscribe</div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">

                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="/public/assets/client/js/jquery-1.11.0.min.js"></script>
<script src="/public/assets/client/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/public/assets/client/js/bootstrap.bundle.min.js"></script>
<script src="/public/assets/client/js/templatemo.js"></script>
<script src="/public/assets/client/js/custom.js"></script>
<script src="/public/assets/client/js/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: `/address/getfulladdress`,
            dataType: "html",
            success: function(response) {
                $("#Address").val(response);
            }
        });
    })

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>