<?php
/* @var $this TipopagoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipopagos',
);

$this->menu=array(
	array('label'=>'Create Tipopago', 'url'=>array('create')),
	array('label'=>'Manage Tipopago', 'url'=>array('admin')),
);
?>

<h1>Tipopagos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
