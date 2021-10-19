<?php 

mysql_connect("localhost:3308","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
session_start();


$username=$_POST['username'];
$password=md5($_POST['password']);

$cek_username = mysql_num_rows(mysql_query("SELECT * FROM user WHERE username='$username'"));
if ($cek_username > 0) {
	$cek_password = mysql_num_rows(mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'"));
	if ($cek_password > 0) {
		$user = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE username='$username'"));
		$_SESSION['id_user']=$user['iduser'];
		header("Location: role.php");
		# code...
	}else{
		header("Location:index.php?error=username dan password salah!");
	}
}else{
		header("Location:index.php?error=username tidak ditemukan!");
	# code...
}

 ?>
