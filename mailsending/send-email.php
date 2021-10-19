<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'system_info.php';
	

	//ketik dari sini

	if (!isset($_POST['email'])) {
		echo "email kosong";
		die();
	}
	if (!isset($_POST['subject'])) {
		echo "subject kosong";
		die();
	}
	if (!isset($_POST['pesan'])) {
		echo "pesan kosong";
		die();
	}
	

	$mail = new PHPMailer;
	$mail ->isSMTP();
	$mail ->SMTPDebug = 0;
	$mail ->Debugoutput = 'html';
	$mail ->Host = 'smtp.gmail.com';
	$mail ->Port = 587;
	$mail ->SMTPSecure = 'tls';
	$mail ->SMTPAuth = true;
	$mail ->Username = "######";
	$mail ->Password = "######";
	$mail ->setFrom('email','name');
$id =$_POST['email'];
mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("webmail") or die(mysql_error());
		$email = mysql_query("SELECT * FROM datauser WHERE iduser='$id'");
           while ( $row= mysql_fetch_array($email)) {
			$record=$row['email'];
			$nama=$row['nama'];
	} 
	$mail ->addAddress($record,$nama);
	$mail ->Subject = $_POST['subject'];
	$email_vars = array(
		'nama' => $nama,
		'tanggal' => date('d F Y'),
		'pesan' => $_POST['pesan'],
		'sender_info' => sender_info(),
		'pengirim' => 'Administrator PT XYZ',
		'email_pengirim' => 'animanindo@gmail.com',
		'telepon_pengirim' =>'+6281234567',
		'alamat_pengirim' =>'Jl. Laksda Adisucipto 6km Yogyakarta'

	);
	$body = file_get_contents('template.phtml');
	if (isset($email_vars)) {
		foreach ($email_vars as $key => $value) {
			$body = str_replace('{'.($key).'}', $value, $body);
		}
	}
	$mail->msgHTML($body);

	if (!$mail->send()) {
		echo "Email Error: ". $mail->ErrorInfo;
	}else{
	$subject = $_POST['subject'];
    $pesan = $_POST['pesan'];
    $tanggal = date('Y-m-d h:i:s');
    $iduser = $_POST['email'];
    // buat query
    $sql = "INSERT INTO pesan(subject,pesan,status,tanggal,iduser) VALUE ('$subject','$pesan','terkirim','$tanggal','$iduser')";
    $query = mysql_query($sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses       
   header('Location: ../dashboard/index.php?status=Terkirim'); 
    } else {
   
        header('Location: ../dashbord/index.php?status=Tunda');
    }
	}
?>