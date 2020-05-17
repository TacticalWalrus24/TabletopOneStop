<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//this file is to connect to the database to retrieve and write data
//this is the address of the database. since the database is on the same host, we can use "localhost"
$host = "localhost";
//this is the database user that the website will use
$dbuser = "storeuser";
//this is the password for the database user
$dbpassword = "password";
//this is the name of the database
$database = "websiteassignment";

$dbconnection = new mysqli($host,$dbuser,$dbpassword,$database);
?>