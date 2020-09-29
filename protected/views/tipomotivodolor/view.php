<?php
/* @var $this TipomotivodolorController */
/* @var $model Tipomotivodolor */

$this->breadcrumbs=array(
	'Tipomotivodolors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tipomotivodolor', 'url'=>array('index')),
	array('label'=>'Create Tipomotivodolor', 'url'=>array('create')),
	array('label'=>'Update Tipomotivodolor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tipomotivodolor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipomotivodolor', 'url'=>array('admin')),
);
?>

<h1>View Tipomotivodolor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>
