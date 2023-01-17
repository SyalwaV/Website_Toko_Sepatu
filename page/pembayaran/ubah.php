<?php 

    $id_pembayaran  = $_GET['id_pembayaran'];
    $sql = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembayaran= '$id_pembayaran'");
    $tampil = $sql->fetch_assoc();

 ?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                 <form method="POST" name="formPendaftaran" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label>Id Pembayaran</label>
                        <input class="form-control" name="id_pembayaran" value="<?php echo $tampil['id_pembayaran']; ?>" readonly />
                    </div>    

                    <div class="form-group">
                        <label>Jumlah Beli</label>
                        <input class="form-control" name="jumlah_beli" value="<?php echo $tampil['jumlah_beli']; ?>" />
                    </div>    

                    <div class="form-group">
                        <label>Total Bayar</label>
                        <input class="form-control" name="total_bayar" value="<?php echo $tampil['total_bayar']; ?>" />
                        
                    </div> 

                     <div class="form-group">
                        <label>Tanggal Pembayaran</label>
                        <input class="form-control" name="tanggal_pembayaran" type="date"  value="<?php echo $tampil['tanggal_pembayaran']; ?>" />
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
                                    if ($data['id_transaksi'] == $data['id_transaksi']) 
                                    {
                                        $select="selected";
                                        } else {
                                        $select="";
                                    }
                            ?>
                            <option <?php echo $select ?> value="<?php echo $data['id_transaksi'] ?>"><?php echo $data['id_transaksi'] . ' ( warna ' . $data['warna'] . ' )'?></option> ?></option>

                           

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

    $id_pembayaran           = $_POST['id_pembayaran'];
    $jumlah_beli             = $_POST['jumlah_beli'];
    $total_bayar             = $_POST['total_bayar'];
    $tanggal_pembayaran      = $_POST['tanggal_pembayaran'];
    $id_transaksi            = $_POST['id_transaksi'];


    


    $simpan     = $_POST['simpan'];

    if ($simpan) {
       $sql= mysqli_query($koneksi, " UPDATE pembayaran SET 
                    id_pembayaran='$id_pembayaran',
                    jumlah_beli='$jumlah_beli', 
                    total_bayar='$total_bayar',   
                    tanggal_pembayaran='$tanggal_pembayaran' , 
                    id_transaksi='$id_transaksi' 
                    
                    WHERE id_pembayaran='$id_pembayaran'");

 echo $id_pembayaran , " ", $jumlah_beli  , " ", $total_bayar  , " ",   $tanggal_pembayaran  , " ", $id_transaksi , " ";

        if ($sql) {
            echo "Berhasil";
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=pembayaran";
        </script>   

<?php 

        }
    }

?> 