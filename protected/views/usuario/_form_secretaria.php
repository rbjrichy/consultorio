<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
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


							<?php 
								//mandamos por hidden porque siempre creamos usuario tipo2 (investigador), solo el administrador crea otro tipo de usuarios
								echo $form->hiddenField($model,'idtipousuario',array('value' => 4));
							    echo $form->hiddenField($model, 'idpaciente', array('value'=>1)); ?>
								

						</div>

                        
						
						<div class="row">


							<?php echo $form->labelEx($model,'nombreusuario'); ?>
							<?php echo $form->textField($model,'nombreusuario',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'nombreusuario'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'clave'); ?>
							<?php echo $form->passwordField($model,'clave',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'clave'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'nombres'); ?>
							<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>100)); ?>
							<?php echo $form->error($model,'nombres'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'apellidopaterno'); ?>
							<?php echo $form->textField($model,'apellidopaterno',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'apellidopaterno'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'apellidomaterno'); ?>
							<?php echo $form->textField($model,'apellidomaterno',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'apellidomaterno'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'ci'); ?>
							<?php echo $form->textField($model,'ci',array('size'=>50,'maxlength'=>10)); ?>
							<?php echo $form->error($model,'ci'); ?>
						</div>				
					</tr>
				</table>
			</th>
				
			<th>
				<table style="width:100%">
					<tr>
						<div class="row">
							<?php echo $form->labelEx($model,'idsexo'); ?>
							<?php echo $form->dropDownList($model,'idsexo', CHtml::listData (Sexo::model()->findAll(),'id','descripcion')
								, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
							<?php echo $form->error($model,'idsexo'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'idocupacion'); ?>
							<?php echo $form->dropDownList($model,'idocupacion', CHtml::listData (Ocupacion::model()->findAll(),'id','descripcion')
								, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
							<?php echo $form->error($model,'idocupacion'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'idciudad'); ?>
							<?php echo $form->dropDownList($model,'idciudad', CHtml::listData (Ciudad::model()->findAll(),'id','nombreciudad')
								, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
							<?php echo $form->error($model,'idciudad'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'numerotelefono'); ?>
							<?php echo $form->textField($model,'numerotelefono',array('size'=>50,'maxlength'=>10)); ?>
							<?php echo $form->error($model,'numerotelefono'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'numerocelular'); ?>
							<?php echo $form->textField($model,'numerocelular',array('size'=>50,'maxlength'=>10)); ?>
							<?php echo $form->error($model,'numerocelular'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'email'); ?>
							<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'email'); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($model,'direccion'); ?>
							<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
							<?php echo $form->error($model,'direccion'); ?>
						</div>					
					</tr>
				</table>
			</th>
		</tr>
		
	</table>
	
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->