<?php
/* @var $this AntecedentesdentalesController */
/* @var $model Antecedentesdentales */

$this->breadcrumbs=array(
	'Antecedentesdentales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Antecedentesdentales', 'url'=>array('index')),
	array('label'=>'Create Antecedentesdentales', 'url'=>array('create')),
	array('label'=>'View Antecedentesdentales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Antecedentesdentales', 'url'=>array('admin')),
);
?>

<h1>Update Antecedentesdentales <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>