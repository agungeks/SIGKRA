<?php
header('Content-Type: application/json');

require ('connect.php');

$sql = "SELECT * FROM pekerjaan LEFT JOIN keckra
ON pekerjaan.idkec=keckra.idkec;";

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
		"idpekerjaan":"'.$x['idpekerjaan'].'",
		"belumbekerja":"'.$x['belumbekerja'].'",
		"irt":"'.$x['irt'].'",
		"pelajarmhs":"'.$x['pelajarmhs'].'",
		"pensiun":"'.$x['pensiun'].'",
		"pns":"'.$x['pns'].'",
		"tni":"'.$x['tni'].'",
		"polisi":"'.$x['polisi'].'",
		"perdagangan":"'.$x['perdagangan'].'",
		"petani":"'.$x['petani'].'",
		"peternak":"'.$x['peternak'].'",
		"insdustri":"'.$x['insdustri'].'",
		"konstruksi":"'.$x['konstruksi'].'",
		"transportasi":"'.$x['transportasi'].'",
		"karyawanswasta":"'.$x['karyawanswasta'].'",
		"bumnbumd":"'.$x['bumnbumd'].'",
		"bhl":"'.$x['bhl'].'",
		"perkebunan":"'.$x['perkebunan'].'",
		"dosen":"'.$x['dosen'].'",
		"guru":"'.$x['guru'].'",
		"dokter":"'.$x['dokter'].'",
		"pedagang":"'.$x['pedagang'].'",
		"perangkatdesa":"'.$x['perangkatdesa'].'",
		"wiraswasta":"'.$x['wiraswasta'].'",
		"tahun":"'.$x['tahun'].'",
		"satuan":"'.$x['satuan'].'",
		"polygon":"'.$x['polygon'].'"
	},';
}

$json = substr($json,0,strlen($json)-1);
$json .= ']';
$json .= '}}';

echo $json;
?>