<?php


		$sql = $koneksi->query("select kode_transaksi from tb_transaksi order by kode_transaksi desc");

		$data = $sql->fetch_assoc();

		$kode_transaksi = $data['kode_transaksi'];

		$urut = substr($kode_transaksi, 4, 4);
		$tambah = (int) $urut+1;


    if(strlen($tambah) == 1){
			$format="TRK-"."000".$tambah;
		}else if(strlen($tambah) == 2){
			$format="TRK-"."00".$tambah;
		}else if(strlen($tambah) == 3){
			$format="TRK-"."0".$tambah;
		}else{
			$format="TRK-".$tambah;
		}


?>

<?php

	mysqli_connect("localhost","root","");
	mysqli_select_db("db_perpustakaan");


	$pinjam = date("d-m-Y");
	$tuju_hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
	$kembali = date("d-m-Y", $tuju_hari);

?>

<div class="panel panel-primary">
<div class="panel-heading">Tambah Data Transaksi</div>
<div class="panel-body">

        <div class="row">
            <div class="col-md-12">

                <form method="POST" >

                	<div class="form-group">
                		<label>Kode Transaksi</label>
                		<input class="form-control" type="text" name="kode" value="<?php echo $format; ?>" readonly />
                	</div>

                    <div class="form-group">
                        <label> Judul Buku</label>
                        <select class="form-control" name="buku">

                        	<?php
                        	$query = $koneksi->query("SELECT * FROM tb_buku ORDER by id");
                        	while ($buku=$query->fetch_assoc()) {
                        		echo "<option value='$buku[id].$buku[judul]'>$buku[judul]</option>";
                        	}
                        	?>
                        		
                        	</select>
                    </div>

                    <div class="form-group">
                    	<label>Nama Anggota</label>
                    	<select class="form-control" name="nama">

                    		<?php
                    		$query = $koneksi->query("SELECT * FROM tb_anggota ORDER by nim");
                    		while ($nama=$query->fetch_assoc()) {
                    			echo "<option value='$nama[nim].$nama[nama]'>$nama[nim]. $nama[nama]</option>";
                    		}
                    		?>
                    			
                    	</select>
                    </div>

                    <div class="form-group">
                    	<label>Tanggal Pinjam</label>
                    	<input class="form-control" type="text" name="pinjam" value="<?php echo $pinjam; ?>" readonly />
                    </div>

                    <div class="form-group">
                    	<label>Tanggal Kembali</label>
                    	<input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
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





$kode = $_POST['kode'];
$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";

$dapat_buku		= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah_buku		= explode (".", $dapat_buku);
$id				= $pecah_buku[0];
$buku			= $pecah_buku[1];

$dapat_mhs		= isset($_POST['nama']) ? $_POST['nama'] : "";
$pecah_mhs		= explode (".", $dapat_mhs);
$id_mhs 		= $pecah_mhs[0];
$mhs			= $pecah_mhs[1];



	$query=$koneksi->query("SELECT * FROM tb_buku WHERE judul = '$buku'");
	while ($hasil=$query->fetch_assoc()) {
		$sisa=$hasil['jumlah_buku'];

		if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";

	} else {
		$qt = $koneksi->query("INSERT INTO tb_transaksi VALUES ('$kode', '$buku','$id_mhs', '$mhs', '$tgl_pinjam', '$tgl_kembali', 'Pinjam')") or die ("Gagal Masuk".mysql_error());
		$qu			= $koneksi->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id=$id ");
		if ($qt&&$qu) {
	        echo "<script>alert('Transaksi Sukses');</script>";
	        	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		} else {
			echo "<script>alert('Transaksi Gagal');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";

		}
	}
}

}

?>
