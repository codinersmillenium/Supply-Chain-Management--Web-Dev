<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
// cek apakah tombol simpan sudah diklik atau blum?
 // ambil data dari formulir
 //$id = $_POST['id'];
 $nama = $_POST['nama'];
 $role = $_POST['role'];
 $alamat = $_POST['alamat'];
 $email = $_POST['email'];
 $username = $_POST['username'];
 $password = $_POST['pass'];
 // buat query update
 $sql = "INSERT INTO user(nama,idrole,username,password,email,alamat) VALUES ('$nama','$role','$username','$password','$email','$alamat')";
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