
<?php 

require("views/View.php");

class AddView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $categories = null){

?>    

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('post', 'add') ?>" method="post" enctype="multipart/form-data">
    	
        <fieldset>

            <div class="row">
            
                <div class="col-md-6">	

                    <div>
                        <label for="post_title">
                            Ti&iacute;tulo
                        </label>
                        <input name="post_title" type="text" required /> 
                    </div>

                    <div>
                        <label for="post_subtitle">
                            Subt&iacute;tulo
                        </label>
                        <input name="post_subtitle" type="text" required /> 
                    </div>

                </div>
               
                <div class="col-md-6">	

                    <div>
                        <label for="post_body">
                            Cuerpo
                        </label>
                        <textarea name="post_body"></textarea> 
                    </div>

                    <div>
                        <label for="post_link">
                            Link
                        </label>
                        <input name="post_link" type="text" /> 
                    </div>

                    <div>
                        <label for="post_image">
                            Imagenes
                        </label>
                        <input name="post_image[]" type="file" required multiple /> 
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
