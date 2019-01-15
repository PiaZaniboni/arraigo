
<?php

class ProjectModel {
	
	/**
     * Get all the projects saved in the database.
     *
     * @return array
     */
	public function getProjects(){
		$projects = array();
		$sql = "SELECT * FROM project ORDER BY id_project DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$projects[] = new Project (
				$row['id_project'], 
				$row['id_category'], 
				$row['project_name'],
				$row['project_subtitle'],
				$row['project_description'],
				$row['project_location'],
				$row['project_size'],
				$row['project_year'],
				$row['project_frame'],
				$row['project_frame_type']
			);
		}
		DB::free($res);
		return $projects;
	}
	
	/**
     * Get a project saved in the database.
     *
     * @param integer $idProject
     * @return Project
     */
	public function getProject($idProject){
		$sql = "SELECT * FROM project WHERE id_project = '" . $idProject . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$project = new Project (
			$row['id_project'],
			$row['id_category'],  
			$row['project_name'], 
			$row['project_subtitle'],
			$row['project_description'],
			$row['project_location'],
			$row['project_size'],
			$row['project_year'],
			$row['project_frame'],
			$row['project_frame_type']
		);
		DB::free($res);
		return $project;
	}

	/**
     * Add a project to the database.
     *
     * @param Project $project
     * @return integer
     */
	public function addProject(Project $project){
		$sql = "INSERT INTO project (
			id_category,
			project_name,
			project_subtitle,
			project_description,
			project_location,
			project_size,
			project_year
		) VALUES ('" . 
			$project->getIdCategory() . "', '" . 
			replaceCharacters($project->getProjectName()) . "', '" . 
			replaceCharacters($project->getProjectSubtitle()) . "', '" . 
			replaceCharacters($project->getProjectDescription()) . "', '" . 
			replaceCharacters($project->getProjectLocation()) . "', '" . 
			replaceCharacters($project->getProjectSize()) . "', '" . 
			$project->getProjectYear() . 
		"')";
		return DB::query($sql);
	}

	/**
     * Modify a project saved in the database.
     *
     * @param Project $project
     * @return integer
     */
	public function editProject(Project $project){
		$sql = "UPDATE project 
			SET id_project = '" . $project->getIdProject() . 
			"', id_category = '" . $project->getIdCategory() . 
			"', project_name = '" . replaceCharacters($project->getProjectName()) .  
			"', project_subtitle = '" . replaceCharacters($project->getProjectSubtitle()) .  
			"', project_description = '" . replaceCharacters($project->getProjectDescription()) . 
			"', project_location = '" . replaceCharacters($project->getProjectLocation()) . 
			"', project_size = '" . replaceCharacters($project->getProjectSize()) . 
			"', project_year = '" . $project->getProjectYear() . 
			"' WHERE id_project = '" . $project->getIdProject() . "'";
		return DB::query($sql);
	}
	
	/**
     * Delete a project saved in the database.
     *
     * @param integer $idProject
     * @return integer
     */
	public function deleteProject($idProject){
		$sql = "DELETE FROM project WHERE id_project = '" . $idProject . "'";
		return DB::query($sql);
	}

	/**
     * Get all the categories saved in the database.
     *
     * @return array
     */
	public function getCategories(){
		$categories = array();
		$sql = "SELECT * FROM category ORDER BY id_category ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$categories[] = new Category (
				$row['id_category'], 
				$row['title_category']
			);
		}
		DB::free($res);
		return $categories;
	}

	/**
     * Get the gallery linked to a project.
     *
     * @param integer $idProject
     * @return array
     */
	public function getGallery($idProject){
		$gallery = array();
		$sql = "SELECT * FROM project_image 
			WHERE id_project = '" . $idProject . "' 
			ORDER BY id_project_image ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new ProjectImage(
				$row['id_project_image'], 
				$row["id_project"], 
				$row['project_image'], 
				$row['type_image']);
		}
		DB::free($res);
		return $gallery;
	}

	/**
     * Verify and validate the extension of the uploaded file.
     *
     * @param string $title
     * @param string $type
     * @return boolean
     */
	public function validateProjectImage($title, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $title);
		$extension = end($temp);
		if((($type === "image/gif") || 
			($type === "image/jpeg") || 
			($type === "image/jpg") || 
			($type === "image/pjpeg") || 
			($type === "image/x-png") ||
			($type === "image/png")) && 
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;	
		}
	}

	/**
     * Add a image to a entity
     *
     * @param mediumblob $image
     * @param string $type
     * @param integer $idProject
     * @return boolean
     */
	public function addProjectImage($image, $type, $idProject){
		DB::connect();
		$sql = "INSERT INTO project_image (
			id_project,
			project_image, 
			type_image 
		) VALUES ('" . 
			$idProject . "', '" . 
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
     * Delete a project image saved in the database.
     *
     * @param integer $idProjectImage
     * @return integer
     */
	public function deleteProjectImage($idProjectImage){
		$sql = "DELETE FROM project_image WHERE id_project_image = '" . $idProjectImage . "'";
		return DB::query($sql);
	}

	/**
     * Delete a project gallery saved in the database.
     *
     * @param integer $idProject
     * @return integer
     */
	public function deleteProjectGallery($idProject){
		$sql = "DELETE FROM project_image WHERE id_project = '" . $idProject . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFrameProject($name, $type){
		$allowedExtensions = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $name);
		$extension = end($temp);
		if((($type === "image/gif") || 
			($type === "image/jpeg") || 
			($type === "image/jpg") || 
			($type === "image/pjpeg") || 
			($type === "image/x-png") || 
			($type === "image/png")) && 
			in_array($extension, $allowedExtensions)){
			return true;
		} else {
			return false;	
		}
	}

	/**
     * Add a frame to a entity
     *
     * @param mediumblob $frame
     * @param string $type
     * @param integer $idProject
     * @return boolean
     */
	public function addFrameProject($frame, $type, $idProject){
		DB::connect();
		$sql = "UPDATE project SET 
			project_frame = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "', 
			project_frame_type = '" . $type .
		"' WHERE id_project = '" . $idProject . "'";
		DB::query($sql);
	}

	/**
     * Modify a project saved in the database.
     *
     * @param Project $project
     * @return integer
     */
	public function deleteFrameProject($idProject){
		$sql = "UPDATE project 
			SET project_frame = NULL" . 
			", project_frame_type = ''" .
			"WHERE id_project = '" . $idProject . "'";
		return DB::query($sql);
	}

}

?>
