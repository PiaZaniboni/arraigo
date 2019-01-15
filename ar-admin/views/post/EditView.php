
<?php 

require("views/View.php");

class EditView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Post $post = null){

?>  
    
    <p> 
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>

	<form action="<?php echo $this->generateURL('post', 'edit', $post->getIdPost()) ?>" method="post">
    	
        <fieldset>
        
            <div class="row">

                <div class="col-md-6">  

                    <div>
                        <label for="post_title">
                            Ti&iacute;tulo
                        </label>
                        <input name="post_title" type="text" required value="<?php echo $post->getPostTitle() ?>" /> 
                    </div>

                    <div>
                        <label for="post_subtitle">
                            Subt&iacute;tulo
                        </label>
                        <input name="post_subtitle" type="text" required value="<?php echo $post->getPostSubtitle() ?>" /> 
                    </div>
                    
                </div>
               
                <div class="col-md-6">	

                    <div>
                        <label for="post_body">
                            Descripci&oacute;n
                        </label>
                        <textarea name="post_body"><?php echo $post->getPostBody() ?></textarea> 
                    </div>

                    <div>
                        <label for="post_link">
                            Link
                        </label>
                        <input name="post_link" type="text" value="<?php echo $post->getPostLink() ?>" /> 
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
    