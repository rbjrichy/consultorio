<?php
/* @var $this OpcionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opciones',
);

$this->menu=array(
	array('label'=>'Create Opciones', 'url'=>array('create')),
	array('label'=>'Manage Opciones', 'url'=>array('admin')),
);
?>

<h1>Opciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
