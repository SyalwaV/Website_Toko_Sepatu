<?php 

	$id_transaksi = $_GET['id_transaksi'];
	$sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi';";
	mysqli_query($koneksi,$sql);
 ?>

 		<script type="text/javascript">
			alert("Berhasil DiHapus");
			window.location.href="?page=transaksi";
		</script>	