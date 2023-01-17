<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                 <form method="POST"  name="formPendaftaran"  onsubmit="return validateForm()">
                    <div class="form-group">
                        <label>ID penjual</label>
                        <input class="form-control" name="id_penjual" />
                    </div>    

                    <div class="form-group">
                        <label>Nama penjual</label>
                        <input class="form-control" name="nama_penjual" required maxlength="40" minlength="3" />
                    </div>    

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" />
                    </div> 

                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input class="form-control" name="nomor_telepon" />
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
            if (document.forms["formPendaftaran"]["id_penjual"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_penjual"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["nama_penjual"].value == "") {
                alert("Nama Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nama_penjual"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["alamat"].value == "") {
                alert("Alamat Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["alamat"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["nomor_telepon"].value == "") {
                alert("Nomor Telepon Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nomor_telepon"].focus();
                return false;
            }
        }
</script>

<?php 
    $id_penjual           = $_POST['id_penjual'];
    $nama_penjual           = $_POST['nama_penjual'];
    $alamat         = $_POST['alamat'];
    $nomor_telepon  = $_POST['nomor_telepon'];
    

    

    $simpan     = $_POST['simpan'];

    if ($simpan) {
        $sql=$koneksi->query("CALL Add_Penjual('$id_penjual','$nama_penjual','$alamat','$nomor_telepon')");

        if ($sql) {
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=penjual";
        </script>   

<?php 

        }
    }

?>

 



