<?php
/* @var $this OpcionesController */
/* @var $model Opciones */

$this->breadcrumbs=array(
	'Opciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opciones', 'url'=>array('index')),
	array('label'=>'Manage Opciones', 'url'=>array('admin')),
);
?>

<h1>Create Opciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>