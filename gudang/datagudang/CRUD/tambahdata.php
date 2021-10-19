<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
 //$id = $_POST['id'];
$role = $_POST['role'];
 $jml = $_POST['Jumlah'];
 $tgl = $_POST['tanggal'];
 $ket = $_POST['ket'];
$result = mysql_query("SELECT jumlahstok FROM bahanbaku WHERE idbbk='$role'");
while ( $bbk= mysql_fetch_array($result)) {
	# code...
	$newstok1= $bbk['jumlahstok'];
}
if (isset($_POST['masuk'])) {
	# code...
$newstok=$jml+$newstok1;
 // buat query update
 $sql = "INSERT INTO bbkmasuk(idbahan,tanggalmasuk,jumlahmasuk) VALUES ('$role','$tgl','$jml')";
 $sql1 = "UPDATE bahanbaku SET jumlahstok='$newstok' where idbbk='$role'";
 $query = mysql_query($sql);
 $query1 = mysql_query($sql1);
 // apakah query update berhasil?
 	if( $query1 && $query  ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: Forminput.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());
 }
}
else if (isset($_POST['keluar'])) {
	# code...
$kurangstok=$newstok1-$jml;
 // buat query update
 $sql = "INSERT INTO bbkkeluar(idbahan,tanggalkeluar,jumlahkeluar,keterangan) VALUES ('$role','$tgl','$jml','$ket')";
 $sql1 = "UPDATE bahanbaku SET jumlahstok='$kurangstok' where idbbk='$role'";
 $query = mysql_query($sql);
 $query1 = mysql_query($sql1);
 // apakah query update berhasil?
 	if( $query1 && $query  ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: Formoutput.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());
 }
}
?>