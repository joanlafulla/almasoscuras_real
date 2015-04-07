<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_posicion = "localhost";
$database_posicion = "posicion";
$username_posicion = "root";
//$username_top5 = "topalmas";
$password_posicion = "admin";
//$password_top5 = "huesitop";
$top = mysql_pconnect($hostname_posicion, $username_posicion, $password_posicion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>