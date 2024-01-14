<?php session_start();
require '../../db_connect.php';

// MENGAMBIL DATA SESUAI DATA EDIT PADA PARAMETER
if (isset($_GET['edit'])) {
    $nim = $_GET['edit'];
    // Query Data ANggota
    $query_Anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nim = '$nim'");
    $Data_Anggota = mysqli_fetch_array($query_Anggota);
    // =================================================================
}

// PROSES EDIT DATA
if (isset($_POST['edit'])) {
    if ($_POST['nim'] == $Data_Anggota['nim'] && $_POST['nama'] == $Data_Anggota['nama'] && $_POST['prodi'] == $Data_Anggota['prodi'] && $_POST['no_telp'] == $Data_Anggota['no_telp'] && $_POST['alamat'] == $Data_Anggota['alamat'] && $_POST['jabatan'] == $Data_Anggota['jabatan'] && $_POST['thn_jabat'] == $Data_Anggota['thn_jabat']) {
        setcookie("gagal", "Tidak ada perubahan Data", time() + 2, '/');
        header("Location:../keanggotaan.php");
    } else {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $thn_jabat = $_POST['thn_jabat'];
        $Update_Anggota = mysqli_query($koneksi, "UPDATE anggota SET nama = '$nama', prodi = '$prodi', no_telp = '$no_telp', alamat = '$alamat', jabatan = '$jabatan', thn_jabat = '$thn_jabat' WHERE nim = '$nim'");
        setcookie("success", "Data Berhasil di UPDATE", time() + 2, '/');
        header("Location:../keanggotaan.php");
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
    <title>Edit Keanggotaan | Admin Owltaku</title>
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
                        <h4 class="page-title">Edit Keanggotaan</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../keanggotaan.php">Keanggotaan</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Edit Keanggotaan</a></li>
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
                                <h4 class="card-title">Edit Keanggotaan</h4>
                                <h5 class="card-subtitle">Edit keanggotaan dari data-data keanggotaan yang terdaftar</h5>
                                <form class="mt-4 needs-validation" action="" method="POST" novalidate>
                                    <div class="form-group">
                                        <label for="NIM">NIM</label>
                                        <input type="number" class="form-control" name="nim" id="NIM" value="<?= $Data_Anggota['nim'] ?>" readonly required>
                                        <div class="invalid-feedback">
                                            NIM Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $Data_Anggota['nama'] ?>" required>
                                        <div class="invalid-feedback">
                                            Nama Lengkap Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi">Pogram Studi</label>
                                        <input type="text" class="form-control" name="prodi" id="prodi" value="<?= $Data_Anggota['prodi'] ?>" required>
                                        <div class="invalid-feedback">
                                            Program Studi Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="no_telp">No. Telepon</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" for="no_telp">+62</span>
                                            <input type="number" class="form-control" name="no_telp" id="no_telp" aria-describedby="no_telp" value="<?= $Data_Anggota['no_telp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No. Telepon</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="no_telp">+62</span>
                                            <input type="number" class="form-control" id="no_telp" aria-describedby="no_telp" value="<?= substr($Data_Anggota['no_telp'], 1) ?>" required>
                                            <div class="invalid-feedback">
                                                No. Telepon Tidak boleh kosong
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $Data_Anggota['alamat'] ?>" required>
                                        <div class="invalid-feedback">
                                            Alamat Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $Data_Anggota['jabatan'] ?>" required>
                                        <div class="invalid-feedback">
                                            Jabatan Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thn_jabat">Tahun Jabatan</label>
                                        <input type="text" class="form-control" name="thn_jabat" id="thn_jabat" value="<?= $Data_Anggota['thn_jabat'] ?>" required>
                                        <div class="invalid-feedback">
                                            Tahun Jabat Tidak boleh kosong
                                        </div>
                                        <div class="valid-feedback">
                                            Terisi
                                        </div>
                                    </div>
                                    <input type="submit" name="edit" class="btn btn-info mt-4" value="Edit Data">
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
    <script src="../assets/libs/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="../assets/libs/tablesaw/dist/tablesaw-init.js"></script>
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