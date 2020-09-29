<?php
/* @var $this ReservaController */
/* @var $data Reserva */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('idnumeroconsultorio')); ?>:</b>
	<?php echo CHtml::encode($data->idnumeroconsultorio); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('idhorario')); ?>:</b>
	<?php echo CHtml::encode($data->idhorario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechareserva')); ?>:</b>
	<?php echo CHtml::encode($data->fechareserva); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('idpaciente')); ?>:</b>
	<?php echo CHtml::encode($data->idpaciente); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechahoraregistro')); ?>:</b>
	<?php echo CHtml::encode($data->fechahoraregistro); ?>
	<br />


</div>