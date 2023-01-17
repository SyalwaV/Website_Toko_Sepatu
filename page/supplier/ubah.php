<?php 

    $id_supplier  = $_GET['id_supplier'];
    $sql = $koneksi->query("SELECT * FROM supplier WHERE id_supplier= '$id_supplier'");
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

                 <form method="POST"  name="formPendaftaran" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label>ID supplier</label>
                        <input class="form-control" name="id_supplier" value="<?php echo $tampil['id_supplier']; ?>" readonly />
                    </div>    

                    <div class="form-group">
                        <label>Nama supplier</label>
                        <input class="form-control" name="nama_supplier" value="<?php echo $tampil['nama_supplier']; ?>" required maxlength="40" minlength="3" />
                    </div>    

                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input class="form-control" name="nomor_telepon" value="<?php echo $tampil['nomor_telepon']; ?>" />
                        
                    </div> 

                     <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" value="<?php echo $tampil['alamat']; ?>" />
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
            if (document.forms["formPendaftaran"]["id_supplier"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_supplier"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["nama_supplier"].value == "") {
                alert("Nama Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nama_supplier"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["nomor_telepon"].value == "") {
                alert("Nomor Telepon Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nomor_telepon"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["alamat"].value == "") {
                alert("Alamat Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["alamat"].focus();
                return false;
            }
        }
</script>


<?php  

    $id_supplier            = $_POST['id_supplier'];
    $nama_supplier           = $_POST['nama_supplier'];
    $nomor_telepon   = $_POST['nomor_telepon'];
    $alamat      = $_POST['alamat'];

    

    $simpan     = $_POST['simpan'];

    if ($simpan) {
       $sql=$koneksi->query("CALL Update_Supplier('$id_supplier','$nama_supplier','$nomor_telepon','$alamat')");


        if ($sql) {
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=supplier";
        </script>   

<?php 

        }
    }

?> 