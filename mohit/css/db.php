<?php
try {
$dbc = new PDO('mysql:host=localhost; dbname=mandi', 'root', 'sudhir');
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>