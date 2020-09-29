<?php
/* @var $this AntecedentesdentalesController */
/* @var $model Antecedentesdentales */

$this->breadcrumbs=array(
	'Antecedentesdentales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Antecedentesdentales', 'url'=>array('index')),
	array('label'=>'Create Antecedentesdentales', 'url'=>array('create')),
	array('label'=>'Update Antecedentesdentales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Antecedentesdentales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Antecedentesdentales', 'url'=>array('admin')),
);
?>

<h1>View Antecedentesdentales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numerocepilladas',
		'hilodental',
		'enjuaguebucal',
		'fuma',
		'numerofumadas',
		'tienedolor',
		'idtipomotivodolor',
		'piezasdentales',
		'idpaciente',
	),
)); ?>
