<?php
// DATABASE CONNECTION
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'university');
define('DB_PORT', 8889);

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($connection && $connection->connect_error){
    echo 'Connessione fallita: ' . $connection->connect_error;
    die();
}
?>