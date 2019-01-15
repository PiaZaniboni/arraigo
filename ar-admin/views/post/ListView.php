    
<?php 

require("views/View.php");

class ListView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $posts = null){

?>

    <div class="modal fade modal-confirmation" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <p>
                <?php echo CONFIRMATION_TEXT ?>
            </p>
            <button type="button" class="btn btn-primary delete-yes" data-toggle="button" aria-pressed="false" autocomplete="off">
                <?php echo YES_TEXT ?>
            </button>
            <button type="button" class="btn btn-primary delete-no" data-toggle="button" aria-pressed="false" autocomplete="off">
                <?php echo NO_TEXT ?>
            </button>
        </div>
      </div>
    </div>

    <?php if(empty($posts)){ ?>
    
    <p> No hay novedades cargados/as por el momento. </p>
    
    <?php } else { ?>
   
	<table>
    	
        <thead>
            <tr>
                <th>
                	T&iacute;tulo
                </th>
                <th>
                    Sub&iacute;tulo
                </th>
                <th>
                    Cuerpo
                </th>
                <th>
                    Link
                </th>
                <th>
                    Galer&iacute;a
                </th>
                <th class="border-cell">
                	Modificar
                </th>
                <th>	
                	Eliminar
                </th>
            </tr>
        </thead>
        
        <tbody>       	
			<?php foreach($posts as $post){ ?>
            <tr>
                <td>
                	<?php echo $post->getPostTitle() ?>
                </td>
                <td>
                    <?php echo $post->getPostSubtitle() ?>
                </td>
                <td>
                    <?php echo $post->getPostBody() ?>
                </td>
                <td>
                    <?php echo $post->getPostLink() ?>
                </td>
                <td>
                    <a href="<?php echo $this->generateURL('post', 'edit_gallery', $post->getIdPost()) ?>">
                        <span class="glyphicon glyphicon-th"></span>
                    </a>
                </td>
                <td class="border-cell">
                	<a href="<?php echo $this->generateURL('post', 'edit', $post->getIdPost()) ?>">
                    	<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                	<a class="delete-link" href="<?php echo $this->generateURL('post', 'delete', $post->getIdPost()) ?>">
                    	<span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    
<?php 

        } 

    }

}

?>
