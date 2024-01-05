<?php
/* QUERY ADMIN */
$query_admin = mysqli_query($koneksi, "SELECT * FROM admin");
$D_admin = mysqli_fetch_array($query_admin);
/* =============================================================== */