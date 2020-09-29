<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */

//$_SESSION["valoridconsultorio"] = 2;

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
		<?php echo $form->labelEx($model,'idpaciente'); ?>
		<?php echo $form->dropDownList($model,'idpaciente', CHtml::listData (Paciente::model()->findAll(),'id','usuario.nombrecompleto')
			, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
		<?php echo $form->error($model,'idpaciente'); ?>
	</div>

   <div class="row">
		<?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
		<?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','descripcion')
			, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
		<?php echo $form->error($model,'idnumeroconsultorio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechareserva'); ?>
                <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fechareserva',
                        'name' => 'fechareserva',
                        
                        'htmlOptions' => array(
                        'size' => '50',         // textField size
                        'maxlength' => '10',    // textField maxlength
                        'ajax'=>array
	                        (
	                            'type'=>'POST',
	                            'url'=>CController::createUrl('reserva/selecthorarios'),
	                            'data' => array('fechareserva' => 'js:this.value'),
	                            'success'=> 'function(data) 
	                                {
	                                    $("#idhorario").empty();
	                                    $("#idhorario").append(data);
	                                    $("#idhorario").trigger("liszt:updated");
	                                   
	                                 } ',
	                    
	                         ),
                         ),
                        'options'=>array(
                        'showAnim'=>'fold',
                        'changeYear' => 'true',
                        'dateFormat' => 'yy-mm-dd',
                        'monthNames' => array('Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre'),
                        'monthNamesShort' => array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"),
                        'dayNames' => array('Domingo,Lunes,Martes,Miercoles,Jueves,Viernes,Sabado'),
                        'dayNamesMin' => array('Do','Lu','Ma','Mi','Ju','Vi','Sa'),
                        'changeMonth' => 'true',
                        'language'=> 'es',
                        'minDate' => date('y-m-d'),
                        //'language'=> Yii::app()->getLanguage(),
                        ),
                        
                        ));
                ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'idhorario'); ?>
		<?php 
			echo $form->dropDownList($model,'idhorario', array(), array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;', 'id'=>'idhorario')); ?>
		<?php echo $form->error($model,'idhorario'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'motivo'); ?>
		<?php echo $form->textField($model,'motivo'); ?>
		<?php echo $form->error($model,'motivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idestadoreserva'); ?>
		<?php 

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