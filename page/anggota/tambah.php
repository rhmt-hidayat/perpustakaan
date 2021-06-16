<script type="text/javascript">
    function validasi(form){
        if (form.nim.value=="") {
            alert("Nim Tidak Boleh Kosong");
            form.nim.focus();
            return(false);
        }if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosng");
            form.nama.focus();
            return(false);
        }if (form.tmpt_lahir.value=="") {
            alert("tempat Lahir Tidak Boleh Kosong");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.tgl.value=="") {
            alert("Tanggal Tidak Boleh Kosong");
            form.tgl.focus();
            return(false);
        }if (form.jk.value=="") {
            alert("Jenis Kelamin Tidak Boleh Kosong");
            form.jk.focus();
            return(false);
        }
        return(true);
    }
</script>

<div class="panel panel-primary">
<div class="panel-heading">
		Tambah Data
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" onsubmit="return validasi(this)">
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" name="nim" id="nim" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" id="nama" />
                                            
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
                                            <label>Program Studi</label>
                                            <select class="form-control" name="prodi">
                                                <option value="ti">Teknik Informatika</option>
                                                <option value="si">Teknik Industri</option>
                                                <option value="si">Psikolog</option>
                                                <option value="si">Farmasi</option>
                                            </select>
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

 	@$nim = @$_POST ['nim'];
 	@$nama = @$_POST ['nama'];
 	@$tmpt_lahir = @$_POST ['tmpt_lahir'];
 	@$tgl_lahir = @$_POST ['tgl_lahir'];
 	@$jk = @$_POST ['jk'];
 	@$prodi = @$_POST ['prodi'];
 	
 	@$simpan = @$_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("insert into tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi )values('$nim', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$prodi')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=anggota";

 				</script>
 			<?php
 		}
 	}

 ?>