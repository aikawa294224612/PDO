<?php
require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false); 
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT count(*) FROM phpcoding";
$result=$pdo->query($sql)->fetchColumn();    
   echo "共".$result."筆";
?>