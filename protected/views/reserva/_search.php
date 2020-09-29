<?php
/* @var $this ReservaController */
/* @var $model Reserva */
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
		<?php echo $form->label($model,'idnumeroconsultorio'); ?>
		<?php echo $form->textField($model,'idnumeroconsultorio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idhorario'); ?>
		<?php echo $form->textField($model,'idhorario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechareserva'); ?>
		<?php echo $form->textField($model,'fechareserva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'fechahoraregistro'); ?>
		<?php echo $form->textField($model,'fechahoraregistro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->