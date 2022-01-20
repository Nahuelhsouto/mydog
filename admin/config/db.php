<?php
$host="localhost";
$db="mydog";
$user="root";
$pass="";

try {
    
    $connection= new PDO("mysql:host=$host;dbname=$db",$user,$pass);
 
} catch ( Exception $ex) {
    
    echo $ex->getMessage();
}

?>