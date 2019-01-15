
<?php

require_once("controllers/Controller.php");
require_once("classes/Post.php");
require_once("classes/PostImage.php");

class PostController extends Controller {
	
	/**
     * Actual model's name.
     *
     * @var string
     */
	public $actualModelName = "PostModel"; //Overload
	
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
								
				$posts = $this->actualModel->getPosts();

				$this->createView($this->petitionAction);
				$this->actualView->render($posts);

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

					$post = new Post(
						"", 
						$_POST['post_title'],
						$_POST['post_subtitle'],
						$_POST['post_body'],
						$_POST['post_link']
					);

					$res = $this->actualModel->addPost($post);
					$lastId = getLastId("post");
					$arrayFiles = $_FILES["post_image"];

					if($res && $arrayFiles){
						for($i = 0; $i < count($arrayFiles["name"]); $i++){
							if($arrayFiles["error"][$i] === 0){
								if($this->actualModel->validatePostImage(
									$arrayFiles["name"][$i], 
									$arrayFiles["type"][$i]
								)){
									$this->actualModel->addPostImage(
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
					
					$post = $this->actualModel->getPost($_GET["id_post"]);

					$this->createView($this->petitionAction);
					$this->actualView->render($post);

				} else {
					
					$this->createModel();
					
					$post = new Post(
						$_GET['id_post'], 
						$_POST['post_title'],
						$_POST['post_subtitle'],
						$_POST['post_body'],
						$_POST['post_link']
					);

					$this->actualModel->editPost($post);

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
				
				$this->actualModel->deletePostGallery($_GET["id_post"]);
				$this->actualModel->deletePost($_GET['id_post']);

				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

			/**
		     * 
		     */
			case 'edit_gallery':
				
				$this->createModel();

				$gallery = $this->actualModel->getGallery($_GET["id_post"]);

				$this->createView("Edit_Gallery", true); //Corregir
				$this->actualView->render($gallery);
				
			break;

			/**
		     * 
		     */
			case 'add_gallery':
					
				$this->createModel();
				
				$arrayFiles = $_FILES["post_image"];

				if($arrayFiles){
					for($i = 0; $i < count($arrayFiles["name"]); $i++){
						if($arrayFiles["error"][$i] === 0){
							if($this->actualModel->validatePostImage(
								$arrayFiles["name"][$i], 
								$arrayFiles["type"][$i]
							)){
								$this->actualModel->addPostImage(
									$arrayFiles["tmp_name"][$i], 
									$arrayFiles["type"][$i], 
									$_GET["id_post"]
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
			case 'delete_gallery':
				
				$this->createModel();

				$this->actualModel->deletePostImage($_GET["id_post_image"]);
				
				$this->createLoadingView();
				$this->actualView->render();
				$this->redirect();
				
			break;

		}
		
	}

}

?>
