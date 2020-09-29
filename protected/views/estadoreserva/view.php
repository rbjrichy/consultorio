<?php
/* @var $this EstadoreservaController */
/* @var $model Estadoreserva */

$this->breadcrumbs=array(
	'Estadoreservas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Estadoreserva', 'url'=>array('index')),
	array('label'=>'Create Estadoreserva', 'url'=>array('create')),
	array('label'=>'Update Estadoreserva', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Estadoreserva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Estadoreserva', 'url'=>array('admin')),
);
?>

<h1>View Estadoreserva #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>
