
<?php

class PostModel {
	
	/**
     * Get all the posts saved in the database.
     *
     * @return array
     */
	public function getPosts(){
		$posts = array();
		$sql = "SELECT * FROM post ORDER BY id_post DESC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$posts[] = new Post (
				$row['id_post'], 
				$row['post_title'], 
				$row['post_subtitle'],
				$row['post_body'],
				$row['post_link']
			);
		}
		DB::free($res);
		return $posts;
	}
	
	/**
     * Get a post saved in the database.
     *
     * @param integer $idPost
     * @return Post
     */
	public function getPost($idPost){
		$sql = "SELECT * FROM post WHERE id_post = '" . $idPost . "'";
		$res = DB::query($sql);
		$row = mysqli_fetch_assoc($res);
		$post = new Post (
			$row['id_post'],
			$row['post_title'],  
			$row['post_subtitle'], 
			$row['post_body'],
			$row['post_link']
		);
		DB::free($res);
		return $post;
	}

	/**
     * Add a post to the database.
     *
     * @param Post $post
     * @return integer
     */
	public function addPost(Post $post){
		$sql = "INSERT INTO post (
			post_title,
			post_subtitle,
			post_body,
			post_link
		) VALUES ('" . 
			replaceCharacters($post->getPostTitle()) . "', '" . 
			replaceCharacters($post->getPostSubtitle()) . "', '" . 
			replaceCharacters($post->getPostBody()) . "', '" . 
			$post->getPostLink() .
		"')";
		return DB::query($sql);
	}

	/**
     * Modify a post saved in the database.
     *
     * @param Post $post
     * @return integer
     */
	public function editPost(Post $post){
		$sql = "UPDATE post 
			SET id_post = '" . $post->getIdPost() . 
			"', post_title = '" . replaceCharacters($post->getPostTitle()) . 
			"', post_subtitle = '" . replaceCharacters($post->getPostSubtitle()) .  
			"', post_body = '" . replaceCharacters($post->getPostBody()) . 
			"', post_link = '" . $post->getPostLink() . 
			"' WHERE id_post = '" . $post->getIdPost() . "'";
		return DB::query($sql);
	}
	
	/**
     * Delete a post saved in the database.
     *
     * @param integer $idPost
     * @return integer
     */
	public function deletePost($idPost){
		$sql = "DELETE FROM post WHERE id_post = '" . $idPost . "'";
		return DB::query($sql);
	}

	/**
     * Get the gallery linked to a post.
     *
     * @param integer $idPost
     * @return array
     */
	public function getGallery($idPost){
		$gallery = array();
		$sql = "SELECT * FROM post_image 
			WHERE id_post = '" . $idPost . "' 
			ORDER BY id_post_image ASC";
		$res = DB::query($sql);
		while($row = mysqli_fetch_assoc($res)){
			$gallery[] = new PostImage(
				$row['id_post_image'], 
				$row["id_post"], 
				$row['post_image'], 
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
	public function validatePostImage($title, $type){
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
     * @param integer $idPost
     * @return boolean
     */
	public function addPostImage($image, $type, $idPost){
		DB::connect();
		$sql = "INSERT INTO post_image (
			id_post,
			post_image, 
			type_image 
		) VALUES ('" . 
			$idPost . "', '" . 
			mysqli_real_escape_string(DB::$connection, file_get_contents($image)) . "', '" .
			$type .
		"')";
		DB::query($sql);
	}

	/**
     * Delete a post image saved in the database.
     *
     * @param integer $idPostImage
     * @return integer
     */
	public function deletePostImage($idPostImage){
		$sql = "DELETE FROM post_image WHERE id_post_image = '" . $idPostImage . "'";
		return DB::query($sql);
	}

	/**
     * Delete a post gallery saved in the database.
     *
     * @param integer $idPost
     * @return integer
     */
	public function deletePostGallery($idPost){
		$sql = "DELETE FROM post_image WHERE id_post = '" . $idPost . "'";
		return DB::query($sql);
	}

	/**
     * Verify and validate the extension of the uploaded frame.
     *
     * @param string $name
     * @param string $type
     * @return boolean
     */
	public function validateFramePost($name, $type){
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
     * @param integer $idPost
     * @return boolean
     */
	public function addFramePost($frame, $type, $idPost){
		DB::connect();
		$sql = "UPDATE post SET 
			post_link = '" . mysqli_real_escape_string(DB::$connection, file_get_contents($frame)) . "', 
			post_link_type = '" . $type .
		"' WHERE id_post = '" . $idPost . "'";
		DB::query($sql);
	}

	/**
     * Modify a post saved in the database.
     *
     * @param Post $post
     * @return integer
     */
	public function deleteFramePost($idPost){
		$sql = "UPDATE post 
			SET post_link = NULL" . 
			", post_link_type = ''" .
			"WHERE id_post = '" . $idPost . "'";
		return DB::query($sql);
	}

}

?>
