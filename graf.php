
<?php
include('koneksi.php');
$produk = mysqli_query($koneksi,"select * from produk");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['nama_tas'];
	
	$query = mysqli_query($koneksi,"select sum(jumlah_beli) as jumlah_laba from transaksi where id_produk='".$row['id_produk']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah_laba'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Grafik Laba per produk</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<center><h1>Grafik Laba per produk</h1></center>
<center>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_produk); ?>,
				datasets: [{
					label: 'Grafik Penjualan',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</center>
</body>
</html>