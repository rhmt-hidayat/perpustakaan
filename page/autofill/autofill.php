        <form method="POST">
        
            <label>Kode Barang</label></br>
            <select name="nim" id="nim">
                <?php
                
                    $sql = $koneksi->query("select nim from tb_anggota");
                    while($data=$sql->fetch_assoc()){
                        echo"
                        
                            <option value='$data[nim]'>$data[nim]</option>
                        
                        ";
                    }
                
                ?>
            </select></br></br>
            
            <label>Nama Barang</label></br>
            <input type="text" name="nama" id="nama" /></br></br>
            
            <label>Jumlah Barang</label></br>
            <input type="text" name="tempat_lahir" id="tempat_lahir" /></br></br>
            
            <label>Satuan Barang</label></br>
            <input type="text" name="satuan" id="satuan" />
            
        </form>
        <script src="assets/js/jquery-1.10.2.js"></script>
            <script type="text/javascript">
                        $(function(){
                            $("#nim").change(function(){
                                var nim = $("#nim option:selected").val();
                                $.ajax({
                                    url : 'getbarang.php',
                                    type : 'POST',
                                    dataType : 'json',
                                    data : {
                                        'nim':nim
                                    },
                                    
                                    success: function(barang){
                                        $("#nama").val(barang['nama']);
                                        $("#tempat_lahir").val(barang['tempat_lahir']);
                                                                                               
                                    }
                                });
                            });
                        });
            </script>


        
        
        
   