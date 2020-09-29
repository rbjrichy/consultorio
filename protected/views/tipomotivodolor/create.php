<?php
/* @var $this TipomotivodolorController */
/* @var $model Tipomotivodolor */

$this->breadcrumbs=array(
	'Tipomotivodolors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipomotivodolor', 'url'=>array('index')),
	array('label'=>'Manage Tipomotivodolor', 'url'=>array('admin')),
);
?>

<h1>Create Tipomotivodolor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>