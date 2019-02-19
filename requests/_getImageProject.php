<?php

require_once("_main.php");

$imagenProducto = getImageProject($_GET["id_project"]);
header("Content-type: " . $imagenProducto["project_frame_type"]);
echo $imagenProducto["project_frame"];

?>
