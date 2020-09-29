<?php
/* @var $this TiporeporteController */
/* @var $data Tiporeporte */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipousuario')); ?>:</b>
	<?php echo CHtml::encode($data->idtipousuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitado')); ?>:</b>
	<?php echo CHtml::encode($data->habilitado); ?>
	<br />


</div>