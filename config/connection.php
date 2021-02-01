<?php

$config = require "database.php";

$conn = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database'],
);

if ($conn->connect_error) {
    die($conn->connect_error);
}

// Distruggo la variabile $config per evitare venga riutulizzata in altri file
unset($config);
