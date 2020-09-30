<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->pageTitle   = Yii::app()->name . ' - Acceso';
$this->breadcrumbs = array(
    'Acceso',
);
?>
<!-- <div class="h-100 bg-primary">
	<div class="container h-100"> -->
		<div class="row justify-content-center h-100 mb-4 mt-2">
			<div class="col-sm-4">
				<div class="card shadow">
					<div class="card-body">
							<h1 class="text-center">Acceso</h1>
							<p>Por favor ingrese sus datos:</p>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'                     => 'login-form',
    'enableClientValidation' => true,
    'errorMessageCssClass'   => 'alert alert-danger',
    'clientOptions'          => array(
        'validateOnSubmit' => true,
    ),
));
?>
							<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'username', ['class' => 'font-weight-bold']); ?>
								<?php echo $form->textField($model, 'username', ['class' => 'form-control single-input-primary', 'placeholder' => 'Usuario']); ?>
								<?php echo $form->error($model, 'username'); ?>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'password', ['class' => 'font-weight-bold']); ?>
								<?php echo $form->passwordField($model, 'password', ['class' => 'form-control single-input-primary', 'placeholder' => 'Password']); ?>
								<?php echo $form->error($model, 'password'); ?>
							</div>
							<div class="form-group">
									<?php echo $form->checkBox($model, 'rememberMe', ['id' => "primary-checkbox"]); ?>
									<?php echo $form->label($model, 'rememberMe', ['class' => 'font-weight-bold', 'for' => "primary-checkbox"]); ?>
									<?php echo $form->error($model, 'rememberMe'); ?>
							</div>
							<div class="form-group">
								<?php echo CHtml::submitButton('Ingresar', ['class' => 'genric-btn primary-border radius']); ?>
							</div>
							<?php $this->endWidget();?>
					</div>
				</div>
			</div>
<!-- 		</div>
	</div> -->
</div>