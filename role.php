<?php 
mysql_connect("localhost:3308","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());
session_start();

if (isset($_SESSION['id_user'])) 
{
	# code...
	$id_user = $_SESSION['id_user'];
	$query = mysql_query("SELECT * FROM user
		WHERE iduser='$id_user'");
	$user = mysql_fetch_array($query);
	switch ($user['idrole']) {
		case 1:
		$_SESSION['role']=$user['nama'];
		$_SESSION['username']=$user['username'];
		header("Location: admin/");
			# code...
			break;
		 	
		case 'manager':
		$_SESSION['role']="Manager";
		$_SESSION['username']=$user['username'];
		header("Location: manager/");
			# code...
			break;
		default:
			# code...
			break;
	}
}

else{
	header("Location: logout.php");
}

 ?>
 <button><a href="logout.php">logout</a></button>
