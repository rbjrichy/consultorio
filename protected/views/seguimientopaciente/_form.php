<?php
/* @var $this SeguimientopacienteController */
/* @var $model Seguimientopaciente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seguimientopaciente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
		<?php echo $form->error($model,'idpaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idactividad'); ?>
		<?php echo $form->textField($model,'idactividad'); ?>
		<?php echo $form->error($model,'idactividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechahoraregistro'); ?>
		<?php echo $form->textField($model,'fechahoraregistro'); ?>
		<?php echo $form->error($model,'fechahoraregistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idusuariogestion'); ?>
		<?php echo $form->textField($model,'idusuariogestion'); ?>
		<?php echo $form->error($model,'idusuariogestion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->