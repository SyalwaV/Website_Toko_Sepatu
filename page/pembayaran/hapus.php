<?php 

	$id_pembayaran = $_GET['id_pembayaran'];
	$sql = "CALL Delete_Pembayaran('$id_pembayaran')";
	mysqli_query($koneksi,$sql);
 ?>

 		<script type="text/javascript">
			alert("Berhasil DiHapus");
			window.location.href="?page=pembayaran";
		</script>	