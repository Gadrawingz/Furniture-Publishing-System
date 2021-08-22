<?php

try {
	// Create connection
	$con = new PDO('mysql:host=localhost; dbname=furniture', 'root', '');
} catch(PDOException $e) {
	die("<h2 class='text-danger'>There is something went wrong !</h2>");
}
?>