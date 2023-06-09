<!DOCTYPE html>
<html lang="en" style="margin-bottom: 0px">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="<?php asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php asset('gentelella/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php asset('gentelella/build/css/custom.min.css') ?>" rel="stylesheet">

    <!-- Extra CSS -->
    <?= $extra_css ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php route('Home/index') ?>" class="site_title"><i class="fa fa-coffee"></i> <span>ITI Cafeteria</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php uploads("images/users/{$_SESSION['user']['image']}") ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
                                <?php
                                if (isset($_SESSION['user']['name'])) {
                                    echo $_SESSION['user']['name'];
                                } else {
                                    echo "User";
                                }
                                ?>
                            </h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-coffee"></i> Order <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?php route('Cart/index') ?>">Show Products</a></li>
                                        <li><a href="<?php route('Cart/create') ?>">Order Now</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-credit-card"></i> My Orders <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">My Orders</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php uploads("images/users/{$_SESSION['user']['image']}") ?>" alt="">
                                    <?php
                                    if (isset($_SESSION['user']['name'])) {
                                        echo $_SESSION['user']['name'];
                                    } else {
                                        echo "User";
                                    }
                                    ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="<?php route('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 95vh;">
                <?= $content ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Made with <span style="color: #e25555;">&hearts;</span> By ITI Mansoura - Intake 43
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php asset('gentelella/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php asset('gentelella/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php asset('gentelella/vendors/nprogress/nprogress.js') ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php asset('gentelella/build/js/custom.min.js') ?>"></script>

    <!-- Extra JS -->
    <?= $extra_js ?>
</body>

</html>