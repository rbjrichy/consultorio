<?php
/* @var $this TiporeporteController */
/* @var $model Tiporeporte */

$this->breadcrumbs=array(
	'Tiporeportes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tiporeporte', 'url'=>array('index')),
	array('label'=>'Create Tiporeporte', 'url'=>array('create')),
	array('label'=>'Update Tiporeporte', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tiporeporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tiporeporte', 'url'=>array('admin')),
);
?>

<h1>View Tiporeporte #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
		'idtipousuario',
		'habilitado',
	),
)); ?>
