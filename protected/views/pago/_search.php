<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechahoraregistro'); ?>
		<?php echo $form->textField($model,'fechahoraregistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeropieza'); ?>
		<?php echo $form->textField($model,'numeropieza'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costo'); ?>
		<?php echo $form->textField($model,'costo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acuenta'); ?>
		<?php echo $form->textField($model,'acuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saldo'); ?>
		<?php echo $form->textField($model,'saldo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'idnumeroconsultorio'); ?>
		<?php echo $form->textField($model,'idnumeroconsultorio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->