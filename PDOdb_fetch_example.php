<?php
require("db.php");
$dbconnect = "mysql:host=".$db_host.";dbname=".$db_select.";charset=".$charset;
$pdo = new PDO($dbconnect, $db_user, $db_pass);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);   //http://php.net/manual/en/mysqlinfo.concepts.buffering.php
$pdo->query('SET NAMES "utf8"');  
$sql = "SELECT * FROM phpcoding ORDER BY date DESC,id DESC";
$query=$pdo->query($sql); 
  
    foreach($query as $row){  
     echo $row['title']."<br/>";
    } 


//fetch() 與 fatchAll() 預設參數是 PDO::FETCH_BOTH (同時取得陣列key的編號與SQL欄位名稱，我習慣用這個)。
 //另有 PDO::FETCH_ASSOC 為陣列形式、PDO::FETCH_OBJ 為物件形式。

     $datalist = $result->fetchAll();
    foreach ($datalist as $datainfo)
    {
        echo $datainfo['title'] . "<br>";
    }


// //PDO::FETCH_CLASS
// // 這是提供給 PDO 使用的
class Member
{
    // 拼湊字串
    public function title()
    {
        return "{$this->id} | {$this->title} <br/> ";
    }
}

try
{
   
    // 指定提取樣式(fetch_style)為 PDO::FETCH_CLASS，並將它對應到我們自訂的類別 Member
    $datalist = $query->fetchAll(PDO::FETCH_CLASS, "Member"); 
    foreach ($datalist as $datainfo)
    {
        // 我們呼叫自訂的方法 title()
        echo $datainfo->title(); 
    }
 
}
catch(Exception $e)
{
    // 發生錯誤會顯示
    echo $e->getMessage();
}

/*output:
67 | Mysqlnd(native driver) and buffered queries. Huge datasets. 
66 | Emulation mode. PDO::ATTR_EMULATE_PREPARES 
64 | Object Relational Mapping(ORM) 
60 | [IMPORTANT]Appendix 3. False measures and bad practices. 
59 | Database Abstraction Layer 
58 | php中echo print print_r var_dump的差別 
57 | setcookie 
56 | magic_quotes_gpc 
55 | stream_context_create 
54 | http_build_query 
53 | PHP: cURL 
52 | str_repeat 
51 | Redis 
50 | binary safe 
49 | str_replace 
48 | string vsprintf ( string $format , array $args ) 
47 | array_shift 
46 | func_get_args() 
45 | mysqli_real_escape_string 
44 | Markdown 
43 | googla translate tk 
42 | 抓ajax 
41 | javamelody 
40 | JMeter 
39 | MQTT(使用mosquitto做broker)做Android推送总结 
38 | Git Upload 
37 | database 中文亂碼問題 
36 | PHP Standards Recommendations (PSR) 
35 | Telnet/SSH 
34 | Memcached 
33 | mbstring 
32 | nesbot/carbon 
31 | aura/filter 
30 | PDO 
29 | HTML Purifier 
28 | monolog 
27 | league/flysystem 
26 | aura/router 
25 | guzzle/http 
24 | [Component]Packagist 
23 | PHP 教學專欄 
22 | CGI 
21 | Eaccelerator 
20 | Ubike api 
19 | MQTT 
18 | Composer 
17 | [Restfil API] 
16 | [RESTful API]HTTP Verbs: 談 POST, PUT 和 PATCH 的應用 
15 | [AngularJS]Provider 
14 | [AngularJS] DI (Dependency Injection) 
13 | [Angular] Bootstrap 
12 | [javascript] setTimeout() 與 setInterval() 的不同之處 
11 | PHP Tutorial 
10 | JSON-PHP 
9 | Framework 與 Library 的差異 
8 | mvc/framework 
7 | php/mvc 
6 | php三層架構 
5 | Ajax for Chrome/IE 
4 | PHP Mailer (2)/Troubleshooting 
3 | PHP Mailer 
2 | guid 
1 | 12個PHP安全開發技巧 
*/


//fetchColumn():
$id=20;
$sql = "SELECT title FROM phpcoding WHERE id=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([$id]);
echo $stmt->fetchColumn();   
//output:Ubike api    



// //fetchAll():
$sql = "SELECT title FROM phpcoding ";
$query=$pdo->query($sql);
$data=$query->fetchAll(PDO::FETCH_ASSOC);

var_export($data);

// output:
// array ( 0 => array ( 'title' => '12個PHP安全開發技巧', ), 1 => array ( 'title' => 'guid', ), 2 => array ( 'title' => 'PHP Mailer', ), 3 => array ( 'title' => 'PHP Mailer (2)/Troubleshooting', ), 4 => array ( 'title' => 'Ajax for Chrome/IE', ), 5 => array ( 'title' => 'php三層架構', ), 6 => array ( 'title' => 'php/mvc', ), 7 => array ( 'title' => 'mvc/framework', ), 8 => array ( 'title' => 'Framework 與 Library 的差異', ), 9 => array ( 'title' => 'JSON-PHP', ), 10 => array ( 'title' => 'PHP Tutorial', ), 11 => array ( 'title' => '[javascript] setTimeout() 與 setInterval() 的不同之處', ), 12 => array ( 'title' => '[Angular] Bootstrap', ), 13 => array ( 'title' => '[AngularJS] DI (Dependency Injection) ', ), 14 => array ( 'title' => '[AngularJS]Provider', ), 15 => array ( 'title' => '[RESTful API]HTTP Verbs: 談 POST, PUT 和 PATCH 的應用', ), 16 => array ( 'title' => '[Restfil API]', ), 17 => array ( 'title' => 'Composer', ), 18 => array ( 'title' => 'MQTT', ), 19 => array ( 'title' => 'Ubike api', ), 20 => array ( 'title' => 'Eaccelerator', ), 21 => array ( 'title' => 'CGI', ), 22 => array ( 'title' => 'PHP 教學專欄', ), 23 => array ( 'title' => '[Component]Packagist', ), 24 => array ( 'title' => 'guzzle/http', ), 25 => array ( 'title' => 'aura/router', ), 26 => array ( 'title' => 'league/flysystem', ), 27 => array ( 'title' => 'monolog', ), 28 => array ( 'title' => 'HTML Purifier', ), 29 => array ( 'title' => 'PDO', ), 30 => array ( 'title' => 'aura/filter', ), 31 => array ( 'title' => 'nesbot/carbon', ), 32 => array ( 'title' => 'mbstring', ), 33 => array ( 'title' => 'Memcached', ), 34 => array ( 'title' => 'Telnet/SSH', ), 35 => array ( 'title' => 'PHP Standards Recommendations (PSR)', ), 36 => array ( 'title' => 'database 中文亂碼問題', ), 37 => array ( 'title' => 'Git Upload', ), 38 => array ( 'title' => 'MQTT(使用mosquitto做broker)做Android推送总结', ), 39 => array ( 'title' => 'JMeter', ), 40 => array ( 'title' => 'javamelody ', ), 41 => array ( 'title' => '抓ajax', ), 42 => array ( 'title' => 'googla translate tk', ), 43 => array ( 'title' => 'Markdown', ), 44 => array ( 'title' => 'mysqli_real_escape_string', ), 45 => array ( 'title' => 'func_get_args()', ), 46 => array ( 'title' => 'array_shift', ), 47 => array ( 'title' => 'string vsprintf ( string $format , array $args )', ), 48 => array ( 'title' => 'str_replace', ), 49 => array ( 'title' => 'binary safe', ), 50 => array ( 'title' => 'Redis', ), 51 => array ( 'title' => 'str_repeat', ), 52 => array ( 'title' => 'PHP: cURL ', ), 53 => array ( 'title' => 'http_build_query', ), 54 => array ( 'title' => 'stream_context_create', ), 55 => array ( 'title' => 'magic_quotes_gpc', ), 56 => array ( 'title' => 'setcookie', ), 57 => array ( 'title' => 'php中echo print print_r var_dump的差別', ), 58 => array ( 'title' => 'Database Abstraction Layer', ), 59 => array ( 'title' => '[IMPORTANT]Appendix 3. False measures and bad practices.', ), 60 => array ( 'title' => 'Object Relational Mapping(ORM)', ), 61 => array ( 'title' => 'Emulation mode. PDO::ATTR_EMULATE_PREPARES', ), 62 => array ( 'title' => 'Mysqlnd(native driver) and buffered queries. Huge datasets.', ), )


echo $data[0]['title'];
// //12個PHP安全開發技巧



$sql = "SELECT title FROM phpcoding ";
$query=$pdo->query($sql);
$data=$query->fetchAll(PDO::FETCH_COLUMN);

var_export($data);

// //array ( 0 => '12個PHP安全開發技巧', 1 => 'guid', 2 => 'PHP Mailer', 3 => 'PHP Mailer (2)/Troubleshooting', 4 => 'Ajax for Chrome/IE', 5 => 'php三層架構', 6 => 'php/mvc', 7 => 'mvc/framework', 8 => 'Framework 與 Library 的差異', 9 => 'JSON-PHP', 10 => 'PHP Tutorial', 11 => '[javascript] setTimeout() 與 setInterval() 的不同之處', 12 => '[Angular] Bootstrap', 13 => '[AngularJS] DI (Dependency Injection) ', 14 => '[AngularJS]Provider', 15 => '[RESTful API]HTTP Verbs: 談 POST, PUT 和 PATCH 的應用', 16 => '[Restfil API]', 17 => 'Composer', 18 => 'MQTT', 19 => 'Ubike api', 20 => 'Eaccelerator', 21 => 'CGI', 22 => 'PHP 教學專欄', 23 => '[Component]Packagist', 24 => 'guzzle/http', 25 => 'aura/router', 26 => 'league/flysystem', 27 => 'monolog', 28 => 'HTML Purifier', 29 => 'PDO', 30 => 'aura/filter', 31 => 'nesbot/carbon', 32 => 'mbstring', 33 => 'Memcached', 34 => 'Telnet/SSH', 35 => 'PHP Standards Recommendations (PSR)', 36 => 'database 中文亂碼問題', 37 => 'Git Upload', 38 => 'MQTT(使用mosquitto做broker)做Android推送总结', 39 => 'JMeter', 40 => 'javamelody ', 41 => '抓ajax', 42 => 'googla translate tk', 43 => 'Markdown', 44 => 'mysqli_real_escape_string', 45 => 'func_get_args()', 46 => 'array_shift', 47 => 'string vsprintf ( string $format , array $args )', 48 => 'str_replace', 49 => 'binary safe', 50 => 'Redis', 51 => 'str_repeat', 52 => 'PHP: cURL ', 53 => 'http_build_query', 54 => 'stream_context_create', 55 => 'magic_quotes_gpc', 56 => 'setcookie', 57 => 'php中echo print print_r var_dump的差別', 58 => 'Database Abstraction Layer', 59 => '[IMPORTANT]Appendix 3. False measures and bad practices.', 60 => 'Object Relational Mapping(ORM)', 61 => 'Emulation mode. PDO::ATTR_EMULATE_PREPARES', 62 => 'Mysqlnd(native driver) and buffered queries. Huge datasets.', )

echo $data[0];
// //12個PHP安全開發技巧



$sql = "SELECT id,title FROM phpcoding ";
$query=$pdo->query($sql);
$data=$query->fetchAll(PDO::FETCH_KEY_PAIR);

var_export($data);
/*
array ( 1 => '12個PHP安全開發技巧', 2 => 'guid', 3 => 'PHP Mailer', 4 => 'PHP Mailer (2)/Troubleshooting', 5 => 'Ajax for Chrome/IE', 6 => 'php三層架構', 7 => 'php/mvc', 8 => 'mvc/framework', 9 => 'Framework 與 Library 的差異', 10 => 'JSON-PHP', 11 => 'PHP Tutorial', 12 => '[javascript] setTimeout() 與 setInterval() 的不同之處', 13 => '[Angular] Bootstrap', 14 => '[AngularJS] DI (Dependency Injection) ', 15 => '[AngularJS]Provider', 16 => '[RESTful API]HTTP Verbs: 談 POST, PUT 和 PATCH 的應用', 17 => '[Restfil API]', 18 => 'Composer', 19 => 'MQTT', 20 => 'Ubike api', 21 => 'Eaccelerator', 22 => 'CGI', 23 => 'PHP 教學專欄', 24 => '[Component]Packagist', 25 => 'guzzle/http', 26 => 'aura/router', 27 => 'league/flysystem', 28 => 'monolog', 29 => 'HTML Purifier', 30 => 'PDO', 31 => 'aura/filter', 32 => 'nesbot/carbon', 33 => 'mbstring', 34 => 'Memcached', 35 => 'Telnet/SSH', 36 => 'PHP Standards Recommendations (PSR)', 37 => 'database 中文亂碼問題', 38 => 'Git Upload', 39 => 'MQTT(使用mosquitto做broker)做Android推送总结', 40 => 'JMeter', 41 => 'javamelody ', 42 => '抓ajax', 43 => 'googla translate tk', 44 => 'Markdown', 45 => 'mysqli_real_escape_string', 46 => 'func_get_args()', 47 => 'array_shift', 48 => 'string vsprintf ( string $format , array $args )', 49 => 'str_replace', 50 => 'binary safe', 51 => 'Redis', 52 => 'str_repeat', 53 => 'PHP: cURL ', 54 => 'http_build_query', 55 => 'stream_context_create', 56 => 'magic_quotes_gpc', 57 => 'setcookie', 58 => 'php中echo print print_r var_dump的差別', 59 => 'Database Abstraction Layer', 60 => '[IMPORTANT]Appendix 3. False measures and bad practices.', 64 => 'Object Relational Mapping(ORM)', 66 => 'Emulation mode. PDO::ATTR_EMULATE_PREPARES', 67 => 'Mysqlnd(native driver) and buffered queries. Huge datasets.', )
*/

echo $data[1];
//12個PHP安全開發技巧





$sql = "SELECT * FROM phpcoding WHERE id=1 ";  //lazy
$query=$pdo->query($sql);
$data=$query->fetchAll(PDO::FETCH_UNIQUE);

var_export($data);
/*array ( 
1 => array ( 
'title' => '12個PHP安全開發技巧', 0 => '12個PHP安全開發技巧', 
'intro' => '如何開發夠安全的PHP網頁？ 常見的登入邏輯錯誤漏洞', 1 => '如何開發夠安全的PHP網頁？ 常見的登入邏輯錯誤漏洞', 
'php' => '', 2 => '', 
'url' => 'https://www.qa-knowhow.com/?p=4625', 3 => 'https://www.qa-knowhow.com/?p=4625', 
'date' => '2018-05-04', 4 => '2018-05-04', ), )
*/

//indexes will be unique values from the first columns
//in this example with 'title' to be the group:
//we usually use the group to the first column(like sex:male or female)
$sql = "SELECT title,id,php FROM phpcoding WHERE id=2";  //lazy
$query=$pdo->query($sql);
$data=$query->fetchAll(PDO::FETCH_GROUP);

var_export($data);

/*
array ( 
'guid' => array ( 
0 => array ( 
'id' => 2, 0 => 2, 
'php' => '<?php function guid(){ if (function_exists(\'com_create_guid\')){ return com_create_guid(); }else{ mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up. $charid = strtoupper(md5(uniqid(rand(), true))); $hyphen = chr(45);// "-" $uuid = chr(123)// "{" .substr($charid, 0, 8).$hyphen .substr($charid, 8, 4).$hyphen .substr($charid,12, 4).$hyphen .substr($charid,16, 4).$hyphen .substr($charid,20,12) .chr(125);// "}" return $uuid; } } echo guid(); ?>', 1 => '<?php function guid(){ if (function_exists(\'com_create_guid\')){ return com_create_guid(); }else{ mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up. $charid = strtoupper(md5(uniqid(rand(), true))); $hyphen = chr(45);// "-" $uuid = chr(123)// "{" .substr($charid, 0, 8).$hyphen .substr($charid, 8, 4).$hyphen .substr($charid,12, 4).$hyphen .substr($charid,16, 4).$hyphen .substr($charid,20,12) .chr(125);// "}" return $uuid; } } echo guid(); ?>'
, )
, )
, )
*/

?>
