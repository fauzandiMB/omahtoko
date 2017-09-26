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

// Hapus sub menu
if ($module=='menuutama' AND $act=='hapus'){
	$menu=mysql_fetch_array(mysql_query("SELECT * FROM menuutama WHERE id_main='$_GET[id]'"));
  mysql_query("DELETE FROM menuutama WHERE id_main='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input menu utama
elseif ($module=='menuutama' AND $act=='input'){
  mysql_query("INSERT INTO menuutama(nama_menu,link,aktif,lokasi,hakakses,icon,urutan) VALUES('$_POST[nama_menu]','$_POST[link]','$_POST[aktif]','$_POST[lokasi]','$_POST[hakakses]','$_POST[icon]','$_POST[urutan]')");
  header('location:../../media.php?module='.$module);
}

// Update menu utama
elseif ($module=='menuutama' AND $act=='update'){
  mysql_query("UPDATE menuutama SET nama_menu='$_POST[nama_menu]', link='$_POST[link]', aktif='$_POST[aktif]', lokasi='$_POST[lokasi]' , hakakses='$_POST[hakakses]', icon='$_POST[icon]', urutan='$_POST[urutan]'
               WHERE id_main = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
