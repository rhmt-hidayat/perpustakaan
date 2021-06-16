

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Pengajuan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Pengajuan</th>
                                            <th>Uname</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>

                                            <?php if (@$_SESSION['admin']) {?>
                                            <th>Approve</th>
                                          <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $nip = $_SESSION['username'];
                                            $no = 1;

                                            if (@$_SESSION['siswa']) {

                                            $sql = $koneksi->query("select * from tb_pengajuan where nip='$nip'");

                                          }else {
                                            $sql = $koneksi->query("select * from tb_pengajuan");
                                          }

                                            while ($data= $sql->fetch_assoc()) {

                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_pengajuan'];?></td>
                                            <td><?php echo $data['nip'];?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['tanggal_pangajuan'];?></td>

                                            <td>

                                             <?php

                                                 $ket = $data['status'];

                                                 if ($ket=="Belum Disetujui") {

                                                     echo "<b><font color='red'> $ket</b> ";
                                                 } else{
                                                      echo "<b><font color='green'> $ket</>";
                                                 }


                                             ?>

                                           </td>

                                           <?php if (@$_SESSION['admin']) {?>
                                            <td>
                                              <?php $idp = $data['kode_pengajuan']; ?>
                                              <?php if ($data['status']=='Belum Disetujui' ) {

                                                       echo "<a href='?page=pengajuan&aksi=approve&id=$idp' class=' btn btn-primary'>  Approve</a>";

                                               }

                                               ?>

                                            </td>
                                              <?php } ?>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>
                                  </div>

                                  <?php if (@$_SESSION['siswa']) {?>

                                  <a href="?page=pengajuan&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>

                                <?php } ?>
                        </div>
                     </div>
                   </div>
     </div>