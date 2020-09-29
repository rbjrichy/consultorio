<?php
/* @var $this TiporeporteController */
/* @var $model Tiporeporte */

$this->breadcrumbs=array(
	'Tiporeportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tiporeporte', 'url'=>array('index')),
	array('label'=>'Manage Tiporeporte', 'url'=>array('admin')),
);
?>

<h1>Create Tiporeporte</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>