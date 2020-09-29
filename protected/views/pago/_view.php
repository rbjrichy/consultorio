<?php
/* @var $this PagoController */
/* @var $data Pago */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechahoraregistro')); ?>:</b>
	<?php echo CHtml::encode($data->fechahoraregistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeropieza')); ?>:</b>
	<?php echo CHtml::encode($data->numeropieza); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo')); ?>:</b>
	<?php echo CHtml::encode($data->costo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acuenta')); ?>:</b>
	<?php echo CHtml::encode($data->acuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
	<?php echo CHtml::encode($data->saldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpaciente')); ?>:</b>
	<?php echo CHtml::encode($data->idpaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnumeroconsultorio')); ?>:</b>
	<?php echo CHtml::encode($data->idnumeroconsultorio); ?>
	<br />


</div>