<?php session_start();
require '../db_connect.php';

// Kondisi ketika user belum login
if (!isset($_SESSION['nim'])) {
    header("Location:../index.php");
}

// Query Data ANggota
$query_Anggota5 = mysqli_query($koneksi, "SELECT * FROM anggota LIMIT 5");
$query_Anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$Jml_Anggota = mysqli_num_rows($query_Anggota);
// =================================================================
// Query Data Admin
$query_Admin = mysqli_query($koneksi, "SELECT * FROM admin");
$Jml_Admin = mysqli_num_rows($query_Admin);
// =================================================================
// Query Data Event
$query_Event = mysqli_query($koneksi, "SELECT * FROM tb_event WHERE status = 'belum' LIMIT 2");
// =================================================================
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/imgs/Lingkar_LOGO.png">
    <title>Dashboard | Admin OWLTAKU</title>
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php require 'nav_top.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require 'nav_left.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php
                if (isset($_COOKIE['gagal'])) {
                    echo '<script>swal({   
                                        title: "<b>Gagal!!</b><br><h4>' . $_COOKIE['gagal'] . '</h4>",   
                                        text: "Akan di tutup otomatis selama 3 detik",   
                                        timer: 3000,   
                                        showConfirmButton: true 
                                    })</script>';
                } else if (isset($_COOKIE['success'])) {
                    echo '<script>swal("Berhasil!", "' . $_COOKIE['success'] . '", "success")</script>';
                }
                ?>
                <!-- ============================================================== -->
                <!-- Keanggotaan -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card card-hover">
                            <div class="card-body">
                                <h4 class="card-title">List Keanggotaan</h4>
                                <h5 class="card-subtitle">Data-data keanggotaan yang terdaftar</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-warning text-light">
                                            <tr>
                                                <th>NIM</th>
                                                <th>Nama Lengkap</th>
                                                <th>Program Studi</th>
                                                <th>No Telepon</th>
                                                <th>Jabatan</th>
                                                <th>Tahun Jabat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_Anggota = mysqli_fetch_array($query_Anggota5)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data_Anggota['nim'] ?></td>
                                                    <td class="title"><a class="link" href="javascript:void(0)"><?= $data_Anggota['nama'] ?></a></td>
                                                    <td><?= $data_Anggota['prodi'] ?></td>
                                                    <td><?= $data_Anggota['no_telp'] ?></td>
                                                    <td><?= $data_Anggota['jabatan'] ?></td>
                                                    <td><?= $data_Anggota['thn_jabat'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="keanggotaan.php"><button class="btn btn-warning d-block mx-auto w-50 mt-4">Selengkapnya</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-6">
                        <div class="card card-hover">
                            <div class="card-body" style="background:url(assets/images/background/active-bg.png) no-repeat top center;">
                                <div class="pt-3 text-center">
                                    <i class="mdi mdi-account-star-variant display-5 text-orange d-block"></i>
                                    <span class="display-6 d-block font-medium"><?= $Jml_Admin ?></span>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card card-hover">
                            <div class="card-body" style="background:url(assets/images/background/active-bg.png) no-repeat top center;">
                                <div class="pt-3 text-center">
                                    <i class="mdi mdi-account-location display-5 text-orange d-block"></i>
                                    <span class="display-6 d-block font-medium"><?= $Jml_Anggota ?></span>
                                    <h5>Anggota Aktif</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Keanggotaan -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Event -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <?php
                    while ($Data_Event = mysqli_fetch_array($query_Event)) {
                    ?>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active flex-column">
                                                    <p class="text-warning font-bold"><?= $Data_Event['tanggal'] ?></p>
                                                    <h3 class="text-white font-medium">Join NOW !!</h3>
                                                </div>
                                                <?php
                                                $no = 1;
                                                $exp_Event = explode('|', $Data_Event['pemateri']);
                                                for ($i = 0; $i < count($exp_Event); $i++) {
                                                ?>
                                                    <div class="carousel-item flex-column">
                                                        <p class="text-warning font-bold">Pemateri <?= $no ?></p>
                                                        <h3 class="text-white font-medium"><?= $exp_Event[$i] ?></h3>
                                                    </div>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center mb-3">
                                        <span><i class="ti-calendar"></i> <?= $Data_Event['tanggal'] ?></span>
                                        <!-- <div class="ml-auto">
                                            <a href="javascript:void(0)" class="link"><i class="ti-alarm-clock"></i> 100 Ingatkan</a>
                                        </div> -->
                                    </div>
                                    <h3 class="font-normal"><?= $Data_Event['nama_event'] ?></h3>
                                    <p class="mb-0 mt-2 text-justify">
                                        <?php
                                        echo (str_word_count($Data_Event['deskripsi']) > 70 ? substr($Data_Event['deskripsi'], 0, 300) . "... <a href='../event/detail.php?kode_event=" . $Data_Event['kode_event'] . "'>[selengkapnya]</a>" : $Data_Event['deskripsi']);
                                        ?>
                                    </p>
                                    <br>
                                    <a href="<?= $Data_Event['link_daftar'] ?>"><button class="btn btn-warning btn-rounded waves-effect waves-light mt-2 w-100">Daftar Sekarang</button></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="col-lg-4 align-content-center align-self-center">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 220px 0;">
                                <a href="event.php">
                                    <h5>Selengkapnya<i class="ti-angle-right"></i></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Event -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyright &copy; 2023 OWLTAKU. Designed and Developed by <a href="https://github.com/JonathanZefanya">Jonathan Natannael Zefanya</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>