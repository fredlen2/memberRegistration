<?php 
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","PASSword1");
define("DB_NAME","paxRomanadata");

$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$connection)
{
	die("Failed to connect to the database server". mysql_error());
}
$db_select = mysql_select_db(DB_NAME,$connection);
if(!$db_select){
die("Failed to select database". mysql_error());
}

?>