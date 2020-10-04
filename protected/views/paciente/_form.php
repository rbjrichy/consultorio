<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
//el model es un modelo de Paciente
// var_dump($model->usuario);
// Yii::app()->end();

?>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
	'id'                   => 'paciente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
	));?>
	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<?php 
				if (is_null($model->usuario)) {
					$criteria         = new CDbCriteria();
					$criteria->select = 't.*';
					$criteria->join   = 'left join consultorio.paciente p on t.id = p.idusuario';
					$criteria->addCondition('p.id IS NULL');
					$criteria->addCondition('t.idtipousuario = 4');//4 es tipo paciente
					# code...
				}
				else
				{
					$criteria         = new CDbCriteria();
					$criteria->select = 't.*';
					$criteria->join   = 'inner join consultorio.paciente p on t.id = p.idusuario';
					// $criteria->addCondition('p.id IS NULL');
					$criteria->addCondition('t.idtipousuario = 4');
					$criteria->compare('p.id', $model->id);

				}
				echo $form->labelEx($model, 'idusuario');
				?>
				<?php echo $form->dropDownList($model, 'idusuario', CHtml::listData(Usuario::model()->findAll($criteria), 'id', 'nombrecompleto')
				, array('empty' => 'Seleccione', 'class' => "form-control single-input-primary", 'style' => 'width:300px;')); ?>
				<?php echo $form->error($model, 'idusuario'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($model, 'fechanacimiento'); ?>
				<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'       => $model,
				'attribute'   => 'fechanacimiento',
				'name'        => 'fechanacimiento',
				'value'       => '1990-01-01',
				'htmlOptions' => array(
				'size'      => '50', // textField size
				'maxlength' => '10', // textField maxlength
				'class'     => 'form-control single-input-primary',
				),
				'options'     => array(
				'showAnim'        => 'fold',
				'changeYear'      => 'true',
				'dateFormat'      => 'yy-mm-dd',
				'monthNames'      => array('Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre'),
				'monthNamesShort' => array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"),
				'dayNames'        => array('Domingo,Lunes,Martes,Miercoles,Jueves,Viernes,Sabado'),
				'dayNamesMin'     => array('Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'),
				'changeMonth'     => 'true',
				'language'        => 'es',
				//'language'=> Yii::app()->getLanguage(),
				),
				));
				?>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius']); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget();?>
	</div><!-- form -->

	<script>

	</script>