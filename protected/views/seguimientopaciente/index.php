<?php
/* @var $this SeguimientopacienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seguimientopacientes',
);

$this->menu=array(
	array('label'=>'Create Seguimientopaciente', 'url'=>array('create')),
	array('label'=>'Manage Seguimientopaciente', 'url'=>array('admin')),
);
?>

<h1>Seguimientopacientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
