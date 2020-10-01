<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Paciente', 'url'=>array('index')),
	array('label'=>'Create Paciente', 'url'=>array('create')),
	array('label'=>'View Paciente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Paciente', 'url'=>array('admin')),
);
?>
<div class="typography">
<h1>Actualizar Paciente <?php echo $model->id; ?></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>