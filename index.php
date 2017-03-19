<?php
/**
 * Created by IntelliJ IDEA.
 * User: sabau
 * Date: 19/03/17
 * Time: 10.47
 */
require "DB.php";


$servername = "localhost";
$dbname = "interview";
$username = "interview";
$password = "interview";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;


$DB = new \interview\DB();
if ($DB->hasError()) {
    echo $DB->getError();
}else{
    $dbh = $DB->getDbh();
    $noname = "name";
    $sth = $dbh->prepare('SELECT name FROM test
    WHERE name != :name');
    $sth->bindParam(':name', $noname);
    $sth->execute();
}


