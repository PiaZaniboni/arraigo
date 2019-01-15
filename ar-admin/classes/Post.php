
<?php

class Post {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idPost;

     /**
     * Entity external ID.
     *
     * @var integer
     */
     private $postTitle;

	/**
     * Entity's postSubtitle.
     *
     * @var string
     */
	private $postSubtitle;

     /**
     * Entity's postBody.
     *
     * @var string
     */
     private $postBody;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $postLink;

	/**
     * Initial constructor.
     *
     * @param integer $idPost
     * @param string  $postSubtitle
     * @return null
     */
	public function __construct($idPost, $postTitle, $postSubtitle, $postBody, $postLink){
		$this->idPost = $idPost;
          $this->postTitle = $postTitle;
		$this->postSubtitle = $postSubtitle;
          $this->postBody = $postBody;
          $this->postLink = $postLink;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdPost(){
		return $this->idPost;	
	}

     /**
     * Get the entity external ID.
     *
     * @return integer
     */
     public function getPostTitle(){
          return $this->postTitle;  
     }

	/**
     * Get the entity's postSubtitle.
     *
     * @return string
     */
	public function getPostSubtitle(){
		return $this->postSubtitle;	
	}

     /**
     * Get the entity's postBody.
     *
     * @return string
     */
     public function getPostBody(){
          return $this->postBody; 
     }

     /**
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getPostLink(){
          return $this->postLink;   
     }

}

?>
