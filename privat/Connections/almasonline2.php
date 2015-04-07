<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_almasonline2 = "localhost";
$database_almasonline2 = "pelisonline";
$username_almasonline2 = "root";
//$username_almasonline = "pelis";
$password_almasonline2 = "admin";
//$password_almasonline = "almasfilmin";
$almasonline2 = mysql_pconnect($hostname_almasonline2, $username_almasonline2, $password_almasonline2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>