<?php
/* @var $this AnamnesisController */
/* @var $model Anamnesis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anamnesis-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'motivoconsulta'); ?>
		<?php echo $form->textField($model,'motivoconsulta',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'motivoconsulta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tratamientomedico'); ?>
		<?php echo $form->textField($model,'tratamientomedico'); ?>
		<?php echo $form->error($model,'tratamientomedico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombretratamientomedico'); ?>
		<?php echo $form->textField($model,'nombretratamientomedico',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombretratamientomedico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medicamentotratamientomedico'); ?>
		<?php echo $form->textField($model,'medicamentotratamientomedico',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'medicamentotratamientomedico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alergias'); ?>
		<?php echo $form->textField($model,'alergias',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'alergias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diabetes'); ?>
		<?php echo $form->textField($model,'diabetes'); ?>
		<?php echo $form->error($model,'diabetes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hipertension'); ?>
		<?php echo $form->textField($model,'hipertension'); ?>
		<?php echo $form->error($model,'hipertension'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cardiaco'); ?>
		<?php echo $form->textField($model,'cardiaco'); ?>
		<?php echo $form->error($model,'cardiaco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'epilepsia'); ?>
		<?php echo $form->textField($model,'epilepsia'); ?>
		<?php echo $form->error($model,'epilepsia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'embarazada'); ?>
		<?php echo $form->textField($model,'embarazada'); ?>
		<?php echo $form->error($model,'embarazada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gastritis'); ?>
		<?php echo $form->textField($model,'gastritis'); ?>
		<?php echo $form->error($model,'gastritis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'otros'); ?>
		<?php echo $form->textField($model,'otros',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'otros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpaciente'); ?>
		<?php echo $form->textField($model,'idpaciente'); ?>
		<?php echo $form->error($model,'idpaciente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<a href="#" onclick="document.getElementById('tbl-ingresaranamnesis-form').reset(); $('#'+'dialoganamnesis').dialog('open');">Nuevo Registro Anamnesis</a>
</div>


<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dialogmodificaranamnesis',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Modificar el Registro',
        'autoOpen'=>false,
        'width'=>700,
         'height'=>600,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.1'
        ),
         'position'=>array('my'=>'top','at'=>'top'), 
         'show'=>array(
            'effect'=>'bounce',
            'duration'=>400,
        ),
        'hide'=>array(
            'effect'=>'explode',
            'duration'=>500,
        ),

        'buttons' => array(
        'Cerrar'=>'js:function(){
         $(this).dialog("close")
        }',)
    ),
));
?> 

<div id='datosanamnesis'>
    
</div> 

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dialoganamnesis',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Ingrese los datos de Anamnesis',
        'autoOpen'=>false,
        'width'=>700,
         'height'=>600,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.1'
        ),
        'position'=>array('my'=>'top','at'=>'top'), 
        //'position'=>array('my'=>'center','at'=>'center'),
        'show'=>array(
            'effect'=>'bounce',
            'duration'=>400,
        ),
        'hide'=>array(
            'effect'=>'explode',
            'duration'=>500,
        ),

        'buttons' => array(
        'Cerrar'=>'js:function(){
         $(this).dialog("close")
        }',)
    ),
));
?> 

  <?php 
  $form=$this->beginWidget('CActiveForm', array(
    'id'=>'tbl-ingresaranamnesis-form',
        'action'=>array('paciente/insertaranamnesis'),             
        'enableAjaxValidation'=>false,
    )); 
  ?>






</div><!-- form -->