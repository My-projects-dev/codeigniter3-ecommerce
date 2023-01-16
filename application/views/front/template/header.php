<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic page needs
	============================================ -->
    <title>Maxshop</title>
    <meta charset="utf-8">
    <meta name="keywords"
          content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business"/>
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow"/>

    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/frontend/ico/favicon.png">

    <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Roboto:400,500,700,900' rel='stylesheet'
          type='text/css'>

    <!-- Libs CSS
	============================================ -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/css/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/frontend/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/lib.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/js/lightslider/lightslider.css" rel="stylesheet">

    <!-- Theme CSS
    ============================================ -->
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/so-categories.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/css/themecss/so-super-category.css" rel="stylesheet">
    <link id="color_scheme" href="<?= base_url(); ?>assets/frontend/css/theme.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet">


    <!-- Include Libs & Plugins
	============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php if ($title != 'Home'): ?>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/owl-carousel/owl.carousel.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/themejs/libs.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/unveil/jquery.unveil.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/countdown/jquery.countdown.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/datetimepicker/moment.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="
    <?= base_url(); ?>assets/frontend/js/lightslider/lightslider.js"></script>
    <?php endif; ?>

    <!-- Theme files
    ============================================ -->
    <!--    	<script type="text/javascript" src="-->
    <!--        --><?php //= base_url(); ?><!--assets/frontend/js/themejs/so_megamenu.js"></script>-->
    <!--        	<script type="text/javascript" src="-->
    <!--        --><?php //= base_url(); ?><!--assets/frontend/js/themejs/addtocart.js"></script>-->
    <!--        	<script type="text/javascript" src="-->
    <!--        --><?php //= base_url(); ?><!--assets/frontend/js/themejs/application.js"></script>-->


</head>

<body class="common-home res layout-home1">
<div id="wrapper" class="wrapper-full banners-effect-7">
    <!-- Header Container  -->
    <header id="header" class=" variantleft type_1">
        <!-- Header Top -->
        <div class="header-top compact-hidden">
            <div class="container">
                <div class="row">
                    <div class="header-top-left  col-lg-4  hidden-sm col-md-5 hidden-xs">
                        <ul class="list-inlines">
                            <li class="hidden-xs">
                                <div class="welcome-msg">
                                    <ul class="list-msg">
                                        <li><label class="label-msg">This week</label> <a href="#">Sale special too good
                                                to miss in every gear</a></li>
                                        <li><label class="label-msg">Tomorrow</label> <a href="#">Laten ipsum dolor sit
                                                amet. In gravida pellen</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="header-top-right collapsed-block col-lg-8 col-sm-12 col-md-7 col-xs-12 ">
                        <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i
                                        class="fa fa-angle-down"></i></a></h5>
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                <li class="account" id="my_account">
                                    <a href="#" title="My Account" class="btn btn-xs dropdown-toggle"
                                       data-toggle="dropdown"> <span>My Account</span> <span
                                                class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu ">
                                        <?php if ($this->session->has_userdata('userloggedin')) { ?>
                                            <li><a href="<?= base_url('logout/'); ?>">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    Logout</a>
                                            </li>
                                        <?php } else { ?>
                                            <li><a href="<?= base_url('register/') ?>"><i class="fa fa-user"></i>
                                                    Register</a>
                                            </li>
                                            <li><a href="<?= base_url('login/') ?>">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    Login</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="wishlist "><a href="<?= base_url('wishlist/') ?>" id="wishlist-total"
                                                         class="top-link-wishlist" title="Wish List (2)"><span>Wish List (2)</span></a>
                                </li>
                                <li class="checkout hidden"><a href="checkout.html" class="top-link-checkout"
                                                               title="Checkout"><span>Checkout</span></a></li>
                                <li class="login hidden"><a href="cart.html"
                                                            title="Shopping Cart"><span>Shopping Cart</span></a></li>
                                <li class="form-group currency currencies-block">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon icon-credit "></span> US Dollar <span
                                                    class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu btn-xs">
                                            <li><a href="#">(€)&nbsp;Euro</a></li>
                                            <li><a href="#">(£)&nbsp;Pounds </a></li>
                                            <li><a href="#">($)&nbsp;US Dollar </a></li>
                                        </ul>
                                    </form>
                                </li>
                                <li class="form-group languages-block ">
                                    <form action="index.html" method="post" enctype="multipart/form-data"
                                          id="bt-language">
                                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <img class="lazyload" data-sizes="auto"
                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                 data-src="<?= base_url(); ?>assets/frontend/image/demo/flags/gb.png"
                                                 alt="English" title="English">
                                            <span class="">English</span>
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.html"><img class="image_flag lazyload" data-sizes="auto"
                                                                          src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                          data-src="<?= base_url(); ?>assets/frontend/image/demo/flags/gb.png"
                                                                          alt="English" title="English"/> English </a>
                                            </li>
                                            <li><a href="index.html"> <img class="image_flag lazyload" data-sizes="auto"
                                                                           src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                           data-src="<?= base_url(); ?>assets/frontend/image/demo/flags/lb.png"
                                                                           alt="Arabic" title="Arabic"/> Arabic </a>
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header Top -->
        <!-- Header center -->
        <div class="header-center">
            <div class="container">
                <div class="row">
                    <!-- LOGO -->
                    <div class="navbar-logo col-md-3 col-sm-4 col-xs-10">
                        <a href="<?= base_url('home/'); ?>"><img class="lazyload" data-sizes="auto"
                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                 data-src="<?= base_url(); ?>assets/frontend/image/demo/logos/theme_logo.png"
                                                                 title="Your Store" alt="Your Store"/></a>
                    </div>
                    <div class="header-center-right col-md-9 col-sm-8 col-xs-2">
                        <div class="responsive so-megamenu  megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="megamenu-wrapper ">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container">
                                                <ul class="megamenu " data-transition="slide" data-animationtime="250">

                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="<?= base_url('home/') ?>" class="clearfix">
                                                            <strong>MAIN PAGE</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="<?= base_url('about/') ?>" class="clearfix">
                                                            <strong>ABOUT US</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>

                                                    <li class="">
                                                        <p class="close-menu"></p>
                                                        <a href="<?= base_url('blog/') ?>" class="clearfix">
                                                            <strong>Blog</strong>
                                                            <span class="label"></span>
                                                        </a>
                                                    </li>

                                                    <li class="hidden-md color-buy">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <strong>CONTACT</strong>

                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Header center -->
        <!-- Header Bottom -->
        <div class="header-bottom compact-hidden">
            <div class="container">
                <div class="header-bottom-inner">
                    <div class="row">
                        <div class="header-bottom-left menu-vertical col-md-3 col-sm-2 col-xs-2">
                            <div class="responsive so-megamenu megamenu-style-dev">
                                <div class="so-vertical-menu no-gutter compact-hidden">
                                    <nav class="navbar-default">
                                        <div class="container-megamenu vertical open">
                                            <div id="menuHeading">
                                                <div class="megamenuToogle-wrapper">
                                                    <div class="megamenuToogle-pattern">
                                                        <div class="container">
                                                            <div>
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                            Categories
                                                            <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-header">
                                                <button type="button" id="show-verticalmenu" data-toggle="collapse"
                                                        class="navbar-toggle">
                                                    <span class="icon-bar" style="width: 12px;"></span>
                                                    <span class="icon-bar" style="width: 16px;"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>
                                            <div class="vertical-wrapper">
                                                <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <div class="container">
                                                        <ul class="megamenu">

                                                            <?php foreach ($categories as $key => $value): ?>

                                                                <li class="item-vertical css-menu with-sub-menu hover">
                                                                    <p class="close-menu"></p>
                                                                    <a href="<?= base_url('category/' . $value['id']); ?>"
                                                                       class="clearfix">
                                                                        <strong>
                                                                            <span><?= $value['title'] ?></span>
                                                                            <?php if (!empty($value['childs'])): ?>
                                                                                <b class="fa fa-angle-right"></b>
                                                                            <?php endif; ?>
                                                                        </strong>
                                                                    </a>
                                                                    <?php if (!empty($value['childs'])): ?>
                                                                        <div class="sub-menu" data-subwidth="30"
                                                                             style="width: 270px; display: none; right: 0px;">
                                                                            <div class="content" style="display: none;">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="categories ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 hover-menu">
                                                                                                    <div class="menu">
                                                                                                        <ul>

                                                                                                            <?php foreach ($value['childs'] as $key => $value): ?>
                                                                                                                <li>
                                                                                                                    <a href="<?= base_url('category/' . $value['id']); ?>"
                                                                                                                       class="main-menu"><?= $value['title'] ?>
                                                                                                                        <?php if (!empty($value['childs'])): ?>
                                                                                                                            <b class="fa fa-angle-right"></b>
                                                                                                                        <?php endif; ?>
                                                                                                                    </a>
                                                                                                                    <?php if (!empty($value['childs'])): ?>
                                                                                                                        <ul>
                                                                                                                            <?php foreach ($value['childs'] as $key => $value): ?>
                                                                                                                                <li>
                                                                                                                                    <a href="<?= base_url('category/' . $value['id']); ?>"
                                                                                                                                       class="main-menu"><?= $value['title'] ?>
                                                                                                                                        <?php if (!empty($value['childs'])): ?>
                                                                                                                                            <b class="fa fa-angle-right"></b>
                                                                                                                                        <?php endif; ?>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                            <?php endforeach; ?>
                                                                                                                        </ul>
                                                                                                                    <?php endif; ?>
                                                                                                                </li>
                                                                                                            <?php endforeach;?>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- Main menu -->
                        <div class="header-bottom-right col-md-9 col-sm-10 col-xs-10">
                            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-9 header_search">
                                <!-- Search -->
                                <div id="sosearchpro" class="search-pro">
                                    <form method="GET" action="index.html">
                                        <div id="search0" class="search input-group">
                                            <div class="select_category filter_type  icon-select">
                                                <select class="no-border" name="category_id">
                                                    <option value="0">All Category</option>
                                                    <option value="20">Desktops</option>
                                                    <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home 9
                                                    </option>

                                                    <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home 8
                                                    </option>

                                                    <option value="18">Laptops &amp; Notebooks</option>
                                                    <option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Macs</option>

                                                    <option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windows
                                                    </option>

                                                    <option value="25">Automotive</option>
                                                    <option value="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gadgets &amp;
                                                        Auto Parts
                                                    </option>

                                                    <option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;More Car
                                                        Accessories
                                                    </option>

                                                    <option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Alarms
                                                        and Security
                                                    </option>

                                                    <option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Car Audio
                                                        &amp; Speakers
                                                    </option>

                                                    <option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Printers
                                                    </option>

                                                    <option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Scanners
                                                    </option>

                                                    <option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Web Cameras
                                                    </option>
                                                    <option value="57">Mobile &amp; Tablet</option>
                                                    <option value="68">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hanet
                                                        magente
                                                    </option>

                                                    <option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Knage unget
                                                    </option>

                                                    <option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Latenge
                                                        mange
                                                    </option>

                                                    <option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Punge
                                                        nenune
                                                    </option>

                                                    <option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qunge genga
                                                    </option>

                                                    <option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tange manue
                                                    </option>

                                                    <option value="17">Electronics</option>
                                                    <option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Angene
                                                        mafin
                                                    </option>

                                                    <option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Egante
                                                        mangetes
                                                    </option>

                                                    <option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gante
                                                        extensg
                                                    </option>

                                                    <option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guntes
                                                        magesg
                                                    </option>

                                                    <option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rengae
                                                        manges
                                                    </option>

                                                    <option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sine engain
                                                    </option>

                                                    <option value="33">Apparel</option>
                                                    <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories
                                                    </option>

                                                    <option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bags</option>

                                                    <option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Computers
                                                    </option>

                                                    <option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronics
                                                    </option>

                                                    <option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fashion
                                                    </option>

                                                    <option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</option>

                                                    <option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobiles
                                                    </option>

                                                    <option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sports
                                                    </option>

                                                    <option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Watches
                                                    </option>

                                                    <option value="78">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women
                                                    </option>

                                                    <option value="34">Computer</option>
                                                    <option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Camping &amp;
                                                        Hiking
                                                    </option>

                                                    <option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cusen
                                                        mariot
                                                    </option>

                                                    <option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Denta
                                                        magela
                                                    </option>

                                                    <option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Engite
                                                        nanet
                                                    </option>

                                                    <option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Theid
                                                        cupensg
                                                    </option>

                                                    <option value="59">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verture
                                                        agoent
                                                    </option>
                                                </select>
                                            </div>

                                            <input class="autosearch-input form-control" type="text" value="" size="50"
                                                   autocomplete="off" placeholder="Search" name="search">
                                            <span class="input-group-btn">
												<button type="submit" class="button-search btn btn-primary"
                                                        name="submit_search"><i class="fa fa-search"></i></button>
												</span>
                                        </div>
                                        <input type="hidden" name="route" value="product/search"/>
                                    </form>
                                </div>
                                <!-- //end Search -->
                            </div>
                            <div class="block-cart">
                                <!--cart-->
                                <div class="shopping_cart pull-right">
                                    <div id="cart" class=" btn-group btn-shopping-cart">
                                        <a data-loading-text="Loading..." class="btn-group top_cart dropdown-toggle"
                                           data-toggle="dropdown">
                                            <div class="shopcart">
                                                <span class="handle pull-left"></span>
                                                <span class="text-shopping-cart hidden-xs">	My cart	</span>
                                                <span class="text-shopping-cart-mobi hidden-lg hidden-md hidden-sm ">
													  <i class="fa fa-cart-plus"></i>
													</span>
                                            </div>
                                        </a>
                                        <ul class="tab-content content dropdown-menu pull-right shoppingcart-box"
                                            role="menu">
                                            <li>
                                                <table class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center" style="width:70px">
                                                            <a href="product.html"> <img class="lazyload preview"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="<?= base_url(); ?>assets/frontend/image/demo/shop/product/35.jpg"
                                                                                         style="width:70px"
                                                                                         alt="Filet Mign"
                                                                                         title="Filet Mign"> </a>
                                                        </td>
                                                        <td class="text-left"><a class="cart_product_name"
                                                                                 href="product.html">Filet Mign</a></td>
                                                        <td class="text-center"> x1</td>
                                                        <td class="text-center"> $1,202.00</td>
                                                        <td class="text-right">
                                                            <a href="product.html" class="fa fa-edit"></a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a onclick="cart.remove('2');"
                                                               class="fa fa-times fa-delete"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" style="width:70px">
                                                            <a href="product.html"> <img class="lazyload preview"
                                                                                         data-sizes="auto"
                                                                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                         data-src="<?= base_url(); ?>assets/frontend/image/demo/shop/product/141.jpg"
                                                                                         style="width:70px"
                                                                                         alt="Canon EOS 5D"
                                                                                         title="Canon EOS 5D"> </a>
                                                        </td>
                                                        <td class="text-left"><a class="cart_product_name"
                                                                                 href="product.html">Canon EOS 5D</a>
                                                        </td>
                                                        <td class="text-center"> x1</td>
                                                        <td class="text-center"> $60.00</td>
                                                        <td class="text-right">
                                                            <a href="product.html" class="fa fa-edit"></a>
                                                        </td>
                                                        <td class="text-right">
                                                            <a onclick="cart.remove('1');"
                                                               class="fa fa-times fa-delete"></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                            <li>
                                                <div>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-left"><strong>Sub-Total</strong>
                                                            </td>
                                                            <td class="text-right">$1,060.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                            </td>
                                                            <td class="text-right">$2.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><strong>VAT (20%)</strong>
                                                            </td>
                                                            <td class="text-right">$200.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><strong>Total</strong>
                                                            </td>
                                                            <td class="text-right">$1,262.00</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="text-center"><a class="btn view-cart"
                                                                              href="<?= base_url('cart/') ?>"><i
                                                                    class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                                        <a class="btn btn-mega checkout-cart"
                                                           href="<?= base_url('checkout/') ?>"><i
                                                                    class="fa fa-share"></i>Checkout</a></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--//cart-->
                            </div>
                            <div class="header_custom_link hidden-xs">
                                <ul>
                                    <li><a href="<?= base_url('login/') ?>""><i class="fa fa-user"></i> Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- //end Main menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //Header Container  -->