<?php
/* @var $this OpcionesController */
/* @var $model Opciones */

$this->breadcrumbs=array(
	'Opciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Opciones', 'url'=>array('index')),
	array('label'=>'Create Opciones', 'url'=>array('create')),
	array('label'=>'Update Opciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Opciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opciones', 'url'=>array('admin')),
);
?>

<h1>View Opciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>
