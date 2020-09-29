<?php
/* @var $this TipousuarioController */
/* @var $model Tipousuario */

$this->breadcrumbs=array(
	'Tipousuarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipousuario', 'url'=>array('index')),
	array('label'=>'Create Tipousuario', 'url'=>array('create')),
	array('label'=>'View Tipousuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipousuario', 'url'=>array('admin')),
);
?>

<h1>Update Tipousuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>