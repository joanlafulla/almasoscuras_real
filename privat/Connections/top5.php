<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_top5 = "localhost";
$database_top5 = "top5";
$username_top5 = "root";
//$username_top5 = "topalmas";
$password_top5 = "admin";
//$password_top5 = "huesitop";
$top = mysql_pconnect($hostname_top5, $username_top5, $password_top5) or trigger_error(mysql_error(),E_USER_ERROR); 
?>