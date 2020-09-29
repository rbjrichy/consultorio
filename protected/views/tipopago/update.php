<?php
/* @var $this TipopagoController */
/* @var $model Tipopago */

$this->breadcrumbs=array(
	'Tipopagos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipopago', 'url'=>array('index')),
	array('label'=>'Create Tipopago', 'url'=>array('create')),
	array('label'=>'View Tipopago', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipopago', 'url'=>array('admin')),
);
?>

<h1>Update Tipopago <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>