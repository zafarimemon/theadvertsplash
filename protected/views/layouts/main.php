<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- App favicon -->

        <!--Select2-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        <!-- DataTables Responsive CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        


    </head>

    <body data-sidebar="dark">
    <?php $userModel = Yii::app()->session->get('userModel'); ?>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/logoSmall.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/logo.png" alt="" height="50">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/logoSmall.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/logo.png" alt="" height="50">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                        <?php /*?>
                        <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <span key="t-megamenu">Mega Menu</span>
                                <i class="mdi mdi-chevron-down"></i> 
                            </button>
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="row">
                                    <div class="col-sm-8">
    
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-rating">Rating</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-forms">Forms</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-tables">Tables</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-charts">Charts</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="font-size-14" key="t-applications">Applications</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-ecommerce">Ecommerce</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-calendar">Calendar</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-email">Email</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-projects">Projects</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-tasks">Tasks</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-contacts">Contacts</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-4">
                                                <h5 class="font-size-14" key="t-extra-pages">Extra Pages</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-light-sidebar">Light Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-compact-sidebar">Compact Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-horizontal">Horizontal layout</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-maintenance">Maintenance</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-coming-soon">Coming Soon</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-timeline">Timeline</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-faqs">FAQs</a>
                                                    </li>
                            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-rating">Rating</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-forms">Forms</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-tables">Tables</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" key="t-charts">Charts</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-5">
                                                <div>
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/megamenu-img.png" alt="" class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php */?>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">

                        <?php /*?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/avatar-3.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">James Lemire</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/avatar-4.jpg"
                                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Salena Layfield</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php */?>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/avatar.png"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo @$userModel['name']?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/user/changepassword"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Change Password</span></a>
                                <!-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a> -->
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <!-- <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php echo Yii::app()->baseUrl?>/site/logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <?php /*?>
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end">04</span>
                                    <span key="t-dashboards">Dashboards</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="index.html" key="t-default">Default</a></li>
                                    <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                                    <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                                    <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-layout"></i>
                                    <span key="t-layouts">Layouts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a></li>
                                            <li><a href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact Sidebar</a></li>
                                            <li><a href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a></li>
                                            <li><a href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                                            <li><a href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                                            <li><a href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored Sidebar</a></li>
                                            <li><a href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                                            <li><a href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar light</a></li>
                                            <li><a href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a></li>
                                            <li><a href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                                            <li><a href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored Header</a></li>
                                            <li><a href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title" key="t-apps">Apps</li>

                            <li>
                                <a href="calendar.html" class="waves-effect">
                                    <i class="bx bx-calendar"></i>
                                    <span key="t-calendar">Calendar</span>
                                </a>
                            </li>

                            <li>
                                <a href="chat.html" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Chat</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-filemanager.html" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                    <span key="t-file-manager">File Manager</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store"></i>
                                    <span key="t-ecommerce">Ecommerce</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ecommerce-products.html" key="t-products">Products</a></li>
                                    <li><a href="ecommerce-product-detail.html" key="t-product-detail">Product Detail</a></li>
                                    <li><a href="ecommerce-orders.html" key="t-orders">Orders</a></li>
                                    <li><a href="ecommerce-customers.html" key="t-customers">Customers</a></li>
                                    <li><a href="ecommerce-cart.html" key="t-cart">Cart</a></li>
                                    <li><a href="ecommerce-checkout.html" key="t-checkout">Checkout</a></li>
                                    <li><a href="ecommerce-shops.html" key="t-shops">Shops</a></li>
                                    <li><a href="ecommerce-add-product.html" key="t-add-product">Add Product</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-bitcoin"></i>
                                    <span key="t-crypto">Crypto</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="crypto-wallet.html" key="t-wallet">Wallet</a></li>
                                    <li><a href="crypto-buy-sell.html" key="t-buy">Buy/Sell</a></li>
                                    <li><a href="crypto-exchange.html" key="t-exchange">Exchange</a></li>
                                    <li><a href="crypto-lending.html" key="t-lending">Lending</a></li>
                                    <li><a href="crypto-orders.html" key="t-orders">Orders</a></li>
                                    <li><a href="crypto-kyc-application.html" key="t-kyc">KYC Application</a></li>
                                    <li><a href="crypto-ico-landing.html" key="t-ico">ICO Landing</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-envelope"></i>
                                    <span key="t-email">Email</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="email-inbox.html" key="t-inbox">Inbox</a></li>
                                    <li><a href="email-read.html" key="t-read-email">Read Email</a></li>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <span class="badge rounded-pill badge-soft-success float-end" key="t-new">New</span>
                                            <span key="t-email-templates">Templates</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="email-template-basic.html" key="t-basic-action">Basic Action</a></li>
                                            <li><a href="email-template-alert.html" key="t-alert-email">Alert Email</a></li>
                                            <li><a href="email-template-billing.html" key="t-bill-email">Billing Email</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-receipt"></i>
                                    <span key="t-invoices">Invoices</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="invoices-list.html" key="t-invoice-list">Invoice List</a></li>
                                    <li><a href="invoices-detail.html" key="t-invoice-detail">Invoice Detail</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span key="t-projects">Projects</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="projects-grid.html" key="t-p-grid">Projects Grid</a></li>
                                    <li><a href="projects-list.html" key="t-p-list">Projects List</a></li>
                                    <li><a href="projects-overview.html" key="t-p-overview">Project Overview</a></li>
                                    <li><a href="projects-create.html" key="t-create-new">Create New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-task"></i>
                                    <span key="t-tasks">Tasks</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tasks-list.html" key="t-task-list">Task List</a></li>
                                    <li><a href="tasks-kanban.html" key="t-kanban-board">Kanban Board</a></li>
                                    <li><a href="tasks-create.html" key="t-create-task">Create Task</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-contacts">Contacts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="contacts-grid.html" key="t-user-grid">User Grid</a></li>
                                    <li><a href="contacts-list.html" key="t-user-list">User List</a></li>
                                    <li><a href="contacts-profile.html" key="t-profile">Profile</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                    <i class="bx bx-detail"></i>
                                    <span key="t-blog">Blog</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="blog-list.html" key="t-blog-list">Blog List</a></li>
                                    <li><a href="blog-grid.html" key="t-blog-grid">Blog Grid</a></li>
                                    <li><a href="blog-details.html" key="t-blog-details">Blog Details</a></li>
                                </ul>
                            </li>

                            <li class="menu-title" key="t-pages">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                                    <i class="bx bx-user-circle"></i>
                                    <span key="t-authentication">Authentication</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html" key="t-login">Login</a></li>
                                    <li><a href="auth-login-2.html" key="t-login-2">Login 2</a></li>
                                    <li><a href="auth-register.html" key="t-register">Register</a></li>
                                    <li><a href="auth-register-2.html" key="t-register-2">Register 2</a></li>
                                    <li><a href="auth-recoverpw.html" key="t-recover-password">Recover Password</a></li>
                                    <li><a href="auth-recoverpw-2.html" key="t-recover-password-2">Recover Password 2</a></li>
                                    <li><a href="auth-lock-screen.html" key="t-lock-screen">Lock Screen</a></li>
                                    <li><a href="auth-lock-screen-2.html" key="t-lock-screen-2">Lock Screen 2</a></li>
                                    <li><a href="auth-confirm-mail.html" key="t-confirm-mail">Confirm Mail</a></li>
                                    <li><a href="auth-confirm-mail-2.html" key="t-confirm-mail-2">Confirm Mail 2</a></li>
                                    <li><a href="auth-email-verification.html" key="t-email-verification">Email verification</a></li>
                                    <li><a href="auth-email-verification-2.html" key="t-email-verification-2">Email verification 2</a></li>
                                    <li><a href="auth-two-step-verification.html" key="t-two-step-verification">Two step verification</a></li>
                                    <li><a href="auth-two-step-verification-2.html" key="t-two-step-verification-2">Two step verification 2</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-utility">Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html" key="t-starter-page">Starter Page</a></li>
                                    <li><a href="pages-maintenance.html" key="t-maintenance">Maintenance</a></li>
                                    <li><a href="pages-comingsoon.html" key="t-coming-soon">Coming Soon</a></li>
                                    <li><a href="pages-timeline.html" key="t-timeline">Timeline</a></li>
                                    <li><a href="pages-faqs.html" key="t-faqs">FAQs</a></li>
                                    <li><a href="pages-pricing.html" key="t-pricing">Pricing</a></li>
                                    <li><a href="pages-404.html" key="t-error-404">Error 404</a></li>
                                    <li><a href="pages-500.html" key="t-error-500">Error 500</a></li>
                                </ul>
                            </li>

                            <li class="menu-title" key="t-components">Components</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-tone"></i>
                                    <span key="t-ui-elements">UI Elements</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ui-alerts.html" key="t-alerts">Alerts</a></li>
                                    <li><a href="ui-buttons.html" key="t-buttons">Buttons</a></li>
                                    <li><a href="ui-cards.html" key="t-cards">Cards</a></li>
                                    <li><a href="ui-carousel.html" key="t-carousel">Carousel</a></li>
                                    <li><a href="ui-dropdowns.html" key="t-dropdowns">Dropdowns</a></li>
                                    <li><a href="ui-grid.html" key="t-grid">Grid</a></li>
                                    <li><a href="ui-images.html" key="t-images">Images</a></li>
                                    <li><a href="ui-lightbox.html" key="t-lightbox">Lightbox</a></li>
                                    <li><a href="ui-modals.html" key="t-modals">Modals</a></li>
                                    <li><a href="ui-offcanvas.html" key="t-offcanvas">Offcanvas</a></li>
                                    <li><a href="ui-rangeslider.html" key="t-range-slider">Range Slider</a></li>
                                    <li><a href="ui-session-timeout.html" key="t-session-timeout">Session Timeout</a></li>
                                    <li><a href="ui-progressbars.html" key="t-progress-bars">Progress Bars</a></li>
                                    <li><a href="ui-sweet-alert.html" key="t-sweet-alert">Sweet-Alert</a></li>
                                    <li><a href="ui-tabs-accordions.html" key="t-tabs-accordions">Tabs & Accordions</a></li>
                                    <li><a href="ui-typography.html" key="t-typography">Typography</a></li>
                                    <li><a href="ui-video.html" key="t-video">Video</a></li>
                                    <li><a href="ui-general.html" key="t-general">General</a></li>
                                    <li><a href="ui-colors.html" key="t-colors">Colors</a></li>
                                    <li><a href="ui-rating.html" key="t-rating">Rating</a></li>
                                    <li><a href="ui-notifications.html" key="t-notifications">Notifications</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="bx bxs-eraser"></i>
                                    <span class="badge rounded-pill bg-danger float-end">10</span>
                                    <span key="t-forms">Forms</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="form-elements.html" key="t-form-elements">Form Elements</a></li>
                                    <li><a href="form-layouts.html" key="t-form-layouts">Form Layouts</a></li>
                                    <li><a href="form-validation.html" key="t-form-validation">Form Validation</a></li>
                                    <li><a href="form-advanced.html" key="t-form-advanced">Form Advanced</a></li>
                                    <li><a href="form-editors.html" key="t-form-editors">Form Editors</a></li>
                                    <li><a href="form-uploads.html" key="t-form-upload">Form File Upload</a></li>
                                    <li><a href="form-xeditable.html" key="t-form-xeditable">Form Xeditable</a></li>
                                    <li><a href="form-repeater.html" key="t-form-repeater">Form Repeater</a></li>
                                    <li><a href="form-wizard.html" key="t-form-wizard">Form Wizard</a></li>
                                    <li><a href="form-mask.html" key="t-form-mask">Form Mask</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-tables">Tables</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="tables-basic.html" key="t-basic-tables">Basic Tables</a></li>
                                    <li><a href="tables-datatable.html" key="t-data-tables">Data Tables</a></li>
                                    <li><a href="tables-responsive.html" key="t-responsive-table">Responsive Table</a></li>
                                    <li><a href="tables-editable.html" key="t-editable-table">Editable Table</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-bar-chart-alt-2"></i>
                                    <span key="t-charts">Charts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="charts-apex.html" key="t-apex-charts">Apex Charts</a></li>
                                    <li><a href="charts-echart.html" key="t-e-charts">E Charts</a></li>
                                    <li><a href="charts-chartjs.html" key="t-chartjs-charts">Chartjs Charts</a></li>
                                    <li><a href="charts-flot.html" key="t-flot-charts">Flot Charts</a></li>
                                    <li><a href="charts-tui.html" key="t-ui-charts">Toast UI Charts</a></li>
                                    <li><a href="charts-knob.html" key="t-knob-charts">Jquery Knob Charts</a></li>
                                    <li><a href="charts-sparkline.html" key="t-sparkline-charts">Sparkline Charts</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-aperture"></i>
                                    <span key="t-icons">Icons</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="icons-boxicons.html" key="t-boxicons">Boxicons</a></li>
                                    <li><a href="icons-materialdesign.html" key="t-material-design">Material Design</a></li>
                                    <li><a href="icons-dripicons.html" key="t-dripicons">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html" key="t-font-awesome">Font awesome</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-map"></i>
                                    <span key="t-maps">Maps</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="maps-google.html" key="t-g-maps">Google Maps</a></li>
                                    <li><a href="maps-vector.html" key="t-v-maps">Vector Maps</a></li>
                                    <li><a href="maps-leaflet.html" key="t-l-maps">Leaflet Maps</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-share-alt"></i>
                                    <span key="t-multi-level">Multi Level</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" key="t-level-1-1">Level 1.1</a></li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Level 1.2</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="javascript: void(0);" key="t-level-2-1">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);" key="t-level-2-2">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                        <?php */?>

                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li>
                                <a href="<?php echo Yii::app()->baseUrl?>/dashboard" class="waves-effect">
                                    <i class="fas fa-ad"></i>
                                    <span key="t-chat">Dashboard</span>
                                </a>
                            </li>
                            <?php if($userModel['user_type']!='webmaster'){?>
                            <li>
                                <a href="<?php echo Yii::app()->baseUrl?>/user" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Users</span>
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="<?php echo Yii::app()->baseUrl?>/sites" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Sites</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo Yii::app()->baseUrl?>/apps" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Apps</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php //echo Yii::app()->baseUrl?>/campaigns" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Campaigns</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo Yii::app()->baseUrl?>/statistics" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Statistics</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php //echo Yii::app()->baseUrl?>/payments" class="waves-effect">
                                    <i class="bx bx-chat"></i>
                                    <span key="t-chat">Payments</span>
                                </a>
                            </li> -->
                            <?php if($userModel['user_type']!='webmaster'){?>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl?>/reports/upload" class="waves-effect">
                                        <i class="bx bx-chat"></i>
                                        <span key="t-chat">Upload Report</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl?>/reports/uploadapp" class="waves-effect">
                                        <i class="bx bx-chat"></i>
                                        <span key="t-chat">Upload Report - App</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl?>/reports/delete" class="waves-effect">
                                        <i class="bx bx-chat"></i>
                                        <span key="t-chat">Delete Report</span>
                                    </a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <?php echo $content?>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © TheAdvertSplash.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by TheAdvertSplash
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script type="text/javascript">
            var baseUrl = '<?php echo Yii::app()->baseUrl?>';
            var controller = '<?php echo Yii::app()->controller->id?>';
            var controllerAction = '<?php echo Yii::app()->controller->action->id?>';
        </script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/app.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


        <!-- DataTables JavaScript -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->

        <!--select2-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/libs/select2/js/select2.min.js"></script>
        <script type="text/javascript">
            $('input[name="daterange"]').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                  format: 'YYYY-MM-DD'
                },
                "alwaysShowCalendars": true,
                //"startDate": moment(),
                //"endDate": moment().add(1, 'days')
            }, function(start, end, label) {
              //console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });

            $('#dataTables').DataTable({
              "pageLength": 25
            });
            $(".select2").select2();
        </script>
        
    </body>

</html>