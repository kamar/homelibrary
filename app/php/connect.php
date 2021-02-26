<?php

function con_homelibrary(){

    $host = "localhost"; 
    $user = "km"; 
    $pass = "j@nuoyla_01"; 
    $db = "homelibrary"; 
    
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n"); 
    
    return $con;
}


functionn pdo_homelibrary(){
    $host = "localhost"; 
    $user = "km"; 
    $pass = "j@nuoyla_01"; 
    $db = "homelibrary";

    try {
        $con = new PDO("pgsql:dbname=$db;host=$host;user=$user;password=$pass")
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return $con;
}
?>