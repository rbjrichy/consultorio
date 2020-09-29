<?php
/* @var $this AnamnesisController */
/* @var $data Anamnesis */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivoconsulta')); ?>:</b>
	<?php echo CHtml::encode($data->motivoconsulta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tratamientomedico')); ?>:</b>
	<?php echo CHtml::encode($data->tratamientomedico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombretratamientomedico')); ?>:</b>
	<?php echo CHtml::encode($data->nombretratamientomedico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medicamentotratamientomedico')); ?>:</b>
	<?php echo CHtml::encode($data->medicamentotratamientomedico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alergias')); ?>:</b>
	<?php echo CHtml::encode($data->alergias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diabetes')); ?>:</b>
	<?php echo CHtml::encode($data->diabetes); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hipertension')); ?>:</b>
	<?php echo CHtml::encode($data->hipertension); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cardiaco')); ?>:</b>
	<?php echo CHtml::encode($data->cardiaco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('epilepsia')); ?>:</b>
	<?php echo CHtml::encode($data->epilepsia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('embarazada')); ?>:</b>
	<?php echo CHtml::encode($data->embarazada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gastritis')); ?>:</b>
	<?php echo CHtml::encode($data->gastritis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otros')); ?>:</b>
	<?php echo CHtml::encode($data->otros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpaciente')); ?>:</b>
	<?php echo CHtml::encode($data->idpaciente); ?>
	<br />

	*/ ?>

</div>