    
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

    <!-- JQUERY UI -->  
    
    <link type="text/css" rel="stylesheet" href="<?php echo APP_PATH ?>/css/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo APP_PATH ?>/css/jquery-ui.theme.min.css">
    <script type="text/javascript" src="<?php echo APP_PATH ?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".sortable").sortable({
                update: function(e, ui) {
                    var arr = [];

                    $.each($(this).find("tr"), function(key, value){
                        arr.push($(this).attr("data-id-project"));
                    });

                    $.get('app/_projects_order.php?ids=' + JSON.stringify(arr), function(data){
                        if(response.status === "Success"){
                            alert("Done");
                        }
                    });
                }
            });
        });
    </script>

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
        
        <tbody class="sortable">       	
			<?php foreach($projects as $project){ ?>
            <tr data-id-project="<?php echo $project->getIdProject() ?>">
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
