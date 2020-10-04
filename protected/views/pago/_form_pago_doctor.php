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
              <?php echo $form->hiddenField($model,'idnumeroconsultorio',array('value' => 2));?>	                  
            <div class="form-group">
				<?php echo $form->labelEx($model,'idpaciente'); ?>
				<?php 						

					$criteria = new CDbCriteria();
			        //$criteria->condition = 'idnumeroconsultorio = 2'; 

			        $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');

			        //var_dump($lista);

					echo $form->dropDownList($model,'idpaciente', $lista, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
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
		</div>
	</div>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->