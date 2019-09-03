<?php
$dsn = "mysql:dbname=php_pdo_mariadb;host=localhost:3307";
$username = "root";
$password = "";
try{
	$con = new PDO($dsn, $username, $password);
	// throw exceptions, when SQL error is caused
	$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	// prevent emulation of prepared statements
	$con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
}catch(PDOException $e){
	die("Connecion error : ".$e->getMessage());
}
