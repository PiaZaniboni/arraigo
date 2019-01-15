
<?php 

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $categories = null, Project $project = null){

?>  
    
    <p> 
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('project', 'edit', $project->getIdProject()) ?>" method="post">
    	
        <fieldset>
        
            <div class="row">

                <div class="col-md-6">  

                    <div>
                        <label for="project_name">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="project_name" type="text" value="<?php echo $project->getProjectName() ?>" required /> 
                    </div>

                    <!--<div>
                        <label for="id_category">
                            Categor&iacute;a <small>(*)</small>
                        </label>
                        <select name="id_category" required>
                            <option value="" selected>
                                Seleccionar
                            </option>-->
                            <?php 
                            //foreach($categories as $category){ 
                                //if($category->getIdCategory() === $project->getIdCategory()){
                            ?>
                            <!--<option value="<?php //echo $category->getIdCategory() ?>" selected>
                                <?php //echo $category->getCategory() ?>
                            </option>
                            <?php //} else { ?>
                            <option value="<?php //echo $category->getIdCategory() ?>">
                                <?php //echo $category->getCategory() ?>
                            </option>
                            <?php
                                //}
                            //}
                            ?>
                        <!--</select>
                    </div>-->

                    <div>
                        <label for="project_description">
                            Descripci&oacute;n
                        </label>
                        <textarea name="project_description"><?php echo $project->getProjectDescription() ?></textarea> 
                    </div>
                    
                </div>
               
                <div class="col-md-6">	

                    <div>
                        <label for="project_year">
                            A&ntilde;o <small>(*)</small>
                        </label>
                        <input name="project_year" type="text" value="<?php echo $project->getProjectYear() ?>" required /> 
                    </div>
                    
                    <div>
                        <input type="submit" value="Modificar" />
                    </div>
                
                </div>
            
            </div>
            
    	</fieldset>
        
    </form>

<?php 

    }

}

?>
    