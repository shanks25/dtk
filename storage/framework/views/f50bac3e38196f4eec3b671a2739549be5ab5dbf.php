<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(Setting::get('site_title')); ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(Setting::get('site_favicon', asset('favicon.ico'))); ?>">
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('assets/user/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="<?php echo e(asset('assets/user/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- Ionicons CSS -->
    <link href="<?php echo e(asset('assets/user/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
    <!-- Material Icons CSS -->
    <link href="<?php echo e(asset('assets/user/material-icons/css/materialdesignicons.min.css')); ?>" rel="stylesheet">
    <!-- Slick CSS -->
    <link href="<?php echo e(asset('assets/user/css/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/user/css/slick-theme.css')); ?>" rel="stylesheet">
    <!-- Semantic CSS -->
    <link href="<?php echo e(asset('assets/user/css/semantic.min.css')); ?>" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo e(asset('assets/user/css/style.css')); ?>" rel="stylesheet">
    <style>
        .pac-container {
            z-index: 9999999999999999999 !important;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
<!-- Main Wrapper Starts -->
<div class="main-wrapper pusher">
    <!-- Header Starts -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgation-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logoback" href="javascript:void(0)">
                    <img src="<?php echo e(Setting::get('site_logo',asset('assets/user/img/logo.png'))); ?>">
                </a>

            </div>
            <div class="collapse navbar-collapse" id="navgation-1">
                <ul class="nav navbar-nav">
                    <li>
                        <?php if(Request::get('myaddress')): ?>
                            <a href="#" class="nav-address">
                                <b>Secure Checkout</b>
                            </a>
                        <?php elseif(Request::segment(1)=='restaurant' || Request::segment(1)=='restaurants'): ?>
                            <a href="#" class="nav-address" onclick="$('#nav-location-sidebar').asidebar('open')">
                                <!--  <span class="sub-address">Park Ave S</span>  -->
                                <?php if(Request::segment(1)=='restaurant'): ?>
                                    <span class="nav-address-name"><?php echo e(Session::get('search_loc')); ?></span>
                                    <span class="ion-chevron-down address-arrow"></span>
                                <?php elseif(Request::segment(1)=='restaurants'): ?>
                                    <span class="nav-address-name"><?php echo e(Request::get('search_loc')); ?></span>
                                    <span class="ion-chevron-down address-arrow"></span>
                                <?php else: ?>
                                    <span class="nav-address-name"><?php echo e(Session::get('search_loc')); ?></span>
                                    <span class="ion-chevron-down address-arrow"></span>
                                <?php endif; ?>

                            </a>
                        <?php else: ?>
                            <?php if(Auth::guest()): ?>

                            <?php else: ?>
                                <span class="nav-address-name">My Account</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="<?php echo e(route('contactform')); ?>" class="btn btn-danger"
                           style="background: #dd1c1c; color: white">
                            Catering Inquiry</a>
                    </li>


                    <li>
                        <a href="<?php echo e(url('search')); ?>"><i class="ion-android-search"></i> Search</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('contact')); ?>"><i class="ion-help-buoy"></i> Help</a>
                    </li>
                    <?php if(Auth::guest()): ?>
                        <li><a href="javascript:void(0);" class="login-item signinform"><?php echo app('translator')->getFromJson('menu.user.login'); ?></a>
                        </li>
                        <li><a href="javascript:void(0);" class="active signupform"><?php echo app('translator')->getFromJson('menu.user.register'); ?></a></li>
                        <?php $cart_no = 0; ?>
                    <?php else: ?>
                        <?php
                        $cart = \App\UserCart::list(Auth::user()->id);
                        //dd($cart[0]->product->shop->name);
                        $cart_no = count($cart);?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ion-ios-person"></i>
                                <?php echo e(Auth::user()->name); ?><strong class="caret"></strong>
                            </a>
                            <ul class="dropdown-menu">
                            <!-- <li>
                                    <a href="<?php echo e(url('/orders')); ?>">Profile</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo e(url('/orders')); ?>">Orders</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/offers')); ?>">Offers</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/payments')); ?>">Payments</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/favourite')); ?>">Favourites</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/useraddress')); ?>">Addresses</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        <?php echo app('translator')->getFromJson('menu.user.logout'); ?></a>
                                </li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                      style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </ul>
                        </li>
                    <?php endif; ?>


                    <?php
                    if ($cart_no == 0) {
                        $url = url('restaurant/details?name=' . @$Shop->name);
                    } else {
                        $url = url('restaurant/details?name=' . @$cart[0]->product->shop->name . '&myaddress=home');
                    }
                    ?>

                    <li class="dropdown">
                        <a href="<?php echo e($url); ?>"><span class="cart-count"><?php echo e($cart_no); ?></span> Cart</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Header Ends -->
    <!-- End Header =============================================== -->
    <form id="home_page_back" action="<?php echo e(url('restaurants')); ?>" style="display:none">
        <input type="hidden" value="<?php echo e(@Session::get('search_loc')); ?>" name="search_loc">
        <input type="hidden" name="latitude" value="<?php echo e(@Session::get('latitude')); ?>" readonly>
        <input type="hidden" name="longitude" value="<?php echo e(Session::get('longitude')); ?>" readonly>
    </form>
    <!-- End Map -->
    <?php echo $__env->make('include.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>


    <script src="<?php echo e(asset('assets/user/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo e(asset('assets/user/js/bootstrap.min.js')); ?>"></script>
    <!-- Slick Slider JS -->
    <script src="<?php echo e(asset('assets/user/js/slick.min.js')); ?>"></script>
    <!-- Sidebar JS -->
    <script src="<?php echo e(asset('assets/user/js/asidebar.jquery.js')); ?>"></script>
    <!-- Map JS -->
    <?php echo $__env->make('user.layouts.partials.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="<?php echo e(asset('assets/user/js/jquery.googlemap.js')); ?>"></script>
    <!-- Incrementing JS -->
    <script src="<?php echo e(asset('assets/user/js/incrementing.js')); ?>"></script>
    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/user/js/scripts.js')); ?>"></script>


    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('deliveryscripts'); ?>
<!-- Start of LiveChat (www.livechatinc.com) code -->
    
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '');
    </script>
</body>

</html>
