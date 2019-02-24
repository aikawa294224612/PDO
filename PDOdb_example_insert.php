<?php
require("db.php");
$firstname = $_POST['firstname'];
$intro = str_replace("\'", "\'\'",$_POST['intro']);
$lastname = str_replace("\'", "\'\'",$_POST['lastname']);
$url = $_POST['url'];
$da=date("Y-m-d");  
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false); 
$pdo->query('SET NAMES "utf8"');  
$sql = "INSERT INTO phpcoding (title,intro,php,url,date) VALUES (?,?,?,?,?)";

$sth = $pdo->prepare($sql);
$sth->execute(array($firstname,$intro,$lastname,$url,$da));
$pdo = NULL;
echo "<meta http-equiv=REFRESH CONTENT=0.5;url=index.php>";
?>