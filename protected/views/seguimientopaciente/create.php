<?php
/* @var $this SeguimientopacienteController */
/* @var $model Seguimientopaciente */

$this->breadcrumbs=array(
	'Seguimientopacientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seguimientopaciente', 'url'=>array('index')),
	array('label'=>'Manage Seguimientopaciente', 'url'=>array('admin')),
);
?>

<h1>Create Seguimientopaciente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>