<?php  
require("db.php");
$pdoexample="PDO";
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   //http://php.net/manual/en/mysqlinfo.concepts.buffering.php
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding WHERE title LIKE '%?%'";
$sth=$pdo->prepare($sql);
$sth->execute(array($pdoexample));
  
    while($row=$sth->fetch(PDO::FETCH_OBJ)){    
			echo $row->title;
    	}
?>
