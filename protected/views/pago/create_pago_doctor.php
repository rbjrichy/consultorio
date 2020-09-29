<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Pago'=>array('admin'),
	'Crear',
);

$this->menu=array(
	
);
?>

<h1>Crear Pago</h1>

<?php $this->renderPartial('_form_pago_doctor', array('model'=>$model)); ?>