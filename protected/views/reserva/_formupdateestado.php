<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
?>


<?php $this->widget( 'ext.EChosen.EChosen' ); ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reserva-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'idestadoreserva'); ?>
		<?php 

			echo $form->hiddenField($model,'fechareserva');
			echo $form->hiddenField($model,'idnumeroconsultorio');
			echo $form->hiddenField($model,'idhorario');
			echo $form->hiddenField($model,'idpaciente');

			echo $form->hiddenField($model,'motivo');
			
			$criteria = new CDbCriteria();
	        
	        $lista = CHtml::listData(Estadoreserva::model()->findAll($criteria),'id','descripcion');

	        //var_dump($lista);

			echo $form->dropDownList($model,'idestadoreserva', $lista, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
		<?php echo $form->error($model,'idestadoreserva'); ?>
	</div>
	

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->