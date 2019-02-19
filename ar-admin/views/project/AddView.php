
<?php 

require("views/View.php");

class AddView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(){

?>    

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('project', 'add') ?>" method="post" enctype="multipart/form-data">
    	
        <fieldset>

            <div class="row">
            
                <div class="col-md-6">	

                    <div>
                        <label for="project_name">
                            Nombre <small>(*)</small>
                        </label>
                        <input name="project_name" type="text" required /> 
                    </div>

                    <div>
                        <label for="project_description">
                            Descripci&oacute;n <small>(*)</small>
                        </label>
                        <textarea name="project_description" required></textarea> 
                    </div>

                </div>
               
                <div class="col-md-6">	

                    <div>
                        <label for="project_year">
                            A&ntilde;o <small>(*)</small>
                        </label>
                        <input name="project_year" type="text" required /> 
                    </div>

                    <div>
                        <label for="project_image">
                            Imagenes
                        </label>
                        <input name="project_image[]" type="file" multiple /> 
                    </div>
                    
                    <div>
                        <input type="submit" value="Agregar" />
                    </div>
                
                </div>
            
            </div>
            
    	</fieldset>
        
    </form>

<?php 

    }

}

?>
