<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */

// php $this->widget( 'ext.EChosen.EChosen' );

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reserva-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>

	<div class="row">
		<div class="col-sm-5">
			<?php echo $form->errorSummary($model); ?>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'idpaciente'); ?>
				<?php 

					$criteria = new CDbCriteria();
					$criteria->condition = ('idusuario = '.Yii::app()->session['idusuario']);
			        
			        $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');
			       	        //var_dump($lista);

					echo $form->dropDownList($model,'idpaciente', $lista, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>

				<?php echo $form->error($model,'idpaciente'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'idnumeroconsultorio'); ?>
				<?php echo $form->dropDownList($model,'idnumeroconsultorio', CHtml::listData (Numeroconsultorio::model()->findAll(),'id','doctorasignado')
					, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary", 'onchange' => 'borrarTextoFecha()')); ?>
				<?php echo $form->error($model,'idnumeroconsultorio'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'fechareserva'); ?>
		                <?php 
		                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		                        'model' => $model,
		                        'attribute' => 'fechareserva',
		                        'name' => 'fechareserva',
		                        
		                        'htmlOptions' => array(
		                        'size' => '50',         // textField size
		                        'maxlength' => '10',    // textField maxlength
		                        'class'=>"form-control single-input-primary",
		                        'autocomplete' => 'off',
		                        'ajax'=>array
			                        (
			                            'type'=>'POST',
			                            'url'=>CController::createUrl('reserva/selecthorarios'),
			                            'data' => array(
			                            	'fechareserva' => 'js:this.value',
			                            	'idnumeroconsultorio' => 'js:document.getElementById("Reserva_idnumeroconsultorio").value',
			                            	),
			                            'success'=> 'function(data) 
			                                {
			                                    $("#idhorario").empty();
			                                    $("#idhorario").append(data);
			                                    $("#idhorario").trigger("liszt:updated");
			                                   
			                                 } ',
			                            'error' => 'function(data) {
								                console.log(data);
								              }',
			                    
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
	
			<div class="form-group">
				<?php echo $form->labelEx($model,'idhorario'); ?>
				<?php 
					echo $form->dropDownList($model,'idhorario', array(), array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary",'style'=>'width:300px;', 'id'=>'idhorario')); ?>
				<?php echo $form->error($model,'idhorario'); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'motivo'); ?>
				<?php echo $form->textField($model,'motivo', array('class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'motivo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'idestadoreserva'); ?>
				<?php 

					$criteria = new CDbCriteria();
			        
			        $lista = CHtml::listData(Estadoreserva::model()->findAll($criteria),'id','descripcion');

			        //var_dump($lista);

					echo $form->dropDownList($model,'idestadoreserva', $lista, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary",'style'=>'width:300px;')); ?>
				<?php echo $form->error($model,'idestadoreserva'); ?>
			</div>
	
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
			</div>
		</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	function borrarTextoFecha() {
	  var x = document.getElementById("fechareserva").value='';
	}
</script>