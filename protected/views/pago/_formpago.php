<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<?php $this->widget( 'ext.EChosen.EChosen' ); ?>
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pago-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
				<?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','descripcion')
				, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'idnumeroconsultorio'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'idpaciente'); ?>
				<?php
				$criteria = new CDbCriteria();
				//$criteria->order = 'apellidopaterno asc';
				//$criteria->condition = 'idtipousuario = 2'; //solo estudiantes
				$lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');
				//var_dump($lista);
				echo $form->dropDownList($model,'idpaciente', $lista, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'idpaciente'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'numeropieza'); ?>
				<?php echo $form->textField($model,'numeropieza',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'numeropieza'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'costo'); ?>
				<?php echo $form->textField($model,'costo',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'costo'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model,'acuenta'); ?>
				<?php echo $form->textField($model,'acuenta',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'acuenta'); ?>
			</div>
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->