<?php

require_once("_main.php");

$project = getProject($_GET["id_project"]);
header("Content-type: " . $project["project_frame_type"]);
echo $project["project_frame"];

?>