<?php session_start();

require '../db_connect.php';

// Kondisi ketika user belum login
if (!isset($_SESSION['nim'])) {
    header("Location:../login.php");
}

// Query Data Event
$query_Event = mysqli_query($koneksi, "SELECT * FROM tb_event");
// =================================================================

// PROSES HAPUS
if (isset($_GET['hapus'])) {
    $kode_event = $_GET['hapus'];
    $Delete_Event = mysqli_query($koneksi, "DELETE FROM tb_event WHERE kode_event = '$kode_event'");
    if ($Delete_Event) {
        setcookie("success", "Berhasil menghapus data event dengan kode event $kode_event", time() + 2);
    } else {
        setcookie("gagal", "Gagal menghapus data event dengan kode event $kode_event", time() + 2);
    }
    header("Location:event.php");
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
    <title>Event | Admin Organisasikita</title>
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
                        <h4 class="page-title">List Event</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">List Event</a></li>
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
                                <h4 class="card-title">List Event</h4>
                                <h5 class="card-subtitle">Data-data event yang terbuat</h5>
                                <a href="add/event.php" class="float-right"><button class="btn btn-info">Tambah Data</button></a>
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
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="1">Nama</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Tema</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Pemateri</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Deksripsi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Waktu</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Tempat</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Status</th>
                                                <th scope="col" width="80">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_Event = mysqli_fetch_array($query_Event)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data_Event['nama_event'] ?></td>
                                                    <td class="title"><a class="link" href="javascript:void(0)"><?= $data_Event['tema_event'] ?></a></td>
                                                    <td><?= $data_Event['pemateri'] ?></td>
                                                    <td><?= str_word_count($data_Event['deskripsi']) > 70 ? substr($data_Event['deskripsi'], 0, 200) . " [...]" : $data_Event['deskripsi'] ?></td>
                                                    <td><?= $data_Event['tanggal'] . ", " . $data_Event['waktu'] ?></td>
                                                    <td><?= $data_Event['tempat'] ?></td>
                                                    <td><?= $data_Event['status'] ?></td>
                                                    <td>
                                                        <a href="edit/event.php?edit=<?= $data_Event['kode_event'] ?>"><span class="fas fa-pencil-alt text-success"></span></a>
                                                        |
                                                        <a href="?hapus=<?= $data_Event['kode_event'] ?>"><span class="fas fa-trash-alt text-danger"></span></a>
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
    <script src="assets/libs/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="assets/libs/tablesaw/dist/tablesaw-init.js"></script>
</body>

</html>