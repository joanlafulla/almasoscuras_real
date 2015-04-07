<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_almasonline = "localhost";
$database_almasonline = "pelisonline";
$username_almasonline = "root";
//$username_almasonline = "pelis";
$password_almasonline = "";
//$password_almasonline = "almasfilmin";
$almasonline = mysql_pconnect($hostname_almasonline, $username_almasonline, $password_almasonline) or trigger_error(mysql_error(),E_USER_ERROR); 
?>