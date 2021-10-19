 <?php 
 mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("responsi_prm") or die(mysql_error());

$nama = (isset($_POST['nama'])) ? $_POST['nama']:null;
$kategori = (isset($_POST['kategori'])) ? $_POST['kategori']:null;
$harga_awal = (isset($_POST['harga_awal'])) ? $_POST['harga_awal']:null;
$harga_akhir = doubleval((isset($_POST['harga_akhir'])) ? $_POST['harga_akhir']:null);
$page = (isset($_GET['page'])) ? $_GET['page']:1;
$perpage =10;
//$harga_awal1 = doubleval($harga_awal);
////$harga_akhir1 = doubleval($harga_akhir);

$query ="SELECT * FROM bahanbaku,kategoribbk,user WHERE bahanbaku.idkategoriBBKFK=kategoribbk.idkategoriBBK and bahanbaku.idsupplier=user.iduser";

if ($nama != null) {
	$query.= " and namaBBK like '%$nama%'";
	# code...
}
if ($kategori != null) {
	$query.= " and kategoribbk.idkategoriBBK='$kategori'";
	# code...
}
if ($harga_awal != null) {

	$query.= " and harga >= '$harga_awal'";
	# code...
}
if ($harga_akhir != null) {
	$query.= " and harga <= '$harga_akhir'";
	# code...
}

$from_page = (($page-1)*$perpage);
$with_limit = " order by namaBBK asc limit $from_page,$perpage";
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
		'idbbk' => $row['idbbk'],
		'namaBBK' => $row['namaBBK'],
		'kategori' => $row['jenisBBK'],
		'jumlahstok' => $row['jumlahstok'],
		'harga' => $row['harga'],
		'satuan' => $row['satuan'],
		'supplier' => $row['nama'],

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