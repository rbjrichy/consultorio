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
<div class="typography">
	<h1>Crear Reserva</h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>