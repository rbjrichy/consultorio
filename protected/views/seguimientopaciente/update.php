<?php
/* @var $this SeguimientopacienteController */
/* @var $model Seguimientopaciente */

$this->breadcrumbs=array(
	'Seguimientopacientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seguimientopaciente', 'url'=>array('index')),
	array('label'=>'Create Seguimientopaciente', 'url'=>array('create')),
	array('label'=>'View Seguimientopaciente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Seguimientopaciente', 'url'=>array('admin')),
);
?>

<h1>Update Seguimientopaciente <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>