<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "tmu2012";
$db_select = "aikawa";
$charset="utf8";
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   //http://php.net/manual/en/mysqlinfo.concepts.buffering.php
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"'); 
?>