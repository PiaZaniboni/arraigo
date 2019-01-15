<?php

require_once("_main2.php");

$postImage = getPostImage($_GET["id_post_image"]);
header("Content-type: " . $postImage["type_image"]);
echo $postImage["post_image"];

?>