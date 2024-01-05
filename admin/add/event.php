<?php session_start();
require '../../db_connect.php';

// PROSES TAMBAH DATA
if (isset($_POST['tambah'])) {
    $nama_event = $_POST['nama_event'];
    $tema_event = $_POST['tema_event'];
    $deskripsi = $_POST['deskripsi'];
    $waktu = $_POST['waktu'];
    $tanggal = $_POST['tanggal'];
    $tempat = $_POST['tempat'];
    $link_daftar = $_POST['link_daftar'];
    // Menggabungkan Data Pemateri
    $pemateri = '';
    for ($i = 0; $i < count($_POST['pemateri']); $i++) {
        if ($i == count($_POST['pemateri']) - 1) {
            $pemateri .= $_POST['pemateri'][$i]['pemateri'];
        } else {
            $pemateri .= $_POST['pemateri'][$i]['pemateri'] . "|";
        }
    }
    // =====================================

    $Update_Event = mysqli_query($koneksi, "INSERT INTO tb_event VALUES ('','$nama_event','$tema_event','$pemateri','$deskripsi','$waktu','$tanggal','$tempat','$link_daftar','belum')");
    if ($Update_Event) {
        setcookie("success", "Data Berhasil di TAMBAH", time() + 2, '/');
        header("Location:../event.php");
    } else {
        setcookie("gagal", "Gagal menambahkan Data", time() + 2, '/');
        header("Location:../event.php");
    }
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/imgs/Lingkar_LOGO.png">
    <title>Tambah Event | Admin Organisasikita</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/tablesaw/dist/tablesaw.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="../assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
        <?php require '../nav_top.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php require '../nav_left.php'; ?>
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
                        <h4 class="page-title">Tambah Event</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../event.php">Event</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Tambah Event</a></li>
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
                                <h4 class="card-title">Tambah Event</h4>
                                <h5 class="card-subtitle">Tambah event yang menyesuaikan Prokey yang telah dibuat</h5>
                                <form class="mt-4 needs-validation" action="" method="POST" novalidate>
                                    <div class="form-group">
                                        <label for="nama_event">Nama Event</label>
                                        <input type="text" class="form-control" name="nama_event" id="nama_event" placeholder="Masukan Nama Event" required>
                                        <div class="invalid-feedback">
                                            Nama Event Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tema_event">Tema Event</label>
                                        <input type="text" class="form-control" name="tema_event" id="tema_event" placeholder="Masukan Tema Event" required>
                                        <div class="invalid-feedback">
                                            Tema Event Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="email-repeater form-group">
                                        <div data-repeater-list="pemateri">
                                            <label for="pemateri">Pemateri</label>

                                            <div data-repeater-item class="row m-b-15">
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="pemateri" id="pemateri" placeholder="Masukan Pemateri" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                Pemateri Tidak boleh kosong
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">Add Pemateri
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <div class="input-group-prepend">
                                            <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" required></textarea>
                                            <div class="invalid-feedback">
                                                Deskripsi Tidak boleh kosong
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu">Waktu</label>
                                        <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Masukan Waktu. Contoh : 09.00 s/d Selesai" required>
                                        <div class="invalid-feedback">
                                            Waktu Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Masukan Nama Tanggal. Contoh : 13 Juli 2022" required>
                                        <div class="invalid-feedback">
                                            Tanggal Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat">Tempat</label>
                                        <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukan Tempat. Contoh : Zoom Meeting" required>
                                        <div class="invalid-feedback">
                                            Tempat Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="link_daftar">Link Pendaftaran</label>
                                        <input type="text" class="form-control" name="link_daftar" id="link_daftar" placeholder="Masukan Link Pendaftaran. Contoh : link gform" required>
                                        <div class="invalid-feedback">
                                            Link Daftar Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <input type="submit" name="tambah" class="btn btn-info mt-4" value="Tambah Data">
                                </form>
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="../assets/extra-libs/jquery.repeater/repeater-init.js"></script>
    <script src="../assets/extra-libs/jquery.repeater/dff.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>