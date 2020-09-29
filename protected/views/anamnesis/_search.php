<?php
/* @var $this AnamnesisController */
/* @var $model Anamnesis */
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
		<?php echo $form->label($model,'motivoconsulta'); ?>
		<?php echo $form->textField($model,'motivoconsulta',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tratamientomedico'); ?>
		<?php echo $form->textField($model,'tratamientomedico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombretratamientomedico'); ?>
		<?php echo $form->textField($model,'nombretratamientomedico',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medicamentotratamientomedico'); ?>
		<?php echo $form->textField($model,'medicamentotratamientomedico',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alergias'); ?>
		<?php echo $form->textField($model,'alergias',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diabetes'); ?>
		<?php echo $form->textField($model,'diabetes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hipertension'); ?>
		<?php echo $form->textField($model,'hipertension'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cardiaco'); ?>
		<?php echo $form->textField($model,'cardiaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'epilepsia'); ?>
		<?php echo $form->textField($model,'epilepsia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'embarazada'); ?>
		<?php echo $form->textField($model,'embarazada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gastritis'); ?>
		<?php echo $form->textField($model,'gastritis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otros'); ?>
		<?php echo $form->textField($model,'otros',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->