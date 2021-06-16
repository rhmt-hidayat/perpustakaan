<?php

$kode = $_GET['id'];

$sql = $koneksi->query("UPDATE tb_pengajuan set status='Disetujui' where kode_pengajuan='$kode'");

if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Berhasil di Approve");
      window.location.href="?page=pengajuan";
    </script>
  <?php
}

 ?>
