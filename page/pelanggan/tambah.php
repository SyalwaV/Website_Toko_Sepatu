<div class="panel panel-default">
    <div class="panel-heading">
    	Tambah Data
	</div>
</div>

	<div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                 <form method="POST" name="formPendaftaran" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                    	<label>ID Pelanggan</label>
                    	<input class="form-control" name="id_pelanggan" />
                    </div>    

                    <div class="form-group">
                    	<label>Nama Pelanggan</label>
                    	<input class="form-control" name="nama_pelanggan" required maxlength="40" minlength="3"/>
                    </div>    

                    <div class="form-group">
                    	<label>Nomor HP</label>
                    	<input class="form-control" name="nomor_telepon" />
                    </div> 

                     <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" />
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
            if (document.forms["formPendaftaran"]["id_pelanggan"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_pelanggan"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["nama_pelanggan"].value == "") {
                alert("Nama Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nama_pelanggan"].focus();
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

	$id_pelanggan 		    = $_POST['id_pelanggan'];
	$nama_pelanggan           = $_POST['nama_pelanggan'];
	$nomor_telepon 	= $_POST['nomor_telepon'];
	$alamat 		= $_POST['alamat'];
	$simpan 	= $_POST['simpan'];

	if ($simpan) {
		$sql=$koneksi->query("CALL Add_Pelanggan('$id_pelanggan','$nama_pelanggan','$nomor_telepon','$alamat')");

		if ($sql) {
		?>	
		
		<script type="text/javascript">
			alert("Berhasil Diinput");
			window.location.href="index.php?page=pelanggan";
		</script>	

<?php 

		}
	}

?>

 



