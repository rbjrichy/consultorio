<?php
/* @var $this AntecedentesdentalesController */
/* @var $model Antecedentesdentales */
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
		<?php echo $form->label($model,'numerocepilladas'); ?>
		<?php echo $form->textField($model,'numerocepilladas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hilodental'); ?>
		<?php echo $form->textField($model,'hilodental'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enjuaguebucal'); ?>
		<?php echo $form->textField($model,'enjuaguebucal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fuma'); ?>
		<?php echo $form->textField($model,'fuma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerofumadas'); ?>
		<?php echo $form->textField($model,'numerofumadas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tienedolor'); ?>
		<?php echo $form->textField($model,'tienedolor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipomotivodolor'); ?>
		<?php echo $form->textField($model,'idtipomotivodolor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'piezasdentales'); ?>
		<?php echo $form->textField($model,'piezasdentales',array('size'=>60,'maxlength'=>200)); ?>
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