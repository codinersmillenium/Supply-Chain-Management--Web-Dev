<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
 $id = $_POST['id_user'];
 $nama = $_POST['nama'];
 $role = $_POST['jabatan'];
 $alamat = $_POST['alamat'];
 $email = $_POST['email'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 // buat query update

 $sql = "UPDATE user SET iduser=$id,nama='$nama',username='$username',password='$password',email='$email',alamat='$alamat',idrole='$role' WHERE iduser=$id";
 $query = mysql_query($sql);
 // apakah query update berhasil?
 if( $query ) {
 // kalau berhasil alihkan ke halaman list-siswa.php
 header('Location: ../datakaryawan.php?status=succes');
 } else {
 // kalau gagal tampilkan pesan
 echo die(mysql_error());

 }
?>