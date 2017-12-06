<?php
header('Content-Type: application/json');

require ('connect.php');

$sql = "SELECT * FROM profilkec LEFT JOIN keckra
ON profilkec.idkec=keckra.idkec;";

$data = mysql_query($sql);

$json = '{"karanganyar": {';
$json .= '"lahan":[ ';
while($x = mysql_fetch_assoc($data)){
	$json .= '{';
	$json .= '
	    "idkec":"'.$x['idkec'].'",
		"nama_kecamatan":"'.htmlspecialchars($x['nama_kecamatan']).'",
		"warna":"'.$x['warna'].'",
		"foto":"'.$x['foto'].'",
		"idprofil":"'.$x['idprofil'].'",
		"email":"'.$x['email'].'",
		"alamat":"'.$x['alamat'].'",
		"desa":"'.$x['desa'].'",
		"penduduk":"'.$x['penduduk'].'",
		"geografis":"'.$x['geografis'].'",
		"industri":"'.$x['industri'].'",
		"pertanian":"'.$x['pertanian'].'",
		"pertambangan":"'.$x['pertambangan'].'",
		"pariwisata":"'.$x['pariwisata'].'",
		"pasar":"'.$x['pasar'].'",
		"polygon":"'.$x['polygon'].'"
	},';
}

$json = substr($json,0,strlen($json)-1);
$json .= ']';
$json .= '}}';

echo $json;
?>