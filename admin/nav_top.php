<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="../index.php">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="<?= $host ?>/assets/imgs/Lingkar_LOGO.png" alt="homepage" class="dark-logo" width="40" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text" style="color: #FFA500; font-weight: bold;">
                <link href="https://fonts.cdnfonts.com/css/arbutus-slab" rel="stylesheet">
                    <!-- dark Logo text -->
                    <span class="text-orange">OWLTAKU</span>
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $host ?>/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <span class="with-arrow"><span class="bg-primary"></span></span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                            <div class=""><img src="<?= $host ?>/admin/assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                            <div class="ml-2">
                                <h4 class="mb-0"><?= $_SESSION['nama'] ?></h4>
                                <p class=" mb-0"><?= $_SESSION['nim'] ?></p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= $host ?>admin/setting.php"><i class="ti-settings mr-1 ml-1"></i> Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= $host ?>admin/logout.php"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>