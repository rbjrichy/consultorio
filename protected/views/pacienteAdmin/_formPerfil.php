<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>
   	
	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="">Nombre</label>
				<span class="form-control  single-input-primary">
		          <?php
			          echo isset($model->nombres) ? $model->nombres.' ' : '';
			          echo isset($model->apellidopaterno) ? $model->apellidopaterno.' ' : '';
			          echo isset($model->apellidomaterno) ? $model->apellidomaterno.' ' : '';
		          ?> 
        		</span>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'ci'); ?>
				<?php echo $form->textField($model, 'ci', array('class' => 'form-control single-input-primary', 'maxlength' => 10)); ?>
				<?php echo $form->error($model, 'ci'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idsexo'); ?>
				<?php echo $form->dropDownList($model, 'idsexo', CHtml::listData(Sexo::model()->findAll(), 'id', 'descripcion'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary", 'style' => 'width:300px;')); ?>
				<?php echo $form->error($model, 'idsexo'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idocupacion'); ?>
				<?php echo $form->dropDownList($model, 'idocupacion', CHtml::listData(Ocupacion::model()->findAll(), 'id', 'descripcion'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary", 'style' => 'width:300px;')); ?>
				<?php echo $form->error($model, 'idocupacion'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'idciudad'); ?>
				<?php echo $form->dropDownList($model, 'idciudad', CHtml::listData(Ciudad::model()->findAll(), 'id', 'nombreciudad'), array('empty' => 'Seleccione', 'class' => "form-control single-input-primary", 'style' => 'width:300px;')); ?>
				<?php echo $form->error($model, 'idciudad'); ?>
			</div>
		</div>
		<div class="col-sm-6">
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

<?php $this->endWidget(); ?>

</div><!-- form -->