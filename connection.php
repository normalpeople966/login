<?php 
$db_fire = "localhost:E:\KEVINSUGIARTO_16N10003.FDB";
$user_fire = "SYSDBA";
$password_fire = "masterkey";
$conn_fire = ibase_connect($db_fire, $user_fire, $password_fire);

$db_mysql = "kevinsugiarto_16n10003";
$user_mysql = "root";
$password_mysql = "";
$conn_mysql = new mysqli("localhost", $user_mysql, $password_mysql, $db_mysql);
?>