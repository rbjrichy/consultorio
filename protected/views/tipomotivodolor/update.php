<?php
/* @var $this TipomotivodolorController */
/* @var $model Tipomotivodolor */

$this->breadcrumbs=array(
	'Tipomotivodolors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipomotivodolor', 'url'=>array('index')),
	array('label'=>'Create Tipomotivodolor', 'url'=>array('create')),
	array('label'=>'View Tipomotivodolor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipomotivodolor', 'url'=>array('admin')),
);
?>

<h1>Update Tipomotivodolor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>