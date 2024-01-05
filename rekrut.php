<?php session_start();
require 'db_connect.php';

// PROSES TAMBAH DATA
if (isset($_POST['kirim'])) {
    // // Ambil Data yang Dikirim dari Form upload
    // $nama_sertif = $_FILES['sertifikat_organisasi']['name'];
    // // Ambil ukuran files dalam bentuk bytes
    // $ukuran_sertif = $_FILES['sertifikat_organisasi']['size'];
    // // Ambil url path folder
    // $tmp_sertif = $_FILES['sertifikat_organisasi']['tmp_name'];
    // /* ========================================================================= */
    // // Ambil Data yang Dikirim dari Form upload
    // $nama_pengalaman = $_FILES['pengalaman_organisasi']['name'];
    // // Ambil ukuran files dalam bentuk bytes
    // $ukuran_pengalaman = $_FILES['pengalaman_organisasi']['size'];
    // // Ambil url path folder
    // $tmp_pengalaman = $_FILES['pengalaman_organisasi']['tmp_name'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $hobi = $_POST['hobi'];
    $motivasi = $_POST['motivasi'];

    $ekstensi =  array('png', 'jpg', 'jpeg');
    $sertif = '';
    $ukuran_s = '';
    $pengalaman = '';
    $ukuran_p = '';
    $ext = '';
    for ($i = 0; $i < count($_FILES['sertifikat_organisasi']['name']); $i++) {
        if ($i == count($_FILES['sertifikat_organisasi']['name']) - 1) {
            $sertif .= $_FILES['sertifikat_organisasi']['name'][$i]['sertifikat_organisasi'];
            $ext .= pathinfo($_FILES['sertifikat_organisasi']['name'][$i]['sertifikat_organisasi'], PATHINFO_EXTENSION);
        } else {
            $sertif .= $_FILES['sertifikat_organisasi']['name'][$i]['sertifikat_organisasi'] . "|";
            $ext .= pathinfo($_FILES['sertifikat_organisasi']['name'][$i]['sertifikat_organisasi'], PATHINFO_EXTENSION) . "|";
        }
    }
    $ext .= "|";
    // for ($i = 0; $i < count($_FILES['sertifikat_organisasi']['size']); $i++) {
    //     if ($i == count($_FILES['sertifikat_organisasi']['size']) - 1) {
    //         $ukuran_s .= $_FILES['sertifikat_organisasi']['size'][$i]['sertifikat_organisasi'];
    //         // $ext .= pathinfo($_FILES['sertifikat_organisasi']['size'][$i]['sertifikat_organisasi'], PATHINFO_EXTENSION);
    //     } else {
    //         $ukuran_s .= $_FILES['sertifikat_organisasi']['size'][$i]['sertifikat_organisasi'] . "|";
    //         // $ext .= pathinfo($_FILES['sertifikat_organisasi']['size'][$i]['sertifikat_organisasi'], PATHINFO_EXTENSION) . "|";
    //     }
    // }
    for ($i = 0; $i < count($_FILES['pengalaman_organisasi']['name']); $i++) {
        if ($i == count($_FILES['pengalaman_organisasi']['name']) - 1) {
            $pengalaman .= $_FILES['pengalaman_organisasi']['name'][$i]['pengalaman_organisasi'];
            $ext .= pathinfo($_FILES['pengalaman_organisasi']['name'][$i]['pengalaman_organisasi'], PATHINFO_EXTENSION);
        } else {
            $pengalaman .= $_FILES['pengalaman_organisasi']['name'][$i]['pengalaman_organisasi'] . "|";
            $ext .= pathinfo($_FILES['pengalaman_organisasi']['name'][$i]['pengalaman_organisasi'], PATHINFO_EXTENSION) . "|";
        }
    }
    // for ($i = 0; $i < count($_FILES['pengalaman_organisasi']['size']); $i++) {
    //     if ($i == count($_FILES['pengalaman_organisasi']['size']) - 1) {
    //         $ukuran_p .= $_FILES['pengalaman_organisasi']['size'][$i]['pengalaman_organisasi'];
    //         // $ext .= "|" . pathinfo($_FILES['pengalaman_organisasi']['size'][$i]['pengalaman_organisasi'], PATHINFO_EXTENSION);
    //     } else {
    //         $ukuran_p .= $_FILES['pengalaman_organisasi']['size'][$i]['pengalaman_organisasi'] . "|";
    //         // $ext .= "|" . pathinfo($_FILES['pengalaman_organisasi']['size'][$i]['pengalaman_organisasi'], PATHINFO_EXTENSION) . "|";
    //     }
    // }
    // var_dump($ext);
    // var_dump(explode('|', $ext));
    foreach (explode('|', $ext) as $data) {
        if (!in_array($data, $ekstensi)) {
            setcookie("gagal", "Ekstensi tidak didukung", time() + 3, '/');
            header("Location:rekrut.php");
        } else {
            // if ($ukuran_s < 1044070 && $ukuran_p < 1044070) {
            /* UNTUK DI MASUKAN KE DATABASE */
            /* ==================================== */
            // Set path folder tempat menyimpan gambarnya
            for ($i = 0; $i < count($_FILES['sertifikat_organisasi']['name']); $i++) {
                move_uploaded_file($_FILES['sertifikat_organisasi']['tmp_name'][$i]['sertifikat_organisasi'], 'gambar/sertifikat/' . $_FILES['sertifikat_organisasi']['name'][$i]['sertifikat_organisasi']);
            }
            for ($i = 0; $i < count($_FILES['pengalaman_organisasi']['name']); $i++) {
                move_uploaded_file($_FILES['pengalaman_organisasi']['tmp_name'][$i]['pengalaman_organisasi'], 'gambar/pengalaman/' . $_FILES['pengalaman_organisasi']['name'][$i]['pengalaman_organisasi']);
            }

            $exp_sertif = explode('|', $sertif);
            $exp_pengalaman = explode('|', $pengalaman);
            $jumlah_sertif = count($exp_sertif);
            $jumlah_pengalaman = count($exp_pengalaman);

            $value_s = ($jumlah_sertif * (1));
            $value_p = ($jumlah_pengalaman * (0.3));
            $nilai_akhir = $value_s + $value_p;
            // var_dump($nilai_akhir);

            $query_Kirim = mysqli_query($koneksi, "INSERT INTO reqruitment VALUES ('$nim','$nama','$prodi','$no_telp','$alamat','$hobi','$sertif','$pengalaman','$motivasi',0,'$nilai_akhir','Tidak Lolos')");
            if ($query_Kirim) {
                setcookie("sucsess", "Berhasil Terkirim", time() + 3, '/');
                header("Location:index.php");
            } else {
                setcookie("gagal", mysqli_error($koneksi), time() + 2, '/');
                header("Location:rekrut.php");
            }
        }
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/imgs/Lingkar_LOGO.png">
    <title>Tambah Keanggotaan | Admin OWLTAKU</title>
    <!-- Custom CSS -->
    <link href="admin/assets/libs/tablesaw/dist/tablesaw.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="admin/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
                            <a class="nav-link" href="index.php#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#member">Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#team">Event</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ====================== -->

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container" style="margin-top:150px;">
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-hover bg-light">
                        <div class="card-body">
                            <h4 class="card-title">Form Rekrut Anggota</h4>
                            <h5 class="card-subtitle">Rekrut Anggota Baru</h5>
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
                                            <input type="number" class="form-control" name="nim" id="NIM" placeholder="Masukan NIM" required>
                                            <div class="invalid-feedback">
                                                Masukan NIM
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required>
                                            <div class="invalid-feedback">
                                                Masukan Nama Lengkap
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">Pogram Studi</label>
                                            <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Masukan Program Studi" required>
                                            <div class="invalid-feedback">
                                                Masukan Program Studi
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">No. Telepon</label>
                                            <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan No.Telepon" required>
                                            <div class="invalid-feedback">
                                                Masukan No.Telepon
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" required>
                                            <div class="invalid-feedback">
                                                Masukan Alamat
                                            </div>
                                            <div class="valid-feedback">
                                                Terisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hobi">Hobi</label>
                                            <input type="text" class="form-control" name="hobi" id="hobi" placeholder="Masukan Hobi" required>
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
                                                <label for="sertifikat_organisasi">Sertifikat Organisasi Lain (Jika tidak ada, Kosongkan)</label>

                                                <div data-repeater-item class="row m-b-15">
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="sertifikat_organisasi" id="sertifikat_organisasi" placeholder="Masukan Sertifikat Organisasi">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Sertifikat Organisasi Tidak boleh kosong
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-info waves-effect waves-light">Tambah Sertifikat Organisasi
                                            </button>
                                        </div>
                                        <div class="email-repeater form-group">
                                            <div data-repeater-list="pengalaman_organisasi">
                                                <label for="pengalaman_organisasi">Sertifikat Prestasi (Jika tidak ada, Kosongkan)</label>

                                                <div data-repeater-item class="row m-b-15">
                                                    <div class="col-md-10">
                                                        <input type="file" class="form-control" name="pengalaman_organisasi" id="pengalaman_organisasi" placeholder="Masukan Pengalaman Organisasi">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Pengalaman Organisasi Tidak boleh kosong
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-info waves-effect waves-light">Tambah Prestasi
                                            </button>
                                        </div>
                                        <p class="text-danger">** Masukan berkas file berekstensi jpg, jpeg, dan png</p>
                                        <div class="form-group">
                                            <label for="motivasi">Motivasi</label>
                                            <div class="input-group-prepend">
                                                <textarea class="form-control" rows="6" name="motivasi" id="motivasi" placeholder="Motivasi / Alasan untuk bergabung kedalam UKM Owltaku" required></textarea>
                                                <div class="invalid-feedback">
                                                    Motivasi Tidak boleh kosong
                                                </div>
                                                <div class="valid-feedback">
                                                    Terisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="kirim" class="btn btn-info mt-4" value="Kirim Data">
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
    <script src="admin/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="admin/assets/extra-libs/jquery.repeater/repeater-init.js"></script>
    <script src="admin/assets/extra-libs/jquery.repeater/dff.js"></script>
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