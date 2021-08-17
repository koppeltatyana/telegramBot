<?php
function selectBooks($dbh) {
	
	$sth = $dbh->prepare("SELECT * FROM `category` WHERE `id` = :id");
	$sth->execute(array('id' => '1'));
	$array = $sth->fetch(PDO::FETCH_ASSOC);
	print_r($array);
}
?>