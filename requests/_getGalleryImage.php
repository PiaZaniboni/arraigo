<?php

require_once("_main.php");

$imagenGallery = getGalleryImage($_GET["id_project_image"]);
header("Content-type: " . $imagenGallery["type_image"]);
echo $imagenGallery["project_image"];

?>
