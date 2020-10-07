<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pago-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
	<div class="col-sm-6">
		<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
		<?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','doctorasignado')
			, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
		<?php echo $form->error($model,'idnumeroconsultorio'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'numeropieza'); ?>
		<?php echo $form->textField($model,'numeropieza',['class' => 'form-control single-input-primary']); ?>
		<?php echo $form->error($model,'numeropieza'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'costo'); ?>
		<?php echo $form->textField($model,'costo',['class' => 'form-control single-input-primary']); ?>
		<?php echo $form->error($model,'costo'); ?>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
	</div>
	</div>
</div>

	

<?php $this->endWidget(); ?>

</div><!-- form -->