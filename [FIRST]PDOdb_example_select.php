<?php
require("db.php");
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$rows=$pdo->query($sql)->fetchAll();
do {
    foreach($rows as $row){    
			echo $row['title']."<br/>";
    	}
}while($result->nextRowset() && $result->columnCount());    
?>