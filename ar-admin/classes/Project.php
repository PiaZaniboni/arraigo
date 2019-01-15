
<?php

class Project {
	
	/**
     * Entity ID.
     *
     * @var integer
     */
	private $idProject;

     /**
     * Entity external ID.
     *
     * @var integer
     */
     private $idCategory;

	/**
     * Entity's projectName.
     *
     * @var string
     */
	private $projectName;

     /**
     * Entity's projectSubtitle.
     *
     * @var string
     */
     private $projectSubtitle;

     /**
     * Entity's projectDescription.
     *
     * @var string
     */
     private $projectDescription;

     /**
     * Entity's projectLocation.
     *
     * @var string
     */
     private $projectLocation;

     /**
     * Entity's projectSize.
     *
     * @var string
     */
     private $projectSize;

     /**
     * Entity's projectYear.
     *
     * @var string
     */
     private $projectYear;

     /**
     * Entity frame file.
     *
     * @var blob
     */
     private $projectFrame;

     /**
     * Entity frame type.
     *
     * @var string
     */
     private $projectFrameType;

	/**
     * Initial constructor.
     *
     * @param integer $idProject
     * @param string  $projectName
     * @return null
     */
	public function __construct($idProject, $idCategory, $projectName, $projectSubtitle, $projectDescription, $projectLocation, $projectSize, $projectYear, $projectFrame, $projectFrameType){
		$this->idProject = $idProject;
          $this->idCategory = $idCategory;
		$this->projectName = $projectName;
          $this->projectSubtitle = $projectSubtitle;
          $this->projectDescription = $projectDescription;
          $this->projectLocation = $projectLocation;
          $this->projectSize = $projectSize;
          $this->projectYear = $projectYear;
          $this->projectFrame = $projectFrame;
          $this->projectFrameType = $projectFrameType;
     }
	
	/**
     * Get the entity ID.
     *
     * @return integer
     */
	public function getIdProject(){
		return $this->idProject;	
	}

     /**
     * Get the entity external ID.
     *
     * @return integer
     */
     public function getIdCategory(){
          return $this->idCategory;  
     }

	/**
     * Get the entity's projectName.
     *
     * @return string
     */
	public function getProjectName(){
		return $this->projectName;	
	}

     /**
     * Get the entity's projectSubtitle.
     *
     * @return string
     */
     public function getProjectSubtitle(){
          return $this->projectSubtitle;    
     }

     /**
     * Get the entity's projectDescription.
     *
     * @return string
     */
     public function getProjectDescription(){
          return $this->projectDescription; 
     }

     /**
     * Get the entity's projectLocation.
     *
     * @return string
     */
     public function getProjectLocation(){
          return $this->projectLocation;    
     }

     /**
     * Get the entity's projectSize.
     *
     * @return string
     */
     public function getProjectSize(){
          return $this->projectSize;    
     }

     /**
     * Get the entity's projectYear.
     *
     * @return string
     */
     public function getProjectYear(){
          return $this->projectYear;    
     }

     /**
     * Get the entity's frame file.
     *
     * @return blob
     */
     public function getProjectFrame(){
          return $this->projectFrame;   
     }

     /**
     * Get the entity's frame type.
     *
     * @return string
     */
     public function getProjectFrameType(){
          return $this->projectFrameType;  
     }

}

?>
