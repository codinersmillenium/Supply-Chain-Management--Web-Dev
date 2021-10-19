 <?php 
 mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("responsi_prm") or die(mysql_error());

$nama = (isset($_POST['nama'])) ? $_POST['nama']:null;
$kategori = (isset($_POST['kategori'])) ? $_POST['kategori']:null;
$harga_awal = (isset($_POST['harga_awal'])) ? $_POST['harga_awal']:null;
$harga_akhir = (isset($_POST['harga_akhir'])) ? $_POST['harga_akhir']:null;
$nmbahan = (isset($_POST['nmbahan'])) ? $_POST['nmbahan']:null;
$page = (isset($_GET['page'])) ? $_GET['page']:1;
$perpage =10;
//$harga_awal1 = doubleval($harga_awal);
////$harga_akhir1 = doubleval($harga_akhir);

$query ="SELECT * FROM produksi,produk,bbkkeluar,bahanbaku,kategoribbk WHERE produksi.idprod=produk.idproduk and produksi.idbbkk=bbkkeluar.idBBKK and bbkkeluar.idbahan=bahanbaku.idbbk and bahanbaku.idkategoriBBKFK=kategoribbk.idkategoriBBK";

if ($nama != null) {
	$query.= " and nmproduk like '%$nama%'";
	# code...
}
if ($kategori != null) {
	$query.= " and kategoribbk.idkategoriBBK='$kategori'";
	# code...
}
if ($harga_awal != null) {

	$query.= " and hargaprod >= '$harga_awal'";
	# code...
}
if ($harga_akhir != null) {
	$query.= " and hargaprod <= '$harga_akhir'";
	# code...
}
if ($nmbahan != null) {
	$query.= " and namaBBK like '%$nmbahan%'";
	# code...
}

$from_page = (($page-1)*$perpage);
$with_limit = " order by nmproduk asc limit $from_page,$perpage";
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
		'idproduk' => $row['idproduk'],
		'nama' => $row['nmproduk'],
		'nmbahan' => $row['namaBBK'],
		'kategori' => $row['jenisBBK'],
		'tglproduksi' => $row['tglproduksi'],
		'jumlah' => $row['jmlproduksi'],
		'harga' => $row['hargaprod'],
		'satuan' => $row['satuanprod'],
		'stok' => $row['jml'],

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