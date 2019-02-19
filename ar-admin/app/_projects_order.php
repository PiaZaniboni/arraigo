<?php

require_once("_main.php");

$newOrder = json_decode($_GET["ids"]);

foreach(array_reverse($newOrder) as $i => $idProduct){
	saveProjectOrder($i, $idProduct);
}

?>