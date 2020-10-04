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

	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>


	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php 

			echo $form->hiddenField($model,'fechareserva');
			echo $form->hiddenField($model,'idnumeroconsultorio');
			echo $form->hiddenField($model,'idhorario');
			echo $form->hiddenField($model,'idpaciente');

			echo $form->hiddenField($model,'motivo');
			
			$criteria = new CDbCriteria();
	        
	        $lista = CHtml::listData(Estadoreserva::model()->findAll($criteria),'id','descripcion');

	    ?>
	    <div class="form-group">
			<?php echo $form->labelEx($model,'idestadoreserva'); ?>
		    <?php 
				echo $form->dropDownList($model,'idestadoreserva', $lista, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); 
			?>
	    </div>

		<?php echo $form->error($model,'idestadoreserva'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->