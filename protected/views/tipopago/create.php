<?php
/* @var $this TipopagoController */
/* @var $model Tipopago */

$this->breadcrumbs=array(
	'Tipopagos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipopago', 'url'=>array('index')),
	array('label'=>'Manage Tipopago', 'url'=>array('admin')),
);
?>

<h1>Create Tipopago</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>