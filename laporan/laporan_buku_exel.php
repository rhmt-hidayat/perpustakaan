<?php

	$koneksi = new mysqli("localhost","root","","db_perpustakaan");

	$filename ="exel_buku-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vnd.ms-exel");


?>

<h2>Laporan Data Buku</h2>

<table border="1px">
	
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>Pengarang</th>
		<th>Penerbit</th>
		<th>Tahun Terbit</th>
		<th>ISBN</th>
		<th>Jumlah Buku</th>
		<th>Lokasi</th>
		
	</tr>

	<?php

		$no=1;

		$sql = $koneksi->query("select * from tb_buku");

		while ($data=$sql->fetch_assoc()) {

			

	?>

	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['judul'];?></td>
		<td><?php echo $data['pengarang'];?></td>
		<td><?php echo $data['penerbit'];?></td>
		<td><?php echo $data['tahun_terbit'];?></td>
		<td><?php echo $data['isbn'];?></td>
		<td><?php echo $data['jumlah_buku'];?></td>
		<td><?php echo $data['lokasi'];?></td>
		
	</tr>

	<?php } ?>

</table>