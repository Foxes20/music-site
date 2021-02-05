<?php

ini_set('display_errors', 1);


$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = 'root';
$dbName = 'music';
$dbPort = 8889;


$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $dbPort, );
$connection->query ('SET NAMES "utf8"');

  



