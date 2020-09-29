<?php
/* @var $this NumeroconsultorioController */
/* @var $model Numeroconsultorio */

$this->breadcrumbs=array(
	'Numeroconsultorios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Numeroconsultorio', 'url'=>array('index')),
	array('label'=>'Create Numeroconsultorio', 'url'=>array('create')),
	array('label'=>'View Numeroconsultorio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Numeroconsultorio', 'url'=>array('admin')),
);
?>

<h1>Update Numeroconsultorio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>