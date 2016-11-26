<?php
define("SESSION_NAME", "pemira2016");

include(dirname(__FILE__) . '/credentials.php');

/* Tes koneksi */
try {
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
	printf("Error: %s<br>", $e->getMessage());
	die();
}
$db = null;

/* Start session */
session_start();
?>