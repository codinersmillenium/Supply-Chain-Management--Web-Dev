<?php

mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("responsi_prm") or die(mysql_error());
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

for($bulan = 1;$bulan < 13;$bulan++)
{
	$query = mysql_query("SELECT sum(jmlproduksi) AS total,tglproduksi FROM produk,produksi WHERE produksi.idprod=produk.idproduk and MONTH(tglproduksi)='$bulan'");
	$row = mysql_fetch_array($query);
	$jumlah_produk[] = $row['total'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	
</head>
<body>
	<div style="width: 800px;height: 800px">
		<canvas id="myChart"></canvas>
	</div>

<script src="asset/plugins/chart.js/Chart.min.js"></script>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Penjualan',
					data: <?php echo json_encode($jumlah_produk); ?>,
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
</body>
</html>