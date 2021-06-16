<?php


  $koneksi = new mysqli("localhost","root","","db_perpustakaan");



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Register</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>  </h2>


                 <br />
            </div>
        </div>
         <div class="row ">

                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <strong>Register</strong>
                            </div>
                            <div class="panel-body">
                              <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)" >
                                  <div class="form-group">
                                      <label>Nim</label>
                                      <input class="form-control" name="nim" id="username" />

                                  </div>

                                  <div class="form-group">
                                      <label>Nama Lengkap</label>
                                      <input class="form-control" name="nama" id="nama" />

                                  </div>

                                  <div class="form-group">
                                      <label>Password</label>
                                      <input class="form-control" name="pass" type="Password" id="pass" />

                                  </div>

                                  <div class="form-group">
                                      <label>Tempat Lahir</label>
                                      <input class="form-control" name="tmpt_lahir" id="tmpt_lahir" />

                                  </div>

                                    <div class="form-group">
                                      <label>Tanggal Lahir</label>
                                      <input class="form-control" type="date" name="tgl_lahir" id="tgl" />

                                  </div>

                                  <div class="form-group">
                                      <label>Jenis Kelamin</label><br/>
                                      <label class="checkbox-inline">
                                          <input type="checkbox" value="l" name="jk" id="jk" /> Laki-laki
                                      </label>
                                      <label class="checkbox-inline">
                                          <input type="checkbox" value="p" name="jk" id="jk" /> Wanita
                                      </label>


                                  </div>

                                   <div class="form-group">
                                      <label>Tahun Terbit</label>
                                      <select class="form-control" name="prodi">
                                          <option value="ti">Teknik Informatika</option>
                                           <option value="si">Sistem Informasi </option>
                                      </select>
                                  </div>


                                  <div class="form-group">
                                      <label>File input</label>
                                      <input type="file" name="foto" id="foto" />
                                  </div>


                                  <div>

                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                  </div>


                                    </form>
                            </div>

                        </div>
                    </div>


        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>


<?php

 @$nim = $_POST ['nim'];
 @$pass = $_POST ['pass'];
 @$nama = $_POST ['nama'];

 @$tmpt_lahir = $_POST ['tmpt_lahir'];
 @$tgl_lahir = $_POST ['tgl_lahir'];
 @$jk = $_POST ['jk'];
 @$prodi = $_POST ['prodi'];

   @$foto = $_FILES['foto']['name'];
   @$lokasi = $_FILES['foto']['tmp_name'];
   @$upload = move_uploaded_file($lokasi, "images/".$foto);

 @$simpan = $_POST ['simpan'];


 if ($simpan) {
       if ($upload) {



   $sql = $koneksi->query("insert into tb_user (username, password, nama, level, foto)values('$nim', '$pass', '$nama', 'siswa', '$foto')");
   $sql2= $koneksi->query("insert into tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi )values('$nim', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$prodi')");

     ?>
       <script type="text/javascript">

         alert ("Pendaftaran Berhasil Silahkan Login Dengan Nip dan Password ");
         window.location.href="login.php";

       </script>
     <?php

 }

    }

?>
