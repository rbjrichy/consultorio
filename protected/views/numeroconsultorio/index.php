<?php
/* @var $this NumeroconsultorioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Numeroconsultorios',
);

$this->menu=array(
	array('label'=>'Create Numeroconsultorio', 'url'=>array('create')),
	array('label'=>'Manage Numeroconsultorio', 'url'=>array('admin')),
);
?>

<h1>Numeroconsultorios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
