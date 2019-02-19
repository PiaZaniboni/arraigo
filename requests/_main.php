<?php

/**
 * Connect to the database.
 *
 * @return null
 */
function connect(){
	if($_SERVER["HTTP_HOST"] === "localhost"){
		return mysqli_connect("localhost", "root", "", "arraigo-db");
	} else {
		return mysqli_connect("localhost", "c1490668_arraigo", "TItomana77", "c1490668_arraigo");
	}

	/*if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/
}

/**
 * Make a sql query to the database.
 *
 * @param string $sql
 * @return integer
 */
function query($sql){
	$connection = connect();
	$res = mysqli_query($connection, $sql);
	mysqli_close($connection);
	return $res;
}

/**
 * Free the last query made to the database.
 *
 * @param integer $res
 * @return null
 */
function free($res){
	mysqli_free_result($res);
}

/**
 * Get a projects saved in the database.
 *
 * @return array
 */
function getProyectos(){
	$proyectos = array();
	$sql = "SELECT * FROM project ORDER BY id_project ASC";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$proyectos[] = array (
            "id_project" => $row['id_project'],
    		"project_name" => $row['project_name'],
            "project_year" => $row['project_year'],
    		"project_description" => $row['project_description'],
    		"project_frame" => $row['project_frame'],
    		"project_frame_type" => $row['project_frame_type']
		);
	}
	free($res);
	return $proyectos;
}

/**
 * Get a project saved in the database.
 *
 * @param integer $idProject
 * @return Project
 */
function getProject($idProject){
	$sql = "SELECT * FROM project WHERE id_project = '" . $idProject . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$project = array(
		"id_project" => $row['id_project'],
		"project_name" => $row['project_name'],
		"project_year" => $row['project_year'],
		"project_description" => $row['project_description']
	);
	free($res);
	return $project;
}

/**
 * Get a frame project saved in the database.
 *
 * @param integer $idProject
 * @return Frame
 */
function getImageProject($idProject){
	$sql = "SELECT * FROM project WHERE id_project = '" . $idProject . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$project = array(
		"id_project" => $row['id_project'],
		"project_frame" => $row['project_frame'],
		"project_frame_type" => $row['project_frame_type']
	);
	free($res);
	return $project;
}

/**
 * Get a id of images from project saved in the database.
 *
 * @param integer $idProject
 * @return ID
 */
function getIdImages($id_project){
	$ids = array();
	$sql = "SELECT * FROM project_image WHERE id_project = '" . $id_project . "'";
	$res = query($sql);
	while($row = mysqli_fetch_assoc($res)){
		$ids[] = array (
			"id_project_image" => $row['id_project_image']
		);
	}
	free($res);

	return $ids;
}


/**
 * Get a image from gallery project saved in the database.
 *
 * @param integer $idProject
 * @return Image
 */
function getGalleryImage($id_project_image){
	$sql = "SELECT * FROM project_image WHERE id_project_image = '" . $id_project_image . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$image = array(
		"id_project_image" => $row['id_project_image'],
		"project_image" => $row['project_image'],
		"type_image" => $row['type_image']
	);
	free($res);

	return $image;
}


?>
