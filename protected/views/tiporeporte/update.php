<?php
/* @var $this TiporeporteController */
/* @var $model Tiporeporte */

$this->breadcrumbs=array(
	'Tiporeportes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tiporeporte', 'url'=>array('index')),
	array('label'=>'Create Tiporeporte', 'url'=>array('create')),
	array('label'=>'View Tiporeporte', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tiporeporte', 'url'=>array('admin')),
);
?>

<h1>Update Tiporeporte <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>