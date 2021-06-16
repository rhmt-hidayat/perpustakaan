
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>ISBN</th>
                                            <th>Jumlah Buku</th>
                                            <th>Lokasi</th>

                                            <?php if (@$_SESSION['admin'] || @$_SESSION['user']) { ?>
                                            <th>Aksi</th>
                                              <?php  } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi->query("select * from tb_buku");

                                            while ($data= $sql->fetch_assoc()) {




                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['pengarang'];?></td>
                                            <td><?php echo $data['penerbit'];?></td>
                                            <td><?php echo $data['isbn'];?></td>
                                            <td><?php echo $data['jumlah_buku'];?></td>
                                            <td><?php echo $data['lokasi'];?></td>

                                              <?php if (@$_SESSION['admin'] || @$_SESSION['user']) { ?>
                                            <td>

                                                <a href="?page=buku&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ... ???')" href="?page=buku&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

                                            </td>

                                            <?php  } ?>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>
                            </table>


                                  </div>
                                    <?php if (@$_SESSION['admin'] || @$_SESSION['user']) { ?>
                                  <a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>

                                  <a href="./laporan/laporan_buku_exel.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToExel</a>

                                  <!--<a href="?page=buku&aksi=cetak" class="btn btn-default"  style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToPdf</a>
                                    <?php  } ?>-->
                        </div>
                     </div>
                   </div>
     </div>
