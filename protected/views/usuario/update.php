<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	//$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuarios </h1>

<?php $this->renderPartial('_formadmin', array('model'=>$model)); ?>