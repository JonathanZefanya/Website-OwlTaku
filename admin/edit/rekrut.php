<?php session_start();
require '../../db_connect.php';

// MENGAMBIL DATA SESUAI DATA EDIT PADA PARAMETER
if (isset($_GET['edit'])) {
    $nim = $_GET['edit'];
    // Query Data ANggota
    $query_Reqruitment = mysqli_query($koneksi, "SELECT * FROM reqruitment WHERE nim = '$nim'");
    $data_Reqruitment = mysqli_fetch_array($query_Reqruitment);
    // =================================================================
}

// PROSES EDIT DATA
if (isset($_POST['edit'])) {
    if ($_POST['nim'] == $data_Reqruitment['nim'] && $_POST['nama'] == $data_Reqruitment['nama'] && $_POST['prodi'] == $data_Reqruitment['prodi'] && $_POST['no_telp'] == $data_Reqruitment['no_telp'] && $_POST['alamat'] == $data_Reqruitment['alamat'] && $_POST['hobi'] == $data_Reqruitment['hobi'] && $_POST['motivasi'] == $data_Reqruitment['motivasi'] &&  $_POST['status'] == $data_Reqruitment['status']) {
        setcookie("gagal", "Tidak ada perubahan Data", time() + 2, '/');
        header("Location:rekrut.php?edit=" . $nim);
    } else {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $hobi = $_POST['hobi'];
        $motivasi = $_POST['motivasi'];
        $status = $_POST['status'];

        mysqli_query($koneksi, "UPDATE reqruitment SET nim = '$nim', nama = '$nama', prodi = '$prodi', no_telp = '$no_telp', alamat = '$alamat', hobi = '$hobi', motivasi = '$motivasi', status = '$status' WHERE nim = '$nim'");
        setcookie("sucsess", "Berhasil di Update", time() + 2, '/');
        header("Location:../rekrut.php");
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
    <title>Edit Keanggotaan Baru | Admin Owltaku</title>
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
                        <h4 class="page-title">Edit Keanggotaan Baru</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../keanggotaan.php">Keanggotaan Baru</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Edit Keanggotaan Baru</a></li>
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
                                <h4 class="card-title">Edit Keanggotaan Baru</h4>
                                <h5 class="card-subtitle">Edit Keanggotaan Baru dari data-data Keanggotaan Baru yang terdaftar</h5>
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
                                <form class="mt-4 needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-6 px-3">
                                            <div class="form-group">
                                                <label for="NIM">NIM</label>
                                                <input type="number" class="form-control" name="nim" id="NIM" value="<?= $data_Reqruitment['nim'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan NIM
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_Reqruitment['nama'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan Nama Lengkap
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi">Pogram Studi</label>
                                                <input type="text" class="form-control" name="prodi" id="prodi" value="<?= $data_Reqruitment['prodi'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan Program Studi
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">No. Telepon</label>
                                                <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $data_Reqruitment['no_telp'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan No.Telepon
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $data_Reqruitment['alamat'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan Alamat
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hobi">Hobi</label>
                                                <input type="text" class="form-control" name="hobi" id="hobi" value="<?= $data_Reqruitment['hobi'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukan Hobby
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-3">
                                            <div class="email-repeater form-group">
                                                <div data-repeater-list="sertifikat_organisasi">
                                                    <label for="sertifikat_organisasi">Sertifikat Organisasi</label>
                                                    <?php
                                                    $exp_Reqruitment = explode('|', $data_Reqruitment['sertifikat_organisasi']);
                                                    for ($i = 0; $i < count($exp_Reqruitment); $i++) {
                                                    ?>
                                                        <div data-repeater-item class="row m-b-15">
                                                            <input type="text" class="form-control" name="sertifikat_organisasi" id="sertifikat_organisasi" value="<?= $exp_Reqruitment[$i] ?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Sertifikat Organisasi Tidak boleh kosong
                                                        </div>
                                                        <div class="valid-feedback">
                                                            Terisi
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="email-repeater form-group">
                                                <div data-repeater-list="pengalaman_organisasi">
                                                    <label for="pengalaman_organisasi">Sertifikat Prestasi (2 Tahun kebelakang)</label>
                                                    <?php
                                                    $exp_Prestasi = explode('|', $data_Reqruitment['pengalaman_organisasi']);
                                                    for ($i = 0; $i < count($exp_Prestasi); $i++) {
                                                    ?>
                                                        <div data-repeater-item class="row m-b-15">
                                                            <input type="text" class="form-control" name="sertifikat_organisasi" id="sertifikat_organisasi" value="<?= $exp_Prestasi[$i] ?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Pengalaman Organisasi Tidak boleh kosong
                                                        </div>
                                                        <div class="valid-feedback">
                                                            Terisi
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <p class="text-danger">** Masukan berkas file berekstensi jpg, jpeg, dan png</p>
                                            <div class="form-group">
                                                <label for="motivasi">Motivasi</label>
                                                <div class="input-group-prepend">
                                                    <textarea class="form-control" rows="6" name="motivasi" id="motivasi" required><?= $data_Reqruitment['motivasi'] ?></textarea>
                                                    <div class="invalid-feedback">
                                                        Motivasi Tidak boleh kosong
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Terisi
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="select2 form-control custom-select" name="status" id="status" required style="width: 100%; height:36px;">
                                                    <option><?= $data_Reqruitment['status'] ?></option>
                                                    <option value="Lolos">Lolos</option>
                                                    <option value="Tidak Lolos">Tidak Lolos</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Masukan Status
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
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