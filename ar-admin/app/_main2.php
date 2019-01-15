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
		return mysqli_connect("localhost", "", "", "");
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
 * Get a project image saved in the database.
 *
 * @param integer $idProjectImage
 * @return array
 */
function getProjectImage($idProjectImage){
	$sql = "SELECT * FROM project_image WHERE id_project_image = '" . $idProjectImage . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$projectImage = array(
		"id_project_image" => $row['id_project_image'], 
		"id_project" => $row["id_project"], 
		"project_image" => $row['project_image'],
		"type_image" => $row['type_image']
	);
	free($res);
	return $projectImage;
}

/**
 * Get a post image saved in the database.
 *
 * @param integer $idPostImage
 * @return array
 */
function getPostImage($idPostImage){
	$sql = "SELECT * FROM post_image WHERE id_post_image = '" . $idPostImage . "'";
	$res = query($sql);
	$row = mysqli_fetch_assoc($res);
	$postImage = array(
		"id_post_image" => $row['id_post_image'], 
		"id_post" => $row["id_post"], 
		"post_image" => $row['post_image'],
		"type_image" => $row['type_image']
	);
	free($res);
	return $postImage;
}

?>
