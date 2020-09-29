<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paciente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
							<?php echo $form->labelEx($model,'idusuario'); 

							$criteria = new CDbCriteria();				
						    $criteria->select = 't.*';
                            $criteria->join ='LEFT JOIN paciente p ON p.idusuario = t.id';
                            $criteria->addCondition('p.id IS NULL');
                            $criteria->addCondition('t.idpaciente = 1');
                           
							?>
							<?php echo $form->dropDownList($model,'idusuario', CHtml::listData (Usuario::model()->findAll($criteria),'id','nombrecompleto')
								, array('empty'=>'Seleccione', 'class'=>"chzn-select",'style'=>'width:300px;')); ?>
							<?php echo $form->error($model,'idusuario'); ?>
						</div>
	<div class="row">
		
		<?php echo $form->labelEx($model,'fechanacimiento'); ?>
                <?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'fechanacimiento',
                        'name' => 'fechanacimiento',
                        'value'=>'1990-01-01',
                        'htmlOptions' => array(
                        'size' => '50',         // textField size
                        'maxlength' => '10',    // textField maxlength
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
                        //'language'=> Yii::app()->getLanguage(),
                        ),
                        ));
                ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edad'); ?>
		<?php echo $form->textField($model,'edad'); ?>
		<?php echo $form->error($model,'edad'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->