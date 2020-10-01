<?php
/* @var $this PacienteController */
/* @var $model Paciente */
$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Crear',
);
$this->menu=array(
	array('label'=>'List Paciente', 'url'=>array('index')),
	array('label'=>'Manage Paciente', 'url'=>array('admin')),
);
?>
<div class="typography">
	<h1>Activar Paciente</h1>
	
</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>