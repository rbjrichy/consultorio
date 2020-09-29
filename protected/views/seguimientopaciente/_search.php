<?php
/* @var $this SeguimientopacienteController */
/* @var $model Seguimientopaciente */
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
		<?php echo $form->label($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idactividad'); ?>
		<?php echo $form->textField($model,'idactividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechahoraregistro'); ?>
		<?php echo $form->textField($model,'fechahoraregistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idusuariogestion'); ?>
		<?php echo $form->textField($model,'idusuariogestion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->