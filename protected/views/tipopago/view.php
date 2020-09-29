<?php
/* @var $this TipopagoController */
/* @var $model Tipopago */

$this->breadcrumbs=array(
	'Tipopagos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tipopago', 'url'=>array('index')),
	array('label'=>'Create Tipopago', 'url'=>array('create')),
	array('label'=>'Update Tipopago', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tipopago', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipopago', 'url'=>array('admin')),
);
?>

<h1>View Tipopago #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
	),
)); ?>
