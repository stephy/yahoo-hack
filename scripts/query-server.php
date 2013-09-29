<?php

 
$dns = 'mysql:host=50.63.244.199;dbname=yahoohack';
$usr = 'yahoohack';
$pass = 'Brazil88075@';
 
//PDO ==> Connection between PHP and a database server
 
try {
    $dbh = new PDO($dns, $usr, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 
 
$result = array();
$sql = 'SELECT * FROM events WHERE city LIKE :query OR state LIKE :query';
$q =  $_GET['q'];
try{
    $sth = $dbh->prepare($sql);
 
    $sth->execute(array(':query' =>  "%$q%"));
 
    foreach ($sth->fetchAll() as $res) {
        $result[] = array("{$res['city']}, {$res['state']}");
    }
     
 } catch (PDOException $ex) {}

echo json_encode(array_unique($result));
?>