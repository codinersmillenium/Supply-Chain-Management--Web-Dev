 <?php 
 mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("praktikum_prm") or die(mysql_error());

$nama_konsumen = (isset($_POST['nama_konsumen'])) ? $_POST['nama_konsumen']:null;
$kota = (isset($_POST['kota'])) ? $_POST['kota']:null;
$email = (isset($_POST['email'])) ? $_POST['email']:null;
$handphone = (isset($_POST['handphone'])) ? $_POST['handphone']:null;
$alamat = (isset($_POST['alamat'])) ? $_POST['alamat']:null;
$tgl_awal = (isset($_POST['tgl_awal'])) ? $_POST['tgl_awal']:null;
$tgl_akhir = (isset($_POST['tgl_akhir'])) ? $_POST['tgl_akhir']:null;
$page = (isset($_GET['page'])) ? $_GET['page']:1;
$perpage =10;

$query ="SELECT * FROM konsumen,kota WHERE konsumen.id_kota=kota.id_kota";

if ($nama_konsumen != null) {
	$query.= " and nama_konsumen like '%$nama_konsumen%'";
	# code...
}
if ($email != null) {
	$query.= " and email like '%$email%'";
	# code...
}
if ($handphone != null) {
	$query.= " and handphone like '%$handphone%'";
	# code...
}
if ($alamat != null) {
	$query.= " and alamat like '%$alamat%'";
	# code...
}

if ($tgl_awal != null) {
	$query.= " and tanggal_daftar >= '$tgl_awal'";
	# code...
}
if ($tgl_akhir != null) {
	$query.= " and tanggal_daftar <= '$tgl_akhir'";
	# code...
}
if ($kota != null) {
	$query.= " and kota.id_kota='$kota'";
	# code...
}
$from_page = (($page-1)*$perpage);
$with_limit = " order by nama_konsumen asc limit $from_page,$perpage";
$getQuery = mysql_query($query.$with_limit) or die(mysql_error());
$count = mysql_num_rows(mysql_query($query));
$firstpage = 1;
$currentpage = intval($page);
$lastpage = ceil($count/$perpage);
$nextpage = ($currentpage == $lastpage) ? null : $currentpage+1;
$prevpage = ($currentpage == 1 ) ? null : $currentpage-1;

$data = [];
while ($row = (mysql_fetch_array($getQuery))) {
	# code...
	$record = [
		'id_konsumen' => $row['id_konsumen'],
		'nama_konsumen' => $row['nama_konsumen'],
		'handphone' => $row['handphone'],
		'email' => $row['email'],
		'alamat' => $row['alamat'],
		'tanggal_daftar' => $row['tanggal_daftar'],
		'nama_kota' => $row['nama_kota']

	];
	array_push($data, $record);
}

$response = [
	'first_page' => $firstpage,
	'current_page' => $currentpage,
	'last_page' => $lastpage,
	'next_page' => $nextpage,
	'prev_page' => $prevpage,
	'per_page' => $perpage,
	'total' => $count,
	'data' => $data
];

header('Content-Type: application/json');
echo json_encode($response);










       ?>