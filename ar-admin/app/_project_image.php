<?php

require_once("_main2.php");

$projectImage = getProjectImage($_GET["id_project_image"]);
header("Content-type: " . $projectImage["type_image"]);
echo $projectImage["project_image"];

?>