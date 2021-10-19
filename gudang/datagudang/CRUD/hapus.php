<?php
 mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("responsi_prm") or die(mysql_error());


if(isset($_GET['id'])){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM bahanbaku WHERE idbbk=$id";
    $query = mysql_query($sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../datagudang.php');
    } else {
        echo die(mysql_error());
    }

} 

?>
