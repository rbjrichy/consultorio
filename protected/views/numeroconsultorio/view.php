<?php
/* @var $this NumeroconsultorioController */
/* @var $model Numeroconsultorio */

$this->breadcrumbs=array(
	'Numeroconsultorios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Numeroconsultorio', 'url'=>array('index')),
	array('label'=>'Create Numeroconsultorio', 'url'=>array('create')),
	array('label'=>'Update Numeroconsultorio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Numeroconsultorio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Numeroconsultorio', 'url'=>array('admin')),
);
?>

<h1>View Numeroconsultorio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>
