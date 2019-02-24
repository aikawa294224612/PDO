<?php
$data = ['name' => 'foo', 'submit' => 'submit']; // data for insert
$allowed = ["name", "surname", "email"]; // allowed fields
$values = [];
$set = "";
foreach ($allowed as $field) {
    if (isset($data[$field])) {
        $set.="`".str_replace("`", "``", $field)."`". "=:$field, ";
        $values[$field] = $data[$field];
    }
}
$set = substr($set, 0, -2); 

require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   //http://php.net/manual/en/mysqlinfo.concepts.buffering.php
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$result=$pdo->query($sql);    
    while($row=$result->fetch(PDO::FETCH_OBJ)){    
			echo $row->title;
    	}
  

?>