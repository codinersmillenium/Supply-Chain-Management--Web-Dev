<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
 //$id = $_POST['id'];


if (isset($_POST['produk'])) {
	# code...
 // buat query update
	$role = $_POST['role'];
$nama = $_POST['nama'];
 $Harga = $_POST['Harga'];
 $satuan = $_POST['satuan'];
 $sql = "INSERT INTO produk(bahan,nmproduk,hargaprod,satuanprod) VALUES ('$role','$nama','$Harga','$satuan')";
 $query = mysql_query($sql);
 // apakah query update berhasil?
 	if( $query  ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: Forminput.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());
 }
}
else if (isset($_POST['produksi'])) {
	# code...
 // buat query update
 $jml = $_POST['jml'];
 $tgl = $_POST['tgl'];
 $list = $_POST['list'];
 $kode = $_POST['kode'];
 $sql = "INSERT INTO produksi(tglproduksi,jmlproduksi,idprod,idbbkk) VALUES ('$tgl','$jml','$list','$kode')";
 $query = mysql_query($sql);
 // apakah query update berhasil?
 	if( $query  ) {
 		$result = mysql_query("SELECT jml FROM produk WHERE idproduk='$role'");
while ( $bbk= mysql_fetch_array($result)) {
	# code...
	$newstok1= $bbk['jml'];
}
$tambahstok=$newstok1+$jml;
 		$sql1 = "UPDATE produk SET jml='$tambahstok' where idproduk='$list'";
 		mysql_query($sql1);
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: Formoutput.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo "<script>alert('Bahan Baku Belum Di Sediakan atau Kode Produksi Tidak Sesuai')</script>";
 }
}
?>