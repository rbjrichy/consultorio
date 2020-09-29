<?php
/* @var $this AntecedentesdentalesController */
/* @var $model Antecedentesdentales */

$this->breadcrumbs=array(
	'Antecedentesdentales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Antecedentesdentales', 'url'=>array('index')),
	array('label'=>'Manage Antecedentesdentales', 'url'=>array('admin')),
);
?>

<h1>Create Antecedentesdentales</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>