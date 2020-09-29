<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Paciente', 'url'=>array('index')),
	array('label'=>'Manage Paciente', 'url'=>array('admin')),
);
?>

<h1>Crear Paciente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

