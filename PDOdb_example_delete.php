<?php
require("db.php");
$id = $_POST['id'];
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false); 
$pdo->query('SET NAMES "utf8"');  
$sql = "DELETE FROM phpcoding WHERE id=?";
$sth = $pdo->prepare($sql);
$sth->execute($id);
$pdo = NULL;
echo "<meta http-equiv=REFRESH CONTENT=0.5;url=index.php>";
?>