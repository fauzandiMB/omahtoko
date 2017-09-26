<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='label' AND $act=='hapus'){
	$label=mysql_fetch_array(mysql_query("SELECT * FROM label WHERE id_label='$_GET[id]'"));
  mysql_query("DELETE FROM label WHERE id_label='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input label
elseif ($module=='label' AND $act=='input'){
  $label_seo = seo_title($_POST['nama_label']);
  mysql_query("INSERT INTO label(nama_label,label_seo) VALUES('$_POST[nama_label]','$label_seo')");
  header('location:../../media.php?module='.$module);
}

// Update label
elseif ($module=='label' AND $act=='update'){
  $label_seo = seo_title($_POST['nama_label']);
  mysql_query("UPDATE label SET nama_label='$_POST[nama_label]', label_seo='$label_seo', aktif='$_POST[aktif]' 
               WHERE id_label = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
