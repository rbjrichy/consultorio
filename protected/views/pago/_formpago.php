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

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<table style="width:100%">
		<tr>
			<th>
				<table style="width:100%">
					<tr>
						
	                    <div class="row">
		                  <?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
		                  <?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','descripcion')
		             	, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
		                  <?php echo $form->error($model,'idnumeroconsultorio'); ?>
	                    </div>


						<div class="row">
							<?php echo $form->labelEx($model,'idpaciente'); ?>
							<?php 

								$criteria = new CDbCriteria();
						        //$criteria->order = 'apellidopaterno asc';
						        //$criteria->condition = 'idtipousuario = 2'; //solo estudiantes
						        $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');

						        //var_dump($lista);

								echo $form->dropDownList($model,'idpaciente', $lista, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
							<?php echo $form->error($model,'idpaciente'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'numeropieza'); ?>
							<?php echo $form->textField($model,'numeropieza',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'numeropieza'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'costo'); ?>
							<?php echo $form->textField($model,'costo',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'costo'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'acuenta'); ?>
							<?php echo $form->textField($model,'acuenta',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'acuenta'); ?>
						</div>

				</table>
			</th>
		</tr>


		
	</table>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->