<?php
require("db.php");
try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (?)");
    foreach (['Joe','Ben'] as $name)
    {
        $stmt->execute([$name]);
    }
    $pdo->commit();
}catch (Exception $e){  //you have catch an Exception, not PDOException
    $pdo->rollback();
    throw $e;   //you should re-throw an exception after rollback, to be notified of the problem the usual way.
}
?>