<?php
if (isset($_GET['id'])){
    $sql = mysql_query("select nama_produk from produk where id_produk='$_GET[id]'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "$j[nama_produk]";
    } 
    else{
      $sql2 = mysql_query("select nama_toko from profil");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[nama_toko]";
		}
}
else{
      $sql3 = mysql_query("select nama_toko from profil");
      $j3   = mysql_fetch_array($sql3);
		  echo "$j3[nama_toko]";
}
?>
