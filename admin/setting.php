<?php session_start();

require '../db_connect.php';

// Kondisi ketika user belum login
if (!isset($_SESSION['nim'])) {
    header("Location:../login.php");
}

// Query Data ANggota
$nim = $_SESSION['nim'];
$query_Anggota = mysqli_query($koneksi, "SELECT * FROM admin WHERE nim = '$nim'");
$Data_Anggota = mysqli_fetch_array($query_Anggota);
// =================================================================

// PROSES EDIT DATA
if (isset($_POST['edit'])) {
    if ($_POST['nim'] == $Data_Anggota['nim'] && $_POST['nama'] == $Data_Anggota['nama'] && $_POST['prodi'] == $Data_Anggota['prodi'] && $_POST['no_telp'] == $Data_Anggota['no_telp'] && $_POST['alamat'] == $Data_Anggota['alamat'] && $_POST['username'] == $Data_Anggota['username'] && $_POST['password'] == $Data_Anggota['password']) {
        setcookie("gagal", "Tidak ada perubahan Data", time() + 2, '/');
        header("Location:setting.php");
    } else {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Update_Anggota = mysqli_query($koneksi, "UPDATE admin SET nama = '$nama', prodi = '$prodi', no_telp = '$no_telp', alamat = '$alamat', username = '$username', password = '$password' WHERE nim = '$nim'");
        setcookie("success", "Data Berhasil di UPDATE", time() + 2, '/');
        header("Location:setting.php");
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/imgs/Lingkar_LOGO.png">
    <title>Setting Akun | Admin Organisasikita</title>
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
                        <h4 class="page-title">Setting Akun</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Setting</a></li>
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
                                <h4 class="card-title">Setting Akun</h4>
                                <h5 class="card-subtitle">Data-data Akun</h5>
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

                                <form class="mt-4" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="NIM">NIM</label>
                                                <input type="number" class="form-control" name="nim" id="NIM" value="<?= $Data_Anggota['nim'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $Data_Anggota['nama'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="prodi">Pogram Studi</label>
                                                <input type="text" class="form-control" name="prodi" id="prodi" value="<?= $Data_Anggota['prodi'] ?>">
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
                                                    <input type="number" class="form-control" id="no_telp" aria-describedby="no_telp" value="<?= substr($Data_Anggota['no_telp'], 1) ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $Data_Anggota['alamat'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" value="<?= $Data_Anggota['username'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control" name="password" id="password" value="<?= $Data_Anggota['password'] ?>">
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