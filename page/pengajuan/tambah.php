<?php
  
  $pinjam = date("d-m-Y");

		$sql = $koneksi->query("select kode_pengajuan from tb_pengajuan order by kode_pengajuan desc");

		$data = $sql->fetch_assoc();

		$kode_pengajuan = $data['kode_pengajuan'];

		$urut = substr($kode_pengajuan, 4, 4);
		$tambah = (int) $urut+1;


    if(strlen($tambah) == 1){
			$format="PGJ-"."000".$tambah;
		}else if(strlen($tambah) == 2){
			$format="PGJ-"."00".$tambah;
		}else if(strlen($tambah) == 3){
			$format="PGJ-"."0".$tambah;
		}else{
			$format="PGJ-".$tambah;
		}

?>

<div class="panel panel-primary">
<div class="panel-heading">
		Tambah Pengajuan
 </div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST" >


                                      <div class="form-group">
                                          <label>Kode Pengajuan</label>
                                          <input class="form-control" name="kode" value="<?php echo $format; ?>" readonly/>

                                      </div>

                                        <div class="form-group">
                                            <label> Judul Buku</label>
                                            <select class="form-control" name="buku">
                                                <?php


                          													$query = $koneksi->query("SELECT * FROM tb_buku ORDER by id");

                          													while ($buku=$query->fetch_assoc()) {
                          														echo "<option value='$buku[judul]'>$buku[judul]</option>";
                          													}

                                                ?>

                                            </select>
                                          </div>


                                          <div class="form-group">
                                            <label>Tanggal Pengajuan</label>
                                            <input class="form-control" type="text" name="pengajuan" value="<?php echo $pinjam; ?>" readonly />
                                          </div>


                                        <div>
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>
 </div>
 </div>


 <?php
if (isset($_POST['simpan'])) {

$nip = $_SESSION['username'];
$kode_pengajuan = $_POST['kode'];
$tgl_pengajuan		= $_POST['pengajuan'];
$judul = $_POST['buku'];


		$sql = $koneksi->query("insert into tb_pengajuan(kode_pengajuan, nip, judul, tanggal_pangajuan, status)
                            values('$kode_pengajuan', '$nip', '$judul', '$tgl_pengajuan', 'Belum Disetujui')");


  if ($sql) {
    ?>

      <script type="text/javascript">
        alert("Pengajuan Pinjam Berhasil");
        window.location.href='?page=pengajuan';
      </script>

    <?php
  }

}

?>
