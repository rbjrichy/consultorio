<?php
/* @var $this EstadoreservaController */
/* @var $model Estadoreserva */

$this->breadcrumbs=array(
	'Estadoreservas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estadoreserva', 'url'=>array('index')),
	array('label'=>'Manage Estadoreserva', 'url'=>array('admin')),
);
?>

<h1>Create Estadoreserva</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>