<?php


//echo 'My query' . $q;

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
$sql = 'SELECT * FROM events WHERE city LIKE :query';

$q = $_POST['query'];
$sth = $dbh->prepare($sql);
$sth->execute(array(':query' =>  "%$q%"));

$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

?>