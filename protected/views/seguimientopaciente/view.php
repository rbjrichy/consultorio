<?php
/* @var $this SeguimientopacienteController */
/* @var $model Seguimientopaciente */

$this->breadcrumbs=array(
	'Seguimientopacientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Seguimientopaciente', 'url'=>array('index')),
	array('label'=>'Create Seguimientopaciente', 'url'=>array('create')),
	array('label'=>'Update Seguimientopaciente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Seguimientopaciente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seguimientopaciente', 'url'=>array('admin')),
);
?>

<h1>View Seguimientopaciente #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idpaciente',
		'idactividad',
		'fechahoraregistro',
		'idusuariogestion',
	),
)); ?>
