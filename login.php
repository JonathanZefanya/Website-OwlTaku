<?php require 'db_connect.php';
session_start();

/* PROSES LOGIN */
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
    $JD_admin = mysqli_num_rows($query_admin);
    $D_admin = mysqli_fetch_array($query_admin);

    if ($JD_admin > 0) {
        if ($password == $D_admin['password']) {
            $_SESSION['nim'] = $D_admin['nim'];
            $_SESSION['nama'] = $D_admin['nama'];
            $_SESSION['no_telp'] = $D_admin['no_telp'];

            setcookie("success", "Login Berhasil", time() + 3);
            header("Location: admin/");
        } else {
            setcookie("gagal", "Password Salah !!", time() + 3);
            header("Location: login.php");
        }
    } else {
        setcookie("gagal", "Username tidak ditemukan !!", time() + 3);
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Organisasikita</title>
    <link rel="shortcut icon" href="assets/imgs/Lingkar_LOGO.png" type="image/x-icon">

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">


    <!-- Bootstrap + Ollie main styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&family=Space+Grotesk:wght@500;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif !important;
        }

        body {
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%) !important;
        }

        .card {
            position: absolute !important;
            left: 50% !important;
            top: 50% !important;
            transform: translate(-50%, -50%) !important;
            box-shadow: 1px 10px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-center bg-light p-4 px-5">
                    <div class="card-body">
                        <h3 class="card-title mb-4 text-dark"><b>LOGIN</b></h3>
                        <?php
                        if (isset($_COOKIE['gagal'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_COOKIE['gagal'] . '</div>';
                        }
                        ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <input type="submit" value="Login" name="login" class="btn btn-primary w-75 mb-4">
                            <a href="index.php"><span>Kembali ke Beranda</span></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>