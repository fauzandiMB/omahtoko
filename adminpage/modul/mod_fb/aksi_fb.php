<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Update profil
if ($module=='fb' AND $act=='update'){
	  if (empty($_POST['id'])){
      mysql_query("INSERT INTO facebook(nama_widget,alamat_fb) VALUES('$_POST[widget]','$_POST[fb]')");
  }
   else{
   mysql_query("UPDATE facebook SET nama_widget = '$_POST[widget]',
                                  alamat_fb         = '$_POST[fb]' ");   
  }
  header('location:../../media.php?module='.$module);
}
}
?>
