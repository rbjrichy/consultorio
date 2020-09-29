<?php
/* @var $this AnamnesisController */
/* @var $model Anamnesis */

$this->breadcrumbs=array(
	'Anamnesises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Anamnesis', 'url'=>array('index')),
	array('label'=>'Create Anamnesis', 'url'=>array('create')),
	array('label'=>'Update Anamnesis', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Anamnesis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anamnesis', 'url'=>array('admin')),
);
?>

<h1>View Anamnesis #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'motivoconsulta',
		'tratamientomedico',
		'nombretratamientomedico',
		'medicamentotratamientomedico',
		'alergias',
		'diabetes',
		'hipertension',
		'cardiaco',
		'epilepsia',
		'embarazada',
		'gastritis',
		'otros',
		'idpaciente',
	),
)); ?>
