<?php
$db_server = 'localhost';
$db_andmebaas = 'tieto';
$db_kasutaja = 'Gregori';
$db_salasona = '123';
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
if(!$yhendus){
	die('Ei saa ühendust andmebaasiga');
}
?>