<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
 $nama = $_POST['nama'];
 $email = $_POST['Email'];
 $alamat = $_POST['Alamat'];
 //$password = $_POST['password'];
 // buat query update

 $sql = "INSERT INTO user SET nama='$nama',email='$email',alamat='$alamat',idrole='7'";
 $query = mysql_query($sql);
 // apakah query update berhasil?
 if( $query ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: Forminput.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());

 }
?>