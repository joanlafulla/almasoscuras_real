<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_txt = "localhost";
$database_txt = "alma3";
$username_txt = "root";
//$username_almasonline = "pelis";
$password_txt = "admin";
//$password_almasonline = "almasfilmin";
$txt = mysql_pconnect($hostname_txt, $username_txt, $password_txt) or trigger_error(mysql_error(),E_USER_ERROR); 
?>