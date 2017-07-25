<h1 class="page-title">{{ pageTitle }}</h1>
<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">{{ blockTitle }}</h3>
        <div class="box-tools pull-right">
            {% button url="cockpit_multisite_sites_edit_<?php echo $site->id; ?>" type="info" size="sm" icon="pencil" %}
            {% button url="cockpit_multisite_sites_delete_<?php echo $site->id; ?>" type="danger" size="sm" icon="trash-o" confirmation="Vous confirmer vouloir supprimer ce site ?" %}
            <?php if ($this->current_administrator !== null && $this->current_administrator->site_id === null) { ?>
                <a href="<?php echo url('cockpit_multisite_sites_index'); ?>" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i></a>
            <?php } ?>
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
    		<b>Theme</b>: <?php echo $site->theme; ?>
    	</p>
   		<p>
    		<b>Description</b>: <?php echo $site->description; ?>
    	</p>
        <p>
    		<b>Facebook</b>: <?php echo $site->facebook; ?>
    	</p>
        <p>
    		<b>Twitter</b>: <?php echo $site->twitter; ?>
    	</p>
        <p>
    		<b>Printerest</b>: <?php echo $site->printerest; ?>
    	</p>
        <p>
    		<b>Google +</b>: <?php echo $site->googleplus; ?>
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
