<?php 
mysql_connect("localhost","root","");
mysql_select_db("db_sippd");
$sql = "SELECT * FROM temp_rek ";
$query = mysql_query($sql);
while($data = mysql_fetch_array($query))
{
	//echo $data['kode'];
	$codes = explode(".",$data['kode']);
	$kode1 = $codes[0];
	$kode2 = $codes[1];
	$kode3 = $codes[2];
	$kode4 = $codes[3];
	$kode5 = $codes[4];
	if($kode2!="" AND $kode3=="")
		$parent_id = $kode1;
	elseif($kode3!="" AND $kode4=="")
		$parent_id = $kode2;
	elseif($kode4!=""  AND $kode3=="")
		$parent_id = $kode3;
	elseif($kode5!="")
		$parent_id = $kode4;
	$sql = "INSERT INTO rekening_belanja(uraian,parent_id,kode1,kode2,kode3,kode4,kode5) VALUES('".$data['uraian']."','".$parent_id."','".$kode1."','".$kode2."','".$kode3."','".$kode4."','".$kode5."');";
	mysql_query($sql);
	echo "$sql<br>";
}
?>