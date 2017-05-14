<h1 class="page-title">{{ pageTitle }}</h1>
<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">{{ blockTitle }}</h3>
        <div class="box-tools pull-right">
            {% button url="cockpit_multisite_sites_edit_<?php echo $site->id; ?>" type="info" size="xs" icon="pencil" %}
            {% button url="cockpit_multisite_sites_delete_<?php echo $site->id; ?>" type="danger" size="xs" icon="trash-o" confirmation="Vous confirmer vouloir supprimer ce site ?" %}
            <a href="<?php echo url('cockpit_multisite_sites_index'); ?>" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="box-body">
   		<p>
   			<b>Label</b>: <?php echo $site->label; ?>
   		</p>
   		<p>
   			<b>Host</b>: <?php echo $site->host; ?>
   		</p>
   		<p>
    		<b>Description</b>: <?php echo $site->description; ?>
    	</p>
    	<p>
    		<b>Actif</b>:
    		<?php
    			if ($site->active == 1) {
        			echo '<span class="label label-success">Activé</span>';
    			} else {
        			echo '<span class="label label-danger">Désactivé</span>';
    			}
    		?>
    	</p>
    </div>
</div>