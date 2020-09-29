<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido paterno')); ?>:</b>
	<?php echo CHtml::encode($data->apellidopaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido materno')); ?>:</b>
	<?php echo CHtml::encode($data->apellidomaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreusuario')); ?>:</b>
	<?php echo CHtml::encode($data->nombreusuario); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('ci')); ?>:</b>
	<?php echo CHtml::encode($data->ci); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->idsexo->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->idocupacion->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idciudad')); ?>:</b>
	<?php echo CHtml::encode($data->idciudad->nombreciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerotelefono')); ?>:</b>
	<?php echo CHtml::encode($data->numerotelefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerocelular')); ?>:</b>
	<?php echo CHtml::encode($data->numerocelular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecharegistro')); ?>:</b>
	<?php echo CHtml::encode($data->fecharegistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo Usuario')); ?>:</b>
	<?php echo CHtml::encode($data->idtipousuario->rol); ?>
	<br />

</div>