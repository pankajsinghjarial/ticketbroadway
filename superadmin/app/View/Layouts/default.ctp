<!DOCTYPE html>
<html lang="en">

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>Ticket Broadway - Admin</title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/skin/default_skin/css/theme.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>/img/favicon.ico">

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php echo $this->fetch('styles'); ?>
    
</head>

<body class="dashboard-page">
    <!-- -------------- Customizer -------------- -->
    <div id="customizer" class="hidden-xs">
        <div class="panel">
            <div class="panel-heading">
            <span class="panel-icon">
              <i class="fa fa-cogs"></i>
            </span>
                <span class="panel-title"> Theme Options</span>
            </div>
            <div class="panel-body pn">
                <ul class="nav nav-list nav-list-sm" role="tablist">
                    <li class="active">
                        <a href="#customizer-header" role="tab" data-toggle="tab">Navbar</a>
                    </li>
                    <li>
                        <a href="#customizer-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                    </li>
                    <li>
                        <a href="#customizer-settings" role="tab" data-toggle="tab">Misc</a>
                    </li>
                </ul>
                <div class="tab-content p20 ptn pb15">
                    <div role="tabpanel" class="tab-pane active" id="customizer-header">
                        <form id="customizer-header-skin">
                            <h6 class="mv20">Header Skins</h6>

                            <div class="customizer-sample">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-dark mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin5" checked
                                                       value="bg-dark">
                                                <label for="headerSkin5">Dark</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-warning mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin2" value="bg-warning">
                                                <label for="headerSkin2">Warning</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-danger mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin3" value="bg-danger">
                                                <label for="headerSkin3">Danger</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-success mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin4" value="bg-success">
                                                <label for="headerSkin4">Success</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-primary mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin6" value="bg-primary">
                                                <label for="headerSkin6">Primary</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-info mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin7" value="bg-info">
                                                <label for="headerSkin7">Info</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-alert mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin8" value="bg-alert">
                                                <label for="headerSkin8">Alert</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-system mb10">
                                                <input type="radio" name="headerSkin" id="headerSkin9" value="bg-system">
                                                <label for="headerSkin9">System</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="checkbox-custom checkbox-disabled fill mb10">
                                    <input type="radio" name="headerSkin" id="headerSkin1" value="bgc-light">
                                    <label for="headerSkin1">Light</label>
                                </div>
                            </div>
                        </form>
                        <form id="customizer-footer-skin">
                            <h6 class="mv20">Footer Skins</h6>

                            <div class="customizer-sample">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="checkbox-custom fill checkbox-dark mb10">
                                                <input type="radio" name="footerSkin" id="footerSkin1" checked value="">
                                                <label for="footerSkin1">Dark</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox-custom checkbox-disabled fill mb10">
                                                <input type="radio" name="footerSkin" id="footerSkin2" value="footer-light">
                                                <label for="footerSkin2">Light</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="customizer-sidebar">
                        <form id="customizer-sidebar-skin">
                            <h6 class="mv20">Sidebar Skins</h6>

                            <div class="customizer-sample">
                                <div class="checkbox-custom fill checkbox-dark mb10">
                                    <input type="radio" name="sidebarSkin" checked id="sidebarSkin2" value="">
                                    <label for="sidebarSkin2">Dark</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-disabled mb10">
                                    <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                    <label for="sidebarSkin1">Light</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="customizer-settings">
                        <form id="customizer-settings-misc">
                            <h6 class="mv20 mtn">Layout Options</h6>

                            <div class="form-group">
                                <div class="checkbox-custom fill mb10">
                                    <input type="checkbox" checked="" id="header-option">
                                    <label for="header-option">Fixed Header</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb10">
                                    <input type="checkbox" checked="" id="sidebar-option">
                                    <label for="sidebar-option">Fixed Sidebar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb10">
                                    <input type="checkbox" id="breadcrumb-option">
                                    <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb10">
                                    <input type="checkbox" id="breadcrumb-hidden">
                                    <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-group mn pb35 pt25 text-center">
                    <a href="#" id="clearAll" class="btn btn-primary btn-bordered btn-sm">Clear All</a>
                </div>
            </div>
        </div>
    </div>
    <!-- -------------- /Customizer -------------- -->

    <!-- -------------- Body Wrap  -------------- -->
    <div id="main">

        <!-- -------------- Header  -------------- -->
        <header class="navbar navbar-fixed-top bg-dark">
            <div class="navbar-logo-wrapper">
                <a class="navbar-logo-text" href="<?php echo SITE_URL;?>/dashboard">
                    <b>Ticket Broadway</b>
                </a>
                <span id="sidebar_left_toggle" class="ad ad-lines"></span>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-fuse">
                    <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                        <span class="hidden-xs"><name>Admin</name> </span>
                        <span class="fa fa-caret-down hidden-xs mr15"></span>
                        <img src="<?php echo SITE_URL;?>/img/avatars/profile_avatar.jpg" alt="avatar" class="mw55">
                    </a>
                    <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                        <li class="list-group-item">
                            <a href="<?php echo SITE_URL;?>/users/admin_profile" class="animated animated-short fadeInUp">
                                <span class="fa fa-cogs"></span> Settings </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="<?php echo SITE_URL;?>/logout" class="btn btn-primary btn-sm btn-bordered">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- -------------- /Header  -------------- -->

        <!-- -------------- Sidebar  -------------- -->
        <aside id="sidebar_left" class="nano nano-light affix">

            <!-- -------------- Sidebar Left Wrapper  -------------- -->
            <div class="sidebar-left-content nano-content">

                <!-- -------------- Sidebar Header -------------- -->
                <header class="sidebar-header">

                    <!-- -------------- Sidebar - Author -------------- -->
                    <div class="sidebar-widget author-widget">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="<?php echo SITE_URL;?>/img/avatars/profile_avatar.jpg" class="img-responsive">
                            </a>

                            <div class="media-body">
                                <div class="media-links">
                                    <a href="<?php echo SITE_URL;?>/logout">Logout</a>
                                </div>
                                <div class="media-author">Admin</div>
                            </div>
                        </div>
                    </div>

                    <!-- -------------- Sidebar - Author Menu  -------------- -->
                    <div class="sidebar-widget menu-widget">
                        <div class="row text-center mbn">
                            <div class="col-xs-2 pln prn">
                                <a href="<?php echo SITE_URL;?>/dashboard" class="text-primary" data-toggle="tooltip" data-placement="top"
                                   title="Dashboard">
                                    <span class="fa fa-dashboard"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="charts-highcharts.html" class="text-info" data-toggle="tooltip"
                                   data-placement="top" title="Stats">
                                    <span class="fa fa-bar-chart-o"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="sales-stats-products.html" class="text-system" data-toggle="tooltip"
                                   data-placement="top" title="Orders">
                                    <span class="fa fa-info-circle"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="sales-stats-purchases.html" class="text-warning" data-toggle="tooltip"
                                   data-placement="top" title="Invoices">
                                    <span class="fa fa-file"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="basic-profile.html" class="text-alert" data-toggle="tooltip" data-placement="top"
                                   title="Users">
                                    <span class="fa fa-users"></span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2 pln prn">
                                <a href="management-tools-dock.html" class="text-danger" data-toggle="tooltip"
                                   data-placement="top" title="Settings">
                                    <span class="fa fa-cogs"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                </header>
                <!-- -------------- /Sidebar Header -------------- -->

                <!-- -------------- Sidebar Menu  -------------- -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt30">Menu</li>

                    <li class="active">
                        <a href="<?php echo SITE_URL;?>/dashboard">
                            <span class="fa fa-dashboard"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL;?>/orders">
                            <span class="fa fa-file-text-o"></span>
                            <span class="sidebar-title">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL;?>/users">
                            <span class="fa fa-star-half-full"></span>
                            <span class="sidebar-title">Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL;?>/notifiedUsers">
                            <span class="fa fa-envelope-o"></span>
                            <span class="sidebar-title">Get Notified</span>
                        </a>
                    </li>
                </ul>
                <!-- -------------- /Sidebar Menu  -------------- -->

                <!-- -------------- Sidebar Hide Button -------------- -->
                <div class="sidebar-toggler">
                    <a href="#">
                        <span class="fa fa-arrow-circle-o-left"></span>
                    </a>
                </div>
                <!-- -------------- /Sidebar Hide Button -------------- -->

            </div>
            <!-- -------------- /Sidebar Left Wrapper  -------------- -->

        </aside>
        <!-- -------------- /Sidebar -------------- -->

        <!-- -------------- Main Wrapper -------------- -->
        <section id="content_wrapper">
            <!-- -------------- Topbar Menu Wrapper -------------- -->
            <div id="topbar-dropmenu-wrapper">
                <div class="topbar-menu row">
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-danger">
                            <span class="fa fa-music"></span>
                            <span class="service-title">Audio</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-success">
                            <span class="fa fa-picture-o"></span>
                            <span class="service-title">Images</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-primary">
                            <span class="fa fa-video-camera"></span>
                            <span class="service-title">Videos</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-alert">
                            <span class="fa fa-envelope"></span>
                            <span class="service-title">Messages</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-system">
                            <span class="fa fa-cog"></span>
                            <span class="service-title">Settings</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="service-box bg-dark">
                            <span class="fa fa-user"></span>
                            <span class="service-title">Users</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- -------------- /Topbar Menu Wrapper -------------- -->

            <!-- -------------- Topbar -------------- -->
            <header id="topbar" class="alt">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="<?php echo SITE_URL;?>/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-active">
                            <a href="<?php echo SITE_URL;?>/dashboard">Dashboard</a>
                        </li>
<!--
                        <li class="breadcrumb-link">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-current-item">Dashboard</li>
-->
                    </ol>
                </div>
            </header>
            <!-- -------------- /Topbar -------------- -->

            <!-- -------------- Content -------------- -->
            <section id="content" class="table-layout animated fadeIn">
                <?php echo $this->fetch('content'); ?>
            </section>
            <!-- -------------- /Content -------------- -->

            <!-- -------------- Page Footer -------------- -->
            <footer id="content-footer" class="affix">
                <div class="row">
                    <div class="col-md-6">
                        <span class="footer-legal">© 2016 All rights reserved.</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="footer-meta"></span>
                        <a href="#content" class="footer-return-top">
                            <span class="fa fa-angle-up"></span>
                        </a>
                    </div>
                </div>
            </footer>
            <!-- -------------- /Page Footer -------------- -->

        </section>
        <!-- -------------- /Main Wrapper -------------- -->

        <!-- -------------- Sidebar Right -------------- -->
        <aside id="sidebar_right" class="nano affix">

            <!-- -------------- Sidebar Right Content -------------- -->
            <div class="sidebar-right-wrapper nano-content">

                <div class="sidebar-block br-n p15">

                    <h6 class="title-divider text-muted mb20"> Visitors Stats
                    <span class="pull-right"> 2015
                      <i class="fa fa-caret-down ml5"></i>
                    </span>
                    </h6>

                    <div class="progress mh5">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 34%">
                            <span class="fs11">New visitors</span>
                        </div>
                    </div>
                    <div class="progress mh5">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 66%">
                            <span class="fs11 text-left">Returnig visitors</span>
                        </div>
                    </div>
                    <div class="progress mh5">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                             aria-valuemin="0"
                             aria-valuemax="100" style="width: 45%">
                            <span class="fs11 text-left">Orders</span>
                        </div>
                    </div>

                    <h6 class="title-divider text-muted mt30 mb10">New visitors</h6>

                    <div class="row">
                        <div class="col-xs-5">
                            <h3 class="text-primary mn pl5">350</h3>
                        </div>
                        <div class="col-xs-7 text-right">
                            <h3 class="text-warning mn">
                                <i class="fa fa-caret-down"></i> 15.7% </h3>
                        </div>
                    </div>

                    <h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>

                    <div class="row">
                        <div class="col-xs-5">
                            <h3 class="text-primary mn pl5">660</h3>
                        </div>
                        <div class="col-xs-7 text-right">
                            <h3 class="text-success-dark mn">
                                <i class="fa fa-caret-up"></i> 20.2% </h3>
                        </div>
                    </div>

                    <h6 class="title-divider text-muted mt25 mb10">Orders</h6>

                    <div class="row">
                        <div class="col-xs-5">
                            <h3 class="text-primary mn pl5">153</h3>
                        </div>
                        <div class="col-xs-7 text-right">
                            <h3 class="text-success mn">
                                <i class="fa fa-caret-up"></i> 5.3% </h3>
                        </div>
                    </div>

                    <h6 class="title-divider text-muted mt40 mb20"> Site Statistics
                        <span class="pull-right text-primary fw600">Today</span>
                    </h6>
                </div>
            </div>
        </aside>
        <!-- -------------- /Sidebar Right -------------- -->

    </div>
    <!-- -------------- /Body Wrap  -------------- -->

    <!-- -------------- Scripts -------------- -->

    <!-- -------------- jQuery -------------- -->
    <script src="<?php echo SITE_URL;?>/js/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo SITE_URL;?>/js/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- -------------- HighCharts Plugin -------------- -->
    <script src="<?php echo SITE_URL;?>/js/plugins/highcharts/highcharts.js"></script>
    <script src="<?php echo SITE_URL;?>/js/plugins/c3charts/d3.min.js"></script>
    <script src="<?php echo SITE_URL;?>/js/plugins/c3charts/c3.min.js"></script>

    <!-- -------------- Theme Scripts -------------- -->
    <script src="<?php echo SITE_URL;?>/js/utility/utility.js"></script>
    <script src="<?php echo SITE_URL;?>/js/demo/demo.js"></script>
    <script src="<?php echo SITE_URL;?>/js/main.js"></script>

    <!-- -------------- /Scripts -------------- -->
    
    <?php echo $this->fetch('scripts'); ?>
    <?php echo $this->fetch('scriptBottom');?>
    <?php echo $this->element('sql_dump');?>
</body>

</html>


