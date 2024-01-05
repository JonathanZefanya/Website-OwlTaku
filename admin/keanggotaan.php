<?php session_start();

require '../db_connect.php';

// Kondisi ketika user belum login
if (!isset($_SESSION['nim'])) {
    header("Location:../login.php");
}

// Query Data ANggota
$query_Anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
// =================================================================

// PROSES HAPUS
if (isset($_GET['hapus'])) {
    $nim = $_GET['hapus'];
    $Delete_Anggota = mysqli_query($koneksi, "DELETE FROM anggota WHERE nim = '$nim'");
    if ($Delete_Anggota) {
        setcookie("success", "Berhasil menghapus data anggota dengan NIM $nim", time() + 2);
    } else {
        setcookie("gagal", "Gagal menghapus data anggota dengan NIM $nim", time() + 2);
    }
    header("Location:keanggotaan.php");
}

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
    <title>Keanggotaan | Admin Organisasikita</title>
    <!-- Custom CSS -->
    <link href="assets/libs/tablesaw/dist/tablesaw.css" rel="stylesheet">

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
                        <h4 class="page-title">Keanggotaan</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Keanggotaan</a></li>
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
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-hover">
                            <div class="card-body">
                                <h4 class="card-title">List Keanggotaan</h4>
                                <h5 class="card-subtitle">Data-data keanggotaan yang terdaftar</h5>
                                <a href="add/keanggotaan.php" class="float-right"><button class="btn btn-info">Tambah Data</button></a>
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
                                <div class="table-responsive">
                                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="columntoggle" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap>
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">NIM</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Nama Lengkap</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Program Studi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">No Telepon</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Alamat</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Jabatan</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Tahun Jabat</th>
                                                <th scope="col" width="80">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_Anggota = mysqli_fetch_array($query_Anggota)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data_Anggota['nim'] ?></td>
                                                    <td class="title"><a class="link" href="javascript:void(0)"><?= $data_Anggota['nama'] ?></a></td>
                                                    <td><?= $data_Anggota['prodi'] ?></td>
                                                    <td><?= $data_Anggota['no_telp'] ?></td>
                                                    <td><?= $data_Anggota['alamat'] ?></td>
                                                    <td><?= $data_Anggota['jabatan'] ?></td>
                                                    <td><?= $data_Anggota['thn_jabat'] ?></td>
                                                    <td>
                                                        <a href="edit/keanggotaan.php?edit=<?= $data_Anggota['nim'] ?>"><span class="fas fa-pencil-alt text-success"></span></a>
                                                        |
                                                        <a href="?hapus=<?= $data_Anggota['nim'] ?>"><span class="fas fa-trash-alt text-danger"></span></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyright &copy; 2022 ORGANISASIKITA. Designed and Developed by <a href="https://www.linkedin.com/in/agung-dwi-sahputra-36b25a17">Agung Dwi Sahputra</a>.
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
    <script src="assets/libs/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="assets/libs/tablesaw/dist/tablesaw-init.js"></script>
</body>

</html>