<?php
/* @var $this PagoController */
/* @var $model Pago */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pago-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
		<?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','descripcion')
			, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
		<?php echo $form->error($model,'idnumeroconsultorio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeropieza'); ?>
		<?php echo $form->textField($model,'numeropieza'); ?>
		<?php echo $form->error($model,'numeropieza'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'costo'); ?>
		<?php echo $form->textField($model,'costo'); ?>
		<?php echo $form->error($model,'costo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acuenta'); ?>
		<?php echo $form->textField($model,'acuenta'); ?>
		<?php echo $form->error($model,'acuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo'); ?>
		<?php echo $form->textField($model,'saldo'); ?>
		<?php 
			echo $form->error($model,'saldo'); 

			//echo CHtml::hiddenField('fidpaciente',$_GET['idpaciente']);
			echo $form->hiddenField($model,'idpaciente');
		?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->