<h1 class="page-title">{{ pageTitle }}</h1>
<div class="box box-danger">
    <div class="box-header">
        <h3 class="box-title">Liste des articles</h3>
        <div class="box-tools pull-right">
            {% button url="cockpit_cms_articles_new" type="success" size="xs" icon="plus" %}
        </div>
    </div>
    <div class="box-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th width="1%">ID</th>
                    <th>Label</th>
                    <th>Status</th>
					<th width="10%">Actions</th>
				</tr>
			</thead>
			<tbody>
<?php
foreach ($params['sites'] as $site) {
    echo
        '<tr>'.
            '<td>'.$site->id.'</td>'.
            '<td>'.$site->label.'</td>'.
            '<td></td>'.
            '<td>';?>
    {% button url="cockpit_cms_articles_show_<?php echo $site->id; ?>" type="default" size="xs" icon="eye" %}
    {% button url="cockpit_cms_articles_edit_<?php echo $site->id; ?>" type="info" size="xs" icon="pencil" %}
    {% button url="cockpit_cms_articles_delete_<?php echo $site->id; ?>" type="danger" size="xs" icon="trash-o" confirmation="Vous confirmer vouloir supprimer cet article?" %}
<?php
    echo
            '</td>'.
        '</tr>';
}
?>
			</tbody>
		</table>
	</div>
</div>