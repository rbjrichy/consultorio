<?php
/* @var $this PagoController */
/* @var $model Pago */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pago', 'url'=>array('index')),
	array('label'=>'Create Pago', 'url'=>array('create')),
	array('label'=>'View Pago', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pago', 'url'=>array('admin')),
);
?>

<h1>Actualizar Pago</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>