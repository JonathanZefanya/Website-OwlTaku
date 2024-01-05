<?php
require '../db_connect.php';

$kode_event = $_GET['kode_event'];
// Query Data Event
$query_Event = mysqli_query($koneksi, "SELECT * FROM tb_event WHERE status = 'belum' AND kode_event = '$kode_event'");
$Data_Event = mysqli_fetch_array($query_Event);
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
    <title>OWLTAKU</title>
    <!-- Custom CSS -->
    <link href="../admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        section#home {
            padding-top: 200px;
            background-color: #007bff;
        }

        section#about {
            background-color: #28a74647;
        }

        section#event {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .textabout {
            position: relative;
            top: -30%;
            margin: 20px;
            font-size: medium;
        }
    </style>
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
        <!-- NAVIGASI -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/imgs/LOGO.png" width="150" alt="Logo OWLTAKU">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto font-bold font-16">
                        <li class="nav-item">
                            <a class="nav-link" href="../#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#member">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#team">Event</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====================== -->

        <!-- CARD DESKRIPSI -->
        <div class="container" style="padding-top: 150px;">
            <div class="row">
                <div class="col">
                    <div class="card-hover rounded bg-light rounded">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center mb-3">
                                <span><i class="ti-calendar"></i> <?= $Data_Event['tanggal'] ?></span>
                            </div>
                            <h3 class="font-bold mt-4"><?= $Data_Event['nama_event'] ?></h3>
                            <p class="mb-0 mt-3 text-justify">
                                <?php
                                echo $Data_Event['deskripsi'];
                                ?>
                                <br><br>
                                Event Akan dilaksanakan pada :<br>
                                <i class="mdi mdi-calendar-check text-warning font-22"></i>Hari/Tanggal : <?= $Data_Event['tanggal'] ?><br>
                                <i class="mdi mdi-clock text-warning font-22"></i>Jam : <?= $Data_Event['waktu'] ?><br>
                                <i class="mdi mdi-clock text-warning font-22"></i>Tempat : <?= $Data_Event['tempat'] ?>
                                <br><br>
                                Narasumber :<br>
                                <?php
                                $no = 1;
                                $exp_Event = explode('|', $Data_Event['pemateri']);
                                for ($i = 0; $i < count($exp_Event); $i++) {
                                ?>
                                    <?= $no . ". " . $exp_Event[$i] ?>
                                    <br>
                                <?php
                                    $no++;
                                }
                                ?>
                            </p>
                            <br><br>
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdMqEOa5Oc7C85isewakOoy95FtgeP44_vxU5BLCZr8AQxgHQ/viewform"><button class="btn btn-warning btn-rounded waves-effect waves-light mt-2 w-100">Daftar Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================= -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../admin/dist/js/app.min.js"></script>
    <script src="../admin/dist/js/app.init.js"></script>
    <script src="../admin/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartjs -->
    <script src="../admin/dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>