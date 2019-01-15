
<?php 

class EditImageView {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Project $project){

?>    
    
    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
    <script type="text/javascript">

    $(window).load(function(e){
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer',
            percentPosition: true,
            gutter: 15
        })
    });

    </script>

    <?php 
    if($project->getProjectFrame()){ ?>
    
    <section class="grid">
        
        <div class="grid-sizer"></div>

        <article class="grid-item">
            <img src="<?php echo APP_PATH ?>/app/_project_frame.php?id_project=<?php echo $project->getIdProject()?>" />
            <a href="<?php echo $this->generateURL('project', 'delete_image', $project->getIdProject(), true) ?>">
                Eliminar
            </a>
        </article>

    </section>
    
    <?php } else { ?>

    <p>
        <?php echo REQUIRED_FIELDS_TEXT ?>
    </p>
    
    <form action="<?php echo $this->generateURL('project', 'add_image', $_GET['id_project']) ?>" method="post" enctype="multipart/form-data">
        
        <fieldset>
        
            <div>
                <label for="project_frame">
                    Fotograma <small>(*)</small>
                </label>
                <input type="file" name="project_frame" required /> 
            </div>
            
            <div>
                <input type="submit" value="Agregar" />
            </div>
            
        </fieldset>
        
    </form>

    <?php } ?>

<?php 

    }

    /**
     * Generate the url's to redirect.
     *
     * @return string
     */
    private function generateURL($controller, $action, $id, $idImage = false){
        if(ACTIVATE_URL_FRIENDLY){
            return APP_PATH . "/" . $controller . "/" . $action . "/" . $id;
        } else {
            return APP_PATH . "/index.php?c=" . $controller . "&a=" . $action . "&id_" . $controller . "=" . $id;
        }
    }

}

?>
