<?php
/* @var $this AntecedentesdentalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Antecedentesdentales',
);

$this->menu=array(
	array('label'=>'Create Antecedentesdentales', 'url'=>array('create')),
	array('label'=>'Manage Antecedentesdentales', 'url'=>array('admin')),
);
?>

<h1>Antecedentesdentales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
