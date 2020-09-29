<?php
/* @var $this NumeroconsultorioController */
/* @var $model Numeroconsultorio */

$this->breadcrumbs=array(
	'Numeroconsultorios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Numeroconsultorio', 'url'=>array('index')),
	array('label'=>'Manage Numeroconsultorio', 'url'=>array('admin')),
);
?>

<h1>Create Numeroconsultorio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>