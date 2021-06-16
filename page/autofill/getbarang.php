<?php

$koneksi = new mysqli("localhost","root","","db_perpustakaan");
$kode= $_POST['nim'];
$query = $koneksi->query("SELECT * FROM tb_anggota WHERE nim='$kode'");
$data = $query->fetch_assoc();

echo json_encode($data);
?>
