     <?php

        use app\ViewModels\MenuItemVM;

        $model = new MenuItemVM();
        ?>
     <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
         <div class="container text-light">
             <div class="w-100 d-flex justify-content-between">
                 <div>
                     <?php
                        $datainfo = $model->GetDataTable(" `IdGroup` = 2 ORDER BY `OrderNum`");
                        if (!empty($datainfo)) {
                            while ($row = $datainfo->fetch_array()) {
                                $item = new MenuItemVM($row);
                        ?>
                             <i class="<?php echo $item->Icon ?>"></i>
                             <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com"><?php echo $item->Name ?></a>
                     <?php
                            }
                        }
                        ?>
                 </div>
                 <div>
                     <?php
                        $datainfoicon = $model->GetDataTable(" `IdGroup` = 4 ORDER BY `OrderNum`");
                        if (!empty($datainfoicon)) {
                            while ($row = $datainfoicon->fetch_array()) {
                                $item = new MenuItemVM($row);
                        ?>
                             <a class="text-light" href="<?php echo $item->Link ?>" target="_blank" rel="sponsored"><i class="<?php echo $item->Icon ?>"></i></a>
                     <?php
                            }
                        }
                        ?>
                 </div>
             </div>
         </div>
     </nav>
     <!-- Close Top Nav -->
     <!-- Header -->
     <nav class="navbar navbar-expand-lg navbar-light shadow">
         <div class="container d-flex justify-content-between align-items-center">

             <a class="navbar-brand text-success logo h1 align-self-center" href="/home">
                 <h1 class="h1 text-success"><b>hT</b> Store</h1>
             </a>

             <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                 <div class="flex-fill">
                     <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                         <?php
                            $data = $model->GetDataTable(" `IdGroup` = 1 ORDER BY `OrderNum`");
                            if (!empty($data)) {
                                while ($row = $data->fetch_array()) {
                                    $item = new MenuItemVM($row);
                            ?>
                                 <li class="nav-item">
                                     <a class="nav-link" href="<?php echo $item->Link ?>"><?php echo $item->Name ?></a>
                                 </li>
                         <?php
                                }
                            }
                            ?>


                     </ul>
                 </div>
                 <div class="navbar align-self-center d-flex">
                     <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                         <div class="input-group">
                             <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                             <div class="input-group-text">
                                 <i class="fa fa-fw fa-search"></i>
                             </div>
                         </div>
                     </div>
                     <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                         <i class="fa fa-fw fa-search text-dark mr-2"></i>
                     </a>
                     <a class="nav-icon position-relative text-decoration-none" href="/cart">
                         <i class="fa fa-fw fa-shopping-cart text-dark mr-1"></i>
                         <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                             <?php

                                use app\ViewModels\CartVM;

                                $model = new CartVM();
                                if (isset($_SESSION["user"])) {
                                    $dataList = $model->GetCart($_SESSION["user"]["Id"]);
                                    if (!empty($dataList)) {
                                        $number = count($dataList->fetch_all());
                                        echo $number;
                                    } else {
                                        echo "0";
                                    }
                                } else {
                                    echo "+";
                                }
                                ?>
                         </span>
                     </a>
                     <div class="nav-icon position-relative text-decoration-none">
                         <?php
                            if (isset($_SESSION["user"])) {
                            ?>
                             <div class="dropdown">
                                 <button onclick="myFunction()" class="dropbtn"> <i class="fa fa-fw fa-user text-dark mr-3"></i><?php echo $_SESSION["user"]["Name"]; ?></button>
                                 <div id="myDropdown" class="dropdown-content">
                                     <a href="/account">Tài khoản</a>
                                     <a href="/signin/signout">Đăng xuất</a>
                                 </div>
                             </div>
                         <?php
                            } else {
                                echo '<a class="text-decoration-none" href="/signin">Đăng nhập</a>';
                            }
                            ?>
                         <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                     </div>
                 </div>
             </div>

         </div>
     </nav>
     <!-- Close Header -->
     <!-- Modal -->
     <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div class="w-100 pt-1 mb-5 text-right">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="" method="get" class="modal-content modal-body border-0 p-0">
                 <div class="input-group mb-2">
                     <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                     <button type="submit" class="input-group-text bg-success text-light">
                         <i class="fa fa-fw fa-search text-white"></i>
                     </button>
                 </div>
             </form>
         </div>
     </div>