<?php
/* @var $this OpcionesController */
/* @var $model Opciones */

$this->breadcrumbs=array(
	'Opciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opciones', 'url'=>array('index')),
	array('label'=>'Create Opciones', 'url'=>array('create')),
	array('label'=>'View Opciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Opciones', 'url'=>array('admin')),
);
?>

<h1>Update Opciones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>