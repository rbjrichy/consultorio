<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuario'=>array('admin'),
	'Crear',
);

// $this->menu=array(
// 	array('label'=>'Lista Usuario', 'url'=>array('index')),
// 	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
// );
?>

<h1>Introducir Datos Paciente</h1>

<?php $this->renderPartial('_form_secretaria', array('model'=>$model)); ?>