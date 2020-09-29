<?php
/* @var $this TipomotivodolorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipomotivodolors',
);

$this->menu=array(
	array('label'=>'Create Tipomotivodolor', 'url'=>array('create')),
	array('label'=>'Manage Tipomotivodolor', 'url'=>array('admin')),
);
?>

<h1>Tipomotivodolors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
