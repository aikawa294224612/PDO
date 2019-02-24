<?php
require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   
// $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$result=$pdo->query($sql);    
    while($row=$result->fetch(PDO::FETCH_OBJ)){    
			// echo $row->title;
    	}
  /*Get the current error mode of PDO*/
	$current_error_mode = $pdo->getAttribute(PDO::ATTR_ERRMODE);
	echo "<br>";
	echo "Value of PDO::ATTR_ERRMODE: ".$current_error_mode;    //Value of PDO::ATTR_ERRMODE: 0
?>


<?php
require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$result=$pdo->query($sql);    
    while($row=$result->fetch(PDO::FETCH_OBJ)){    
			// echo $row->title;
    	}
  /*Get the current error mode of PDO*/
	$current_error_mode = $pdo->getAttribute(PDO::ATTR_ERRMODE);
	echo "<br>";
	echo "Value of PDO::ATTR_ERRMODE: ".$current_error_mode;    //Value of PDO::ATTR_ERRMODE:2
?>

<?php
require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdo->setAttribute( PDO::ATTR_PERSISTENT,true);
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$result=$pdo->query($sql);    
    while($row=$result->fetch(PDO::FETCH_OBJ)){    
			// echo $row->title;
    	}
  /*Get the current error mode of PDO*/
	$current_error_mode = $pdo->getAttribute(PDO::ATTR_ERRMODE);
	echo "<br>";
	echo "Value of PDO::ATTR_ERRMODE: ".$current_error_mode;    //Value of PDO::ATTR_ERRMODE:1
?>