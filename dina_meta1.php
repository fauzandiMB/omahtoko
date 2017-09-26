<?php
$sql = mysql_query("select nama_produk from produk where id_produk='$_GET[id]'");
$j   = mysql_fetch_array($sql);

if (isset($_GET['id'])){
		echo "$j[nama_produk]";
}
else{
      $sql2 = mysql_query("select meta_deskripsi from profil");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_deskripsi]";
}
?>
