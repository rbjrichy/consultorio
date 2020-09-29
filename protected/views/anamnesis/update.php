<?php
/* @var $this AnamnesisController */
/* @var $model Anamnesis */

$this->breadcrumbs=array(
	'Anamnesises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anamnesis', 'url'=>array('index')),
	array('label'=>'Create Anamnesis', 'url'=>array('create')),
	array('label'=>'View Anamnesis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Anamnesis', 'url'=>array('admin')),
);
?>

<h1>Update Anamnesis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>