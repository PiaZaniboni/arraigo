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
		"id_category" => $row['id_category'],  
		"project_name" => $row['project_name'], 
		"project_description" => $row['project_description'],
		"project_frame" => $row['project_frame'],
		"project_frame_type" => $row['project_frame_type']
	);
	free($res);
	return $project;
}

/**
 * Save products order.
 *
 * @return array
 */
function saveProjectOrder($i, $idProject){
	$sql = "UPDATE project_order SET project_order = '" . $i . "' WHERE id_project = '" . $idProject . "'";
	query($sql);
}

?>
