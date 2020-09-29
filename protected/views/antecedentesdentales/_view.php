<?php
/* @var $this AntecedentesdentalesController */
/* @var $data Antecedentesdentales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerocepilladas')); ?>:</b>
	<?php echo CHtml::encode($data->numerocepilladas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hilodental')); ?>:</b>
	<?php echo CHtml::encode($data->hilodental); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enjuaguebucal')); ?>:</b>
	<?php echo CHtml::encode($data->enjuaguebucal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuma')); ?>:</b>
	<?php echo CHtml::encode($data->fuma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerofumadas')); ?>:</b>
	<?php echo CHtml::encode($data->numerofumadas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tienedolor')); ?>:</b>
	<?php echo CHtml::encode($data->tienedolor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipomotivodolor')); ?>:</b>
	<?php echo CHtml::encode($data->idtipomotivodolor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('piezasdentales')); ?>:</b>
	<?php echo CHtml::encode($data->piezasdentales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpaciente')); ?>:</b>
	<?php echo CHtml::encode($data->idpaciente); ?>
	<br />

	*/ ?>

</div>