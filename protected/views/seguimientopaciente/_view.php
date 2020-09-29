<?php
/* @var $this SeguimientopacienteController */
/* @var $data Seguimientopaciente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpaciente')); ?>:</b>
	<?php echo CHtml::encode($data->idpaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idactividad')); ?>:</b>
	<?php echo CHtml::encode($data->idactividad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechahoraregistro')); ?>:</b>
	<?php echo CHtml::encode($data->fechahoraregistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuariogestion')); ?>:</b>
	<?php echo CHtml::encode($data->idusuariogestion); ?>
	<br />


</div>