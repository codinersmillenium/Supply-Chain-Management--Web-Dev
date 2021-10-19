<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
$idproduk = $_POST['idproduk'];
 $nama = $_POST['nama'];
 $harga = $_POST['harga'];
 $satuan = $_POST['satuan'];
 //$password = $_POST['password'];
 // buat query update

 $sql = "UPDATE produk SET nmproduk='$nama',hargaprod='$harga',satuan='$satuan' where idproduk='$idproduk'";
 $query = mysql_query($sql) ;
 // apakah query update berhasil?
 if( $query ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: ../dataproduksi.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());

 }
?>