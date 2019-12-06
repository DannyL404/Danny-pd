<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'deebee.hippycentral.org');
define('DB_USERNAME', 'teamcyberino');
define('DB_PASSWORD', 'Recent-Purple-Belt-Propose-6');
define('DB_NAME', 'hj_danny');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>