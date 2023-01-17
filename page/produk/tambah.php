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
                    	<label>ID Produk</label>
                    	<input class="form-control" name="id_produk" />
                    </div>    

                    <div class="form-group">
                    	<label>Nama Tas</label>
                    	<input class="form-control" name="nama_tas" required maxlength="40" minlength="3" />
                    </div>    

                    <div class="form-group">
                    	<label>Warna</label>
                    	<input class="form-control" name="warna" />
                    </div> 

                     <div class="form-group">
                        <label>Stok</label>
                        <input class="form-control" name="stok"  />
                    </div>   

                     <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control" name="harga"  />
                    </div>
                    <!--Foreign Key Tabel Jenis Produk-->
                    <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Id Jenis</label>

                        <select name="id_jenis">
                            <option value="">-- Pilih Id Jenis  --</option>
                            <?php
                                include "../koneksi.php";

                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM `jenis_produk`");
                                while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $data['id_jenis'] ?>"><?php echo $data['id_jenis'] . ' ( merek ' . $data['merek'] . ' )'?></option> ?></option>

                            <?php 
                                } 
                            ?>
                        </select>
                    </div>

                    <br>
                    <!--Foreign Key Tabel Supplier-->
                      <div class="form-group">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">Pilih ID Supplier</label>

                        <select name="id_supplier">
                            <option value="">-- Pilih ID Supplier --</option>
                            <?php
                                include "../koneksi.php";

                                $supplier = mysqli_query($koneksi, "SELECT * FROM `supplier`");
                                while ($dataSupplier = mysqli_fetch_array($supplier)) {
                            ?>
                            <option value="<?php echo $dataSupplier['id_supplier'] ?>"><?php echo $dataSupplier['id_supplier'] ?></option>

                            <?php 
                                } 
                            ?>
                        </select>

                    </div>
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
            if (document.forms["formPendaftaran"]["id_produk"].value == "") {
                alert("Id Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_produk"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["nama_tas"].value == "") {
                alert("Nama Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["nama_tas"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["warna"].value == "") {
                alert("Warna Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["warna"].focus();
                return false;
            }
			if (document.forms["formPendaftaran"]["stok"].value == "") {
                alert("Stok Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["stok"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["harga"].value == "") {
                alert("Harga Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["harga"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["id_jenis"].value == "") {
                alert("Id Jenis Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_jenis"].focus();
                return false;
            }
            if (document.forms["formPendaftaran"]["id_supplier"].value == "") {
                alert("Id Supplier Tidak Boleh Kosong");
                document.forms["formPendaftaran"]["id_supplier"].focus();
                return false;
            }
        }
</script>


<?php 

	$id_produk 		    = $_POST['id_produk'];
	$nama_tas           = $_POST['nama_tas'];
	$warna 	            = $_POST['warna'];
	$stok 		        = $_POST['stok'];
	$harga             	= $_POST['harga'];
	$id_jenis 	        = $_POST['id_jenis'];
    $id_supplier        = $_POST['id_supplier'];
	

	$simpan 	= $_POST['simpan'];

	if ($simpan) {
		$sql=$koneksi->query("CALL Add_Produk('$id_produk', '$nama_tas', '$warna', '$stok', '$harga', '$id_jenis', '$id_supplier')");

		if ($sql) {
		?>	
		
		<script type="text/javascript">
			alert("Berhasil Diinput");
			window.location.href="index.php?page=produk";
		</script>	

<?php 

		}
	}

?>

 



