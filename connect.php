<?php
$connect="127.0.0.1";
$user="root";
$password="";
$con=mysql_connect("$connect","$user","$password")or die("could not connect to the database");
mysql_select_db('tuition',$con);
?>
