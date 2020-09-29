<?php
/* @var $this EstadoreservaController */
/* @var $model Estadoreserva */

$this->breadcrumbs=array(
	'Estadoreservas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estadoreserva', 'url'=>array('index')),
	array('label'=>'Create Estadoreserva', 'url'=>array('create')),
	array('label'=>'View Estadoreserva', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Estadoreserva', 'url'=>array('admin')),
);
?>

<h1>Update Estadoreserva <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>