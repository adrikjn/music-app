<?php

session_start();


$pdo = new PDO('mysql:host=localhost;dbname=crud_alone',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
);

define('BASE', '/crud_alone/');


function debug($var){
    echo "<pre>";
       var_dump($var);
    echo "</pre>";
}

