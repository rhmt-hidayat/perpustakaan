
        <marquee>Selamat Datang Di Sistem Informasi Perpustakaan</marquee>

        <p></p>
        
        <h3><center>
          Silahkan pilih Panel Dibawah ini
        </center></h3>

        <br/>

          <table width="100%" height="100%" align="center" border="2" cellpadding="2" style="border:2px solid #66ccff;">
          	<tbody style="">
            	<tr>

                  <?php
                   if (@$_SESSION['admin'] || @$_SESSION['user']) { ?>
            		<td align="center"><a href="?page=anggota"><img src="images/anggota.png" width="100" height="100"></a><br /><center><p style="font-size: 20px"><strong>Data Anggota<strong></p></center></td>
                <?php  } ?>

                	<td align="center"><a href="?page=buku"><img src="images/buku.png" width="100" height="100"></a><br />
                    <center><p style="font-size: 20px"><strong>Data Buku</strong></p></center></td>

                    <?php if (@$_SESSION['admin']) { ?>
                    <td  align="center"><a href="?page=pengguna"><img src="images/login.png" width="100" height="100"></a></a><br /><center><p style="font-size: 20px"><strong>Pengguna</strong></p></center></td>

                    <?php  } ?>

                </tr>
                  <?php if (@$_SESSION['admin'] || @$_SESSION['user']) { ?>
                <tr>
                	 <td colspan="3" align="center"><a href="?page=transaksi"><img src="images/user.ico" width="100" height="100"></a></a><br /><center><p style="font-size: 20px"><strong>Transaksi</strong></p></center></td>
                </tr>

                  <?php  } ?>

                  <?php if (@$_SESSION['admin'] || @$_SESSION['siswa'] || @$_SESSION['user']) { ?>
                
                	 <td colspan="3" align="center"><a href="?page=pengajuan"><img src="images/pinjam.png" width="100" height="100"></a></a><br/><center><p style="font-size: 20px"><strong>Pengajuan Pinjam</strong></p></center></td>
                </tr>

                  <?php  } ?>

            </tbody>
          </table>
