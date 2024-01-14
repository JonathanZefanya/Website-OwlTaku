<?php session_start();
require 'db_connect.php';

// Query Data Event
$query_Anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
// =================================================================
// Query Data Event
$query_Event = mysqli_query($koneksi, "SELECT * FROM tb_event WHERE status = 'belum'");
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/imgs/Lingkar_LOGO.png">
    <title>OWLTAKU</title>
    <!-- Custom CSS -->
    <link href="admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="admin/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>

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
                    <img src="assets/imgs/LOGO.png" width="80" alt="Logo OWLTAKU">
                    <span class="font-bold font-20">OWLTAKU</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto font-bold font-16">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#anggota">Pengurus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#event">Event</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====================== -->

        <!-- Notifikasi -->
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
        <!-- ========================== -->

        <!-- BAGIAN HOME -->
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-light">
                        <h1>OWLTAKU</h1>
                        <h5>Sistem Informasi UKM Owltaku</h5>
                        <p>UKM ITI Jepang Owltaku adalah sebuah wadah yang eksklusif dan dinamis bagi para mahasiswa yang berminat dan memiliki ketertarikan dalam budaya populer Jepang, terutama dalam bidang hiburan, teknologi, dan inovasi. Nama "Owltaku" sendiri menggambarkan keunikan dan keberagaman anggota, yang memiliki semangat keilmuan layaknya burung hantu yang cerdas dan selalu ingin tahu.<br>
                        <br>Sebagai Unit Kegiatan Mahasiswa (UKM) di lingkungan Institut Teknologi Indonesia (ITI), Owltaku menjadi tempat berkumpulnya mahasiswa yang memiliki minat dalam industri kreatif Jepang. Melalui kegiatan-kegiatan yang diadakan secara berkala, Owltaku berusaha untuk mendukung dan mengembangkan potensi kreativitas anggotanya.<br>
                        <br>Berbagai kegiatan yang diadakan oleh Owltaku mencakup diskusi, lokakarya, seminar, dan kegiatan sosial lainnya yang berfokus pada berbagai aspek budaya pop Jepang, seperti anime, manga, teknologi, desain, dan musik. Anggota Owltaku memiliki kesempatan untuk berbagi pengetahuan, pengalaman, dan ide-ide inovatif dalam lingkungan yang mendukung pertukaran budaya.<br>
                        <br>Owltaku juga aktif berpartisipasi dalam event-event kampus maupun di luar kampus, baik sebagai peserta maupun penyelenggara. Dengan semangat kolaborasi, Owltaku berupaya menjembatani divisi teknologi dengan seni dan budaya Jepang, menciptakan kesempatan bagi anggotanya untuk mengembangkan diri secara holistik.
                        </p>
                        <?php
                        if (isset($_SESSION['nim'])) {
                            echo '<a href="admin/"><button class="btn btn-light px-5 py-2 mt-3">Dashboard Admin</button></a>';
                        } else {
                            echo '<a href="login.php"><button class="btn btn-light px-5 py-2 mt-3">Login</button></a>';
                        }

                        ?>

                    </div>
                    <div class="col-md-6">
                        <img src="assets/imgs/imghome.png" alt="Gambar Hero ORGANISASIKITA" width="300" class="d-block ml-auto">
                    </div>
                </div>
            </div>
        </section>
        <!-- ====================== -->
        <!-- BAGIAN ABOUT US -->
        <section id="about">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#007bff" fill-opacity="1" d="M0,192L30,192C60,192,120,192,180,170.7C240,149,300,107,360,117.3C420,128,480,192,540,234.7C600,277,660,299,720,277.3C780,256,840,192,900,165.3C960,139,1020,149,1080,165.3C1140,181,1200,203,1260,218.7C1320,235,1380,245,1410,250.7L1440,256L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
            </svg>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-5 text-light text-center">
                        <img src="assets/imgs/about.png" alt="About US ORGANISASIKITA" width="350">
                        <p class="textabout">“Bersama Pasti Kita Bisa, <br> Banzai”</p>
                    </div>
                    <div class="col-md-6 ml-5">
                        <h1>Mari Bergabung!!!</h1>
                        <p class="aboutjudul">Mari membuat membuat suasana UKM Owltaku lebih meriah lagi.
                        </p>

                        <div class="row">
                            <div class="col-md-2">
                                <img src="assets/imgs/laptop.png" width="60" class="d-inline-flex">
                            </div>
                            <div class="col-md-10">
                                <p class="d-inline-flex text-success font-16">Silahkan Daftar Di Bawah Ini</p>
                            </div>
                        </div>
                        <a href="rekrut.php"><button class="btn btn-success mt-4 py-2 px-4">DAFTAR KEANGGOTAAN OWLTAKU</button></a>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,192L30,186.7C60,181,120,171,180,181.3C240,192,300,224,360,229.3C420,235,480,213,540,218.7C600,224,660,256,720,245.3C780,235,840,181,900,149.3C960,117,1020,107,1080,117.3C1140,128,1200,160,1260,181.3C1320,203,1380,213,1410,218.7L1440,224L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
            </svg>
        </section>
        <!-- ====================== -->
        <!-- BAGIAN Keanggotaan -->
        <section id="anggota">
            <div class="container-fluid p-5">
                <div class="row pb-4">
                    <div class="col-md-12">
                        <h2 class="text-center">PENGURUS</h2>
                        <hr size="10" width="100">
                    </div>
                </div>
                <div class="row text-center justify-content-center">
                    <?php
                    while ($Data_Anggota = mysqli_fetch_array($query_Anggota)) {
                    ?>
                        <div class="col-md-3">
                            <!-- Card -->
                            <div class="card-hover border bg-light">
                                <img class="card-img-top img-responsive" src="admin/assets/images/users/1.jpg" alt="Member 1">
                                <div class="card-body">
                                    <button class="btn btn-success w-100"><?= $Data_Anggota['nama'] ?></button>
                                    <h6 class="card-title mt-2">(<?= $Data_Anggota['jabatan'] ?>)</h6>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- ====================== -->
        <!-- BAGIAN EVENT -->
        <section id="event">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,96L40,112C80,128,160,160,240,144C320,128,400,64,480,74.7C560,85,640,171,720,218.7C800,267,880,277,960,266.7C1040,256,1120,224,1200,197.3C1280,171,1360,149,1400,138.7L1440,128L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
            </svg>
            <div class="container-fluid p-5">
                <div class="row pb-4">
                    <div class="col-md-12">
                        <h2 class="text-center">Event</h2>
                        <hr size="10" width="100">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Column -->
                    <?php
                    if (mysqli_num_rows($query_Event) == 0) {
                        echo '<div class="col-md-12 text-center">
                                <h1 class="text-info">Tidak Ada Event</h1>
                                <h5 class="text-info">Silahkan Tunggu Event Selanjutnya</h5>
                            </div>';
                    }
                    while ($Data_Event = mysqli_fetch_array($query_Event)) {
                    ?>
                        <div class="col-lg-4">
                            <div class="card-hover rounded bg-light">
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
                                    </div>
                                    <h3 class="font-normal"><?= $Data_Event['nama_event'] ?></h3>
                                    <p class="mb-0 mt-2 text-justify">
                                        <?php
                                        echo (str_word_count($Data_Event['deskripsi']) > 70 ? substr($Data_Event['deskripsi'], 0, 300) . "... <a href='event/detail.php?kode_event=" . $Data_Event['kode_event'] . "'>[selengkapnya]</a>" : $Data_Event['deskripsi']);
                                        ?>
                                    </p>
                                    <a href="<?= $Data_Event['link_daftar'] ?>"><button class="btn btn-warning btn-rounded waves-effect waves-light mt-2 w-100">Daftar Sekarang</button></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Column -->
                </div>
            </div>
        </section>
        <!-- ====================== -->
        <!-- FOOTER -->
        <div class="container-fluid p-5" style="background-color: rgba(0, 0, 0, 0.1);">
            <hr>
            <div class="row p-5">
                <div class="col-md-6 p-4">
                    <h1 class="text-info">Kontak Kami</h1>
                    <h1>OWLTAKU</h1>
                    <p>Silakan hubungi kami melalui formulir kontak di bawah ini atau langsung melalui alamat email kami. Kami juga aktif di media sosial, jadi jangan ragu untuk mengikuti akun kami dan bergabung</p>
                </div>
                <div class="col-md-6 p-4">
                    <h1>THANK <span class="text-info">YOU</span></h1>
                    <h5>Sistem Informasi UKM Owltaku</h5>
                    <div class="row mt-5">
                        <div class="col">
                            <h5>Instagram</h5>
                            <a href="https://www.instagram.com/owltakuitiofficial?igsh=cWh0MDRuenA4cHB1"><span>@owltakuitiofficial</span></a>
                        </div>
                        <div class="col">
                            <h5>WEBSITE</h5>
                            <span>owltaku.iti.ac.id</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h5>EMAIL</h5>
                            <span>owltakuitiofficial@gmail.com</span>
                        </div>
                        <div class="col">
                            <h5>LOCATION</h5>
                            <span>INSTITUT TEKNOLOGI INDONESIA, SERPONG, TANGERANG SELATAN</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                Copyright &copy; 2023 OWLTAKU. Designed and Developed by <a href="https://github.com/JonathanZefanya">Jonathan Natannael Zefanya</a>.
                </div>
            </div>
        </div>
        <!-- ====================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="admin/dist/js/app.min.js"></script>
    <script src="admin/dist/js/app.init.js"></script>
    <script src="admin/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="admin/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartjs -->
    <script src="admin/dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>