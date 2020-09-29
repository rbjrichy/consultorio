<?php
/* @var $this TiporeporteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tiporeportes',
);

$this->menu=array(
	array('label'=>'Create Tiporeporte', 'url'=>array('create')),
	array('label'=>'Manage Tiporeporte', 'url'=>array('admin')),
);
?>

<h1>Tiporeportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
