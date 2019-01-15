    
<?php 

require("views/View.php");

class ListView extends View {

    /**
     * Renderize the view.
     *
     * @return null
     */
    public function render(Array $projects = null){

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

    <?php if(empty($projects)){ ?>
    
    <p> No hay proyectos cargados/as por el momento. </p>
    
    <?php } else { ?>
   
	<table>
    	
        <thead>
            <tr>
                <th>
                	Nombre
                </th>
                <th>
                    Descripci&oacute;n
                </th>
                <th>
                    A&ntilde;o
                </th>
                <th>
                    Fotograma
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
			<?php foreach($projects as $project){ ?>
            <tr>
                <td>
                	<?php echo $project->getProjectName() ?>
                </td>
                <td>
                    <?php echo $project->getProjectDescription() ?>
                </td>
                <td>
                    <?php echo $project->getProjectYear() ?>
                </td>
                <td>
                    <a href="<?php echo $this->generateURL('project', 'edit_image', $project->getIdProject()) ?>">
                        <span class="glyphicon glyphicon-picture"></span>
                    </a>
                </td>
                <td>
                    <a href="<?php echo $this->generateURL('project', 'edit_gallery', $project->getIdProject()) ?>">
                        <span class="glyphicon glyphicon-th"></span>
                    </a>
                </td>
                <td class="border-cell">
                	<a href="<?php echo $this->generateURL('project', 'edit', $project->getIdProject()) ?>">
                    	<span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
                <td>
                	<a class="delete-link" href="<?php echo $this->generateURL('project', 'delete', $project->getIdProject()) ?>">
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
