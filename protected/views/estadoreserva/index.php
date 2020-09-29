<?php
/* @var $this EstadoreservaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estadoreservas',
);

$this->menu=array(
	array('label'=>'Create Estadoreserva', 'url'=>array('create')),
	array('label'=>'Manage Estadoreserva', 'url'=>array('admin')),
);
?>

<h1>Estadoreservas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
