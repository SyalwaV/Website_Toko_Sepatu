<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                 <form method="POST" name="formPendaftaran" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label>ID Transaksi</label>
                        <input class="form-control" name="id_transaksi" />
                    </div>    


                    <div class="form-group">
                        <label>Warna</label>
                        <input class="form-control" name="warna" />
                    </div> 

                     <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input class="form-control" name="jumlah_beli" />
                    </div>    

                     
                    <!--Foreign Key Tabel Jenis Penjual-->
                    <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Id penjual</label>

                        <select name="id_penjual">
                            <option value="">-- Pilih Id Penjual  --</option>
                            <?php
                                include "../koneksi.php";

                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM `penjual`");
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $data['id_penjual'] ?>"><?php echo $data['id_penjual'] . ' ( nama_penjual ' . $data['nama_penjual'] . ' )'?></option> ?></option>

                            <?php 
                                } 
                            ?>
                        </select>
                    </div>

                    <br>
                    <!--Foreign Key Tabel Produk-->
                      <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih ID produk</label>

                        <select name="id_produk">
                            <option value="">-- Pilih ID produk --</option>
                            <?php
                                include "../koneksi.php";

                                $produk = mysqli_query($koneksi, "SELECT * FROM `produk`");
                                while ($dataproduk = mysqli_fetch_array($produk)) {
                            ?>
                            <option value="<?php echo $dataproduk['id_produk'] ?>"><?php echo $dataproduk['id_produk'] ?></option>

                            <?php 
                                } 
                            ?>
                        </select>

                    </div>

<br>

                    <!--Foreign Key Tabel Jenis Pelanggan-->
                    <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Id Pelanggan</label>

                        <select name="id_pelanggan">
                            <option value="">-- Pilih Id Pelanggan  --</option>
                            <?php
                                include "../koneksi.php";

                                $pelanggan = mysqli_query($koneksi, "SELECT * FROM `pelanggan`");
                                while ($datapelanggan = mysqli_fetch_array($pelanggan)) {
                            ?>
                            <option value="<?php echo $datapelanggan['id_pelanggan'] ?>"><?php echo $datapelanggan['id_pelanggan'] . ' ( nama_pelanggan ' . $datapelanggan['nama_pelanggan'] . ' )'?></option> ?></option>

                            <?php 
                                } 
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="simpan" class="btn btn-primary">
                    </div>
                    
            </form>
        </div>
    </div>
</div>

<script>
        function validateForm() {
            if (document.forms["formPendaftaran"]["id_transaksi"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_transaksi"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["warna"].value == "") {
                alert("Waran Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["warna"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["jumlah_beli"].value == "") {
                alert("Jumlah Beli Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["jumlah_beli"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["id_penjual"].value == "") {
                alert("Id Penjual Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_penjual"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["id_produk"].value == "") {
                alert("Id Produk Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_produk"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["id_pelanggan"].value == "") {
                alert("Id Pelanggan Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_pelanggan"].focus();
                return false;
            }
           }
</script>



<?php 

    $id_transaksi           = $_POST['id_transaksi'];
    $warna                  = $_POST['warna'];
    $jumlah_beli            = $_POST['jumlah_beli'];
    $id_penjual             = $_POST['id_penjual'];
    $id_produk              = $_POST['id_produk'];
    $id_pelanggan           = $_POST['id_pelanggan'];
    

    $simpan     = $_POST['simpan'];

    if ($simpan) {
        $sql="CALL Add_Transaksi('$id_transaksi', '$warna', '$jumlah_beli', '$id_penjual', '$id_produk', '$id_pelanggan')";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=transaksi";
        </script>   

<?php 

        }
    }

?>

 



