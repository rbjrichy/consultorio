<?php
/* @var $this PacienteAdminController */

$this->breadcrumbs=array(
	'Paciente Admin',
);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="typography mb-5">
				<h3>
					Perfil de Paciente
				</h3>
			</div>

			<div class="row">
				<div class="col-md-5">
					
					<div class="row mb-2">
      <div class="col-md-4">
        <strong>Nombre: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
          echo isset($modelUsuario->nombres) ? $modelUsuario->nombres.' ' : '';
          echo isset($modelUsuario->apellidopaterno) ? $modelUsuario->apellidopaterno.' ' : '';
          echo isset($modelUsuario->apellidomaterno) ? $modelUsuario->apellidomaterno.' ' : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>CI: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
            echo isset($modelUsuario->ci) ? $modelUsuario->ci : '';
         ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Sexo: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
             echo isset($modelUsuario->sexo->descripcion) ? $modelUsuario->sexo->descripcion : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Ocupación: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
            echo isset($modelUsuario->ocupacion->descripcion) ? $modelUsuario->ocupacion->descripcion : '';
        ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Ciudad: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
             echo isset($modelUsuario->ciudad->nombreciudad) ? $modelUsuario->ciudad->nombreciudad : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Num. Teléfono: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
            echo isset($modelUsuario->numerotelefono) ? $modelUsuario->numerotelefono : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Celular: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
            echo isset($modelUsuario->numerocelular) ? $modelUsuario->numerocelular : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>email: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
              echo isset($modelUsuario->email) ? $modelUsuario->email : '';
          ?>
        </span>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-4">
        <strong>Dirección: </strong>
      </div>
      <div class="col-md-8">
        <span>
          <?php
             echo isset($modelUsuario->direccion) ? $modelUsuario->direccion : '';
          ?>
        </span>
      </div>
    </div>

					<div class="row">
						<div class="col-md-12">
              <a href="index.php?r=pacienteAdmin/ActualizarPerfil" class="genric-btn primary-border radius small"  title="Editar Perfil">Editar Perfil</a>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="span12 text-center mb-5">
						<?php
					        $nameAvatar = isset($modelUsuario->avatar) ? $modelUsuario->avatar : 'perfil-avatar-hombre-icono-redondo.jpg';
					        $pathAvatar = Yii::app()->request->baseUrl . '/images/avatar/' . $nameAvatar;
				        ?>
				        <?php 
				        // CHtml::image($pathAvatar,array('width'=>200));
				        ?>
						<img width="200" alt="Vista previa de la imagen de Bootstrap" src="<?php echo $pathAvatar; ?>" class="rounded-circle" />
					</div>
					<?php
		        /** codigo para generar el formulario ingresar datos estudiso externos */
		        $form = $this->beginWidget('CActiveForm', array(
		                'id'                   => 'tbl-ingresarExamExterno-form',
		                'action'               => array('pacienteAdmin/subirAvatar'),
		                'htmlOptions'          => ['enctype' => 'multipart/form-data'],
		                'enableAjaxValidation' => false,
		            ));
		        ?>
				            <?php
				                echo CHtml::hiddenField('usuario_id', Yii::app()->user->id);
				            ?>
				            <div class="form-group">
				            	<label for="exampleInputFile">
									Cambiar Foto de Perfil
								</label>
				                <?php echo CHtml::activeFileField($modelUsuario, 'avatar'); ?>
				                <p class="help-block">
				                    Extenciones (.jpg, .png)
				                </p>
				            </div>
				            <div class="form-group">
				                <button class="genric-btn primary-border radius small" type="submit" class="btn btn-primary">
									Guardar
								</button>
				            </div>
				        <?php $this->endWidget();
				        ?>
				</div>
				<div class="col-md-3">
					<div class="typography">
						<h5>Cambiar Contraseña</h5>
					</div>
          <?php if(Yii::app()->user->hasFlash('success')):?>
              <div class="alert alert-success">
                  <?php echo Yii::app()->user->getFlash('success'); ?>
              </div>
          <?php endif; ?>
          <?php if(Yii::app()->user->hasFlash('error')):?>
              <div class="alert alert-danger">
                  <?php echo Yii::app()->user->getFlash('error'); ?>
              </div>
          <?php endif; ?>
          <div class="form">

          <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'chnage-password-form',
                'action' => array('usuario/cambiarPassword'),
                'enableClientValidation' => true,
                'htmlOptions' => array('class' => 'well'),
                'clientOptions' => array(
                  'validateOnSubmit' => true,
                ),
             ));
          ?>

            <div class="row"> <?php echo $form->labelEx($modelPassword,'old_password'); ?> <?php echo $form->passwordField($modelPassword,'old_password'); ?> <?php echo $form->error($modelPassword,'old_password'); ?> </div>

            <div class="row"> <?php echo $form->labelEx($modelPassword,'new_password'); ?> <?php echo $form->passwordField($modelPassword,'new_password'); ?> <?php echo $form->error($modelPassword,'new_password'); ?> </div>

            <div class="row"> <?php echo $form->labelEx($modelPassword,'repeat_password'); ?> <?php echo $form->passwordField($modelPassword,'repeat_password'); ?> <?php echo $form->error($modelPassword,'repeat_password'); ?> </div>

            <div class="row submit">
            <?php echo CHtml::submitButton('Cambiar Password', ['class' => 'genric-btn primary-border radius']); ?>

            </div>
            <?php $this->endWidget(); ?>
          </div>
                    
				</div>
			</div>
		</div>
	</div>
	<div class="mb-5">
		
	</div>
</div>