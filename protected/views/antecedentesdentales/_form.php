<?php
/* @var $this AntecedentesdentalesController */
/* @var $model Antecedentesdentales */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'antecedentesdentales-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numerocepilladas'); ?>
		<?php echo $form->textField($model,'numerocepilladas'); ?>
		<?php echo $form->error($model,'numerocepilladas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hilodental'); ?>
		<?php echo $form->textField($model,'hilodental'); ?>
		<?php echo $form->error($model,'hilodental'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enjuaguebucal'); ?>
		<?php echo $form->textField($model,'enjuaguebucal'); ?>
		<?php echo $form->error($model,'enjuaguebucal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fuma'); ?>
		<?php echo $form->textField($model,'fuma'); ?>
		<?php echo $form->error($model,'fuma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerofumadas'); ?>
		<?php echo $form->textField($model,'numerofumadas'); ?>
		<?php echo $form->error($model,'numerofumadas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tienedolor'); ?>
		<?php echo $form->textField($model,'tienedolor'); ?>
		<?php echo $form->error($model,'tienedolor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idtipomotivodolor'); ?>
		<?php echo $form->textField($model,'idtipomotivodolor'); ?>
		<?php echo $form->error($model,'idtipomotivodolor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'piezasdentales'); ?>
		<?php echo $form->textField($model,'piezasdentales',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'piezasdentales'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
		<?php echo $form->error($model,'idpaciente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->