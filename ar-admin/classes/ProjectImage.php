
<?php

class ProjectImage {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idProjectImage;

	/**
     * External entity ID.
     *
     * @var integer
     */
	private $idProject;

	/**
     * Image file.
     *
     * @var string
     */
	private $projectImage;

     /**
     * Image type.
     *
     * @var string
     */
     private $typeImage;

	/**
     * Initial constructor.
     *
     * @param integer $idProjectImage
     * @param integer $idProject
     * @param string  $projectImage
     * @param string  $typeImage
     * @return null
     */
	public function __construct($idProjectImage, $idProject, $projectImage, $typeImage){
		$this->idProjectImage = $idProjectImage;
		$this->idProject = $idProject;
		$this->projectImage = $projectImage;
          $this->typeImage = $typeImage;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdProjectImage(){
		return $this->idProjectImage;	
	}

	/**
     * Get the entity's ID.
     *
     * @return string
     */
	public function getIdProject(){
		return $this->idProject;	
	}
	
	/**
     * Get the entity image file.
     *
     * @return string
     */
	public function getProjectImage(){
		return $this->ProjectImage;	
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
