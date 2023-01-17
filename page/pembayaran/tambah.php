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
                        <label>ID pembayaran</label>
                        <input class="form-control" name="id_pembayaran" />
                    </div>    

                    <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input class="form-control" name="jumlah_beli"  required maxlength="40" minlength="1" />
                    </div>    

                    <div class="form-group">
                        <label>total_bayar</label>
                        <input class="form-control" name="total_bayar"  value="1000000" readonly />
                    </div> 

                     <div class="form-group">
                        <label>tanggal_pembayaran</label>
                        <input class="form-control" name="tanggal_pembayaran" type="date"  />
                    </div>   


                    <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Id Transaksi</label>

                        <select name="id_transaksi">
                            <option value="">-- Pilih Id Transaksi  --</option>
                            <?php
                                include "../koneksi.php";

                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM `transaksi`");
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $data['id_transaksi'] ?>"><?php echo $data['id_transaksi'] . ' ( merek ' . $data['merek'] . ' )'?></option> ?></option>

                            <?php 
                                } 
                            ?>
                        </select>
                    </div>

                    <br>

                      
                    <br>
                    <div>
                        <input type="submit" name="simpan" class="btn btn-primary">
                    </div>
                    
            </form>
        </div>
    </div>
</div>

<script>
        function validateForm() {
            if (document.forms["formPendaftaran"]["id_pembayaran"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_pembayaran"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["jumlah_beli"].value == "") {
                alert("Jumlah Beli Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["jumlah_beli"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["total_bayar"].value == "") {
                alert("Total Bayar Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["total_bayar"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["tanggal_pembayaran"].value == "") {
                alert("Tanggal Pembayaran Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["tanggal_pembayaran"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["id_transaksi"].value == "") {
                alert("Id Transaksi Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_transaksi"].focus();
                return false;
        }
    }
</script>


<?php 

    $id_pembayaran          = $_POST['id_pembayaran'];
    $jumlah_beli           = $_POST['jumlah_beli'];
    $total_bayar            = $_POST['1000000'];
    $tanggal_pembayaran               = $_POST['tanggal_pembayaran'];
    $id_transaksi              = $_POST['id_transaksi'];
  
    

    $simpan     = $_POST['simpan'];

    if ($simpan) {
        $sql=$koneksi->query("CALL Add_Pembayaran('$id_pembayaran', '$jumlah_beli', '1000000', '$tanggal_pembayaran', '$id_transaksi')");

        if ($sql) {
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=pembayaran";
        </script>   

<?php 

        }
    }

?>

 



