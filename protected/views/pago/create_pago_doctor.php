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
<div class="typography">
<h1>Crear Pago</h1>
</div>

<?php $this->renderPartial('_form_pago_doctor', array('model'=>$model)); ?>