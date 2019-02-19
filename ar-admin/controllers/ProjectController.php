
<?php

require_once("controllers/Controller.php");
require_once("classes/Project.php");
require_once("classes/ProjectImage.php");
require_once("classes/Category.php");

class ProjectController extends Controller {
	
	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "ProjectModel"; //Overload
	
	/**
     * Analyze the action and determine a request.
     *
     * @return null
     */
	public function analyzeAction(){ //Overload
		
		switch($this->petitionAction){
			
			/**
		     * 
		     */
			case 'list':
				
				$this->createModel();
								
				$projects = $this->actualModel->getProjects();

				$this->createView($this->petitionAction);
				$this->actualView->render($projects);

			break;

			/**
		     * 
		     */			
			case 'add':

				if(empty($_POST)){

					$this->createModel();

					$this->createView($this->petitionAction);
					$this->actualView->render();

				} else {
					
					$this->createModel();

					$project = new Project(
						"", 
						'', 
						$_POST['project_name'], 
						'',
						$_POST['project_description'],
						'',
						'',
						$_POST['project_year'],
						"",
						""
					);

					$res = $this->actualModel->addProject($project);
					$lastId = getLastId("project");
					$arrayFiles = $_FILES["project_image"];

					if($res){
						$this->actualModel->addProjectOrder($lastId);
					}

					if($res && $arrayFiles){
						for($i = 0; $i < count($arrayFiles["name"]); $i++){
							if($arrayFiles["error"][$i] === 0){
								if($this->actualModel->validateProjectImage(
									$arrayFiles["name"][$i], 
									$arrayFiles["type"][$i]
								)){
									$this->actualModel->addProjectImage(
										$arrayFiles["tmp_name"][$i], 
										$arrayFiles["type"][$i], 
										$lastId
									);	
								}
							}
						}
					}
					
					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();
					
				}
		
			break;	

			/**
		     * 
		     */
			case 'edit':
			
				if(empty($_POST)){

					$this->createModel();
					
					$project = $this->actualModel->getProject($_GET["id_project"]);

					$this->createView($this->petitionAction);
					$this->actualView->render($project);

				} else {
					
					$this->createModel();
					
					$project = new Project(
						$_GET['id_project'], 
						'',
						$_POST['project_name'],
						'',
						$_POST['project_description'],
						'',
						'',
						$_POST['project_year'],
						"",
						""
					);

					$this->actualModel->editProject($project);

					$this->createLoadingView();
					$this->actualView->render();
					$this->redirect();
					
				}
		
			break;
			
			/**
		     * 
		     */
			case 'delete':
				
				$this->createModel();
				
				$this->actualModel->deleteProjectGallery($_GET["id_project"]);
				$this->actualModel->deleteProject($_GET['id_project']);
				$this->actualModel->deleteProjectOrder($_GET['id_project']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'edit_gallery':
				
				$this->createModel();

				$gallery = $this->actualModel->getGallery($_GET["id_project"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($gallery);
				
			break;

			/**
		     * 
		     */
			case 'edit_image':
				
				$this->createModel();

				$project = $this->actualModel->getProject($_GET["id_project"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($project);
				
			break;

			/**
		     * 
		     */
			case 'add_gallery':
					
				$this->createModel();
				
				$arrayFiles = $_FILES["project_image"];

				if($arrayFiles){
					for($i = 0; $i < count($arrayFiles["name"]); $i++){
						if($arrayFiles["error"][$i] === 0){
							if($this->actualModel->validateProjectImage(
								$arrayFiles["name"][$i], 
								$arrayFiles["type"][$i]
							)){
								$this->actualModel->addProjectImage(
									$arrayFiles["tmp_name"][$i], 
									$arrayFiles["type"][$i], 
									$_GET["id_project"]
								);	
							}
						}
					}
				}
				
				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;	

			/**
		     * 
		     */
			case 'add_image':
				
				$this->createModel();

				$project = $this->actualModel->getProject($_GET["id_project"]);
				$arrayFiles = $_FILES["project_frame"];

				if($arrayFiles){
					if($arrayFiles["error"] === 0){
						if($this->actualModel->validateFrameProject(
							$arrayFiles["name"], 
							$arrayFiles["type"]
						)){
							$this->actualModel->addFrameProject(
								$arrayFiles["tmp_name"], 
								$arrayFiles["type"], 
								$_GET["id_project"]
							);	
						}
					}
				}

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'delete_gallery':
				
				$this->createModel();

				$this->actualModel->deleteProjectImage($_GET["id_project_image"]);
				
				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'delete_image':
				
				$this->createModel();

				$this->actualModel->deleteFrameProject($_GET["id_project"]);
				$project = $this->actualModel->getProject($_GET["id_project"]);

				$this->createView("Edit_Image", true); //Corregir
				$this->actualView->render($project);
				
			break;

		}
		
	}

}

?>
