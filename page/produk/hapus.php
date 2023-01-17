<?php 

	$id_produk = $_GET['id_produk'];
	$sql = "DELETE FROM produk where id_produk='$id_produk';";
	mysqli_query($koneksi,$sql);
 ?>

 		<script type="text/javascript">
			alert("Berhasil DiHapus");
			window.location.href="?page=produk";
		</script>	