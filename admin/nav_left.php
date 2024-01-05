<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="<?= $host ?>/admin/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium"><?= $_SESSION['nama'] ?> <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"><?= $_SESSION['nim'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="setting.php"><i class="ti-settings mr-1 ml-1"></i> Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Menu</span></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?= $host ?>admin/index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?= $host ?>admin/keanggotaan.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Keanggotaan </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?= $host ?>admin/event.php" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Kegiatan / Event </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?= $host ?>admin/rekrut.php" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Rekrut Anggota </span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>