<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
</div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                 <form method="POST"  name="formPendaftaran" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label>ID Jenis Produk</label>
                        <input class="form-control" name="id_jenis" />
                    </div>    

                    <div class="form-group">
                        <label>Bahan</label>
                        <input class="form-control" name="bahan"  required maxlength="40" minlength="3"/>
                    </div>    

                    <div class="form-group">
                        <label>Kualitas</label>
                        <input class="form-control" name="kualitas" />
                    </div> 

                     <div class="form-group">
                        <label>Merek</label>
                        <input class="form-control" name="merek" />
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
            if (document.forms["formPendaftaran"]["id_jenis"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_jenis"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["bahan"].value == "") {
                alert("Bahan Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["bahan"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["kualitas"].value == "") {
                alert("Kualitas Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["kualitas"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["merek"].value == "") {
                alert("Merek Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["merek"].focus();
                return false;
            }
        }
</script>


<?php 

    $id_jenis           = $_POST['id_jenis'];
    $bahan           = $_POST['bahan'];
    $kualitas  = $_POST['kualitas'];
    $merek         = $_POST['merek'];

    

    $simpan     = $_POST['simpan'];

    if ($simpan) {
        $sql=$koneksi->query("CALL Add_Jenis('$id_jenis','$bahan','$kualitas','$merek')");

        if ($sql) {
        ?>  
        
        <script type="text/javascript">
            alert("Berhasil Diinput");
            window.location.href="index.php?page=jenis_produk";
        </script>   

<?php 

        }
    }

?>

 



