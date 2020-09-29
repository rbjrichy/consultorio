<?php
/* @var $this ReservaController */
/* @var $model Reserva */

$this->breadcrumbs=array(
	'Reservas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Reserva', 'url'=>array('index')),
	array('label'=>'Manage Reserva', 'url'=>array('admin')),
);
?>

<h1>Crear Reserva</h1>

<?php $this->renderPartial('form_reservapaciente', array('model'=>$model)); ?>