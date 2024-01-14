<?php session_start();

require '../db_connect.php';

// Kondisi ketika user belum login
if (!isset($_SESSION['nim'])) {
    header("Location:../login.php");
}

// Query Data Rekrut
$query_Rekrut = mysqli_query($koneksi, "SELECT * FROM reqruitment ORDER BY nilai_akhir DESC");
// =================================================================

if (isset($_POST['nilai'])) {
    $nim = $_POST['nim'];
    $nilai = $_POST['nilai'];

    $value_m = ($nilai * (0.3));
    $alternative = $data_Rekrut['nilai_akhir'] + $value_m;
    // var_dump("P : " . $value_p);
    // var_dump("S : " . $value_s);
    // var_dump($alternative); nilai AKHIR CPI
    // echo $alternative;

    $query_Nilai = mysqli_query($koneksi, "UPDATE reqruitment SET nilai = '$nilai',nilai_akhir = '$alternative' WHERE nim = '$nim'");
    setcookie("success", "Berhasil Memasukan Nilai Motivasi", time() + 2);
    header("Location:rekrut.php");
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
    <title>Reqruitment | Admin Owltaku</title>
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
                        <h4 class="page-title">Reqruitment</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Reqruitment</a></li>
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
                                <h4 class="card-title">List Reqruitment</h4>
                                <h5 class="card-subtitle">Data-data keanggotaan yang melakukan pendaftaran</h5>
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
                                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="columntoggle" data-tablesaw-sortable-switch data-tablesaw-minimap>
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">NIM</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Nama Lengkap</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Program Studi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">No Telepon</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Alamat</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Hobi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Sertifikat Organisasi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">Pengalaman Organisasi</th>
                                                <th colspan="2" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">Motivasi</th>
                                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">Nilai Akhir</th>
                                                <th>Status</th>
                                                <th width="80">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_Rekrut = mysqli_fetch_array($query_Rekrut)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data_Rekrut['nim'] ?></td>
                                                    <td class="title"><a class="link" href="javascript:void(0)"><?= $data_Rekrut['nama'] ?></a></td>
                                                    <td><?= $data_Rekrut['prodi'] ?></td>
                                                    <td><?= $data_Rekrut['no_telp'] ?></td>
                                                    <td><?= $data_Rekrut['alamat'] ?></td>
                                                    <td><?= $data_Rekrut['hobi'] ?></td>
                                                    <td>
                                                        <?php
                                                        $exp_Sertif = explode("|", $data_Rekrut['sertifikat_organisasi']);
                                                        for ($i = 0; $i < count($exp_Sertif); $i++) {
                                                            echo '<img width="100" class="img-rounded d-inline-flex" src="' . $host . 'assets/imgs/sertifikat/' . $exp_Sertif[$i] . '" alt="' . $exp_Sertif[$i] . '"><br>';
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        $exp_Pengalaman = explode("|", $data_Rekrut['pengalaman_organisasi']);
                                                        for ($i = 0; $i < count($exp_Pengalaman); $i++) {
                                                            echo '<img width="100" class="img-rounded d-inline-flex" src="' . $host . 'assets/imgs/sertifikat/' . $exp_Pengalaman[$i] . '" alt="' . $exp_Pengalaman[$i] . '"><br>';
                                                        }
                                                        ?></td>
                                                    <td><?= $data_Rekrut['motivasi'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($data_Rekrut['nilai'] == 0) {
                                                        ?>
                                                            <form action="" method="POST">
                                                                <input type="number" name="nim" value="<?= $data_Rekrut['nim'] ?>" style="width: 50px;" hidden>
                                                                <input class="form-control p-1" type="number" name="nilai" placeholder="Isi Nilai Motivasi" min="0" max="100" style="width: 50px;">
                                                                <input type="submit" class="btn btn-sm btn-info" name="nilai_B" value="Nilai">
                                                            </form>
                                                        <?php
                                                        } else {
                                                            echo $data_Rekrut['nilai'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $data_Rekrut['nilai_akhir'] ?>
                                                    </td>
                                                    <td><?= $data_Rekrut['status'] ?></td>
                                                    <td>
                                                        <a href="edit/rekrut.php?edit=<?= $data_Rekrut['nim'] ?>"><span class="fas fa-pencil-alt text-success"></span></a>
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