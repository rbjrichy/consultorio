<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Usuarios',
);
$this->menu=array(
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>
<div class="typography">
	<h1>Usuarios</h1>
</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>