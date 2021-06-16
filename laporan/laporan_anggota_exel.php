<?php

	$koneksi = new mysqli("localhost","root","","db_perpustakaan");

	$filename ="exel_anggota-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vnd.ms-exel");


?>

<h2>Laporan Data Anggota</h2>

<table border="1px">
	
	<tr>
		<th>No</th>
		<th>Nim</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Program Studi</th>
	</tr>

	<?php

		$no=1;

		$sql = $koneksi->query("select * from tb_anggota");

		while ($data=$sql->fetch_assoc()) {

			@$jk = ($tampil['jk']==l)?"Laki-laki":"Wanita";

      		@$prodi = ($tampil['prodi']==ti)?"Teknik Informatika":"Sistem Informasi";
			
		

	?>

	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['nim'];?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['tempat_lahir'];?></td>
		<td><?php echo $data['tgl_lahir'];?></td>
		<td><?php echo $jk;?></td>
		<td><?php echo $prodi;?></td>
	</tr>

	<?php } ?>

</table>