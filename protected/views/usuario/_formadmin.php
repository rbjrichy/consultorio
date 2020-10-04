<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'usuario-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
));?>
	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idtipousuario'); ?>
				<?php echo $form->dropDownList($model, 'idtipousuario', CHtml::listData(Tipousuario::model()->findAll(), 'id', 'rol')
    , array('empty' => 'Seleccione', 'class' => "form-control single-input-primary")); ?>
				<?php echo $form->error($model, 'idtipousuario'); ?>
			</div>
			
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
			<div class="form-group">
				<?php echo $form->labelEx($model, 'nombres'); ?>
				<?php echo $form->textField($model, 'nombres', array('class' => 'form-control single-input-primary', 'maxlength' => 100)); ?>
				<?php echo $form->error($model, 'nombres'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'apellidopaterno'); ?>
				<?php echo $form->textField($model, 'apellidopaterno', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'apellidopaterno'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'apellidomaterno'); ?>
				<?php echo $form->textField($model, 'apellidomaterno', array('class' => 'form-control single-input-primary', 'maxlength' => 50)); ?>
				<?php echo $form->error($model, 'apellidomaterno'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'ci'); ?>
				<?php echo $form->textField($model, 'ci', array('class' => 'form-control single-input-primary', 'maxlength' => 10)); ?>
				<?php echo $form->error($model, 'ci'); ?>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idsexo'); ?>
				<?php echo $form->dropDownList($model, 'idsexo', CHtml::listData(Sexo::model()->findAll(), 'id', 'descripcion'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary")); ?>
				<?php echo $form->error($model, 'idsexo'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idocupacion'); ?>
				<?php echo $form->dropDownList($model, 'idocupacion', CHtml::listData(Ocupacion::model()->findAll(), 'id', 'descripcion'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary")); ?>
				<?php echo $form->error($model, 'idocupacion'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idciudad'); ?>
				<?php echo $form->dropDownList($model, 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombreciudad'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary")); ?>
				<?php echo $form->error($model, 'idciudad'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'numerotelefono'); ?>
				<?php echo $form->textField($model, 'numerotelefono', array('class' => 'form-control single-input-primary', 'maxlength' => 10)); ?>
				<?php echo $form->error($model, 'numerotelefono'); ?>
			</div>
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
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
		</div>
	</div>
	<?php $this->endWidget();?>
	</div><!-- form -->