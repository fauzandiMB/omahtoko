<?php
      $sql2 = mysql_query("select meta_keyword from profil");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
?>
