<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-registroExterno-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="typography">
	<h1>Registro Paciente</h1>
</div>

<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'nombreusuario'); ?>
				<?php echo $form->textField($model, 'nombreusuario', array('maxlength' => 50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model, 'nombreusuario'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'clave'); ?>
				<?php echo $form->passwordField($model, 'clave', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'clave'); ?>
			</div>
			
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'nombres'); ?>
				<?php echo $form->textField($model, 'nombres', array('class' => 'form-control single-input-primary', 'maxlength' => 100)); ?>
				<?php echo $form->error($model, 'nombres'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'primerApellido'); ?>
				<?php echo $form->textField($model, 'apellidopaterno', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'apellidopaterno'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'segundoApellido'); ?>
				<?php echo $form->textField($model, 'apellidomaterno', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'apellidomaterno'); ?>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'numerocelular'); ?>
				<?php echo $form->textField($model, 'numerocelular', array('class' => 'form-control single-input-primary', 'maxlength' => 10)); ?>
				<?php echo $form->error($model, 'numerocelular'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'email'); ?>
				<?php echo $form->textField($model, 'email', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'direccion'); ?>
				<?php echo $form->textField($model, 'direccion', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'direccion'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="d-none d-lg-block  pull-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
			</div>
		</div>
	</div>
<?php $this->endWidget();?>

</div>
<!-- form -->