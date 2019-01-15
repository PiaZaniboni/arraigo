
<?php

class PostImage {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idPostImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idPost;

	/**
     * Image file.
     *
     * @var string
     */
	private $postImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idPostImage
     * @param integer $idPost
     * @param string  $postImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idPostImage, $idPost, $postImage, $typeImage){
		$this->idPostImage = $idPostImage;
		$this->idPost = $idPost;
		$this->postImage = $postImage;
          $this->typeImage = $typeImage;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdPostImage(){
		return $this->idPostImage;	
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdPost(){
		return $this->idPost;	
	}
	
	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getPostImage(){
		return $this->PostImage;	
	}

     /**
     * Get the entity image type.
     *
     * @return string
     */
     public function getTypeImage(){
          return $this->typeImage;  
     }

}

?>
