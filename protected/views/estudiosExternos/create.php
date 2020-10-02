<?php
/* @var $this EstudiosExternosController */

$this->breadcrumbs=array(
	'Estudios Externos'=>array('/estudiosExternos'),
	'Create',
);
?>
<?php 
$model = new EstudiosExternos;
 ?>
<div class="dialogo-ex">
        <?php
        /** codigo para generar el formulario ingresar datos estudiso externos */
        $form = $this->beginWidget('CActiveForm', array(
                'id'                   => 'tbl-ingresarExamExterno-form',
                'action'               => array('estudiosExternos/insertarEstudiosExterno'),
                'htmlOptions'          => ['enctype' => 'multipart/form-data'],
                'enableAjaxValidation' => false,
            ));
        ?>
            <?php
                echo CHtml::hiddenField('paciente_id', $_GET['idpaciente']);
            ?>
            <div class="form-group">
                <label for="nombre-estudio">
                    Nombre Estudio
                    <?php 
                        // echo Yii::app()->createUrl('EstudiosExternos/insertarEstudiosExterno'); 
                    ?>
                </label>
                <input type="text" name="nombre" class="form-control" id="nombre-estudio" />
            </div>
            <div class="form-group">

                <label for="descripcion">
                    Descripción
                </label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" />

            </div>
            <div class="form-group">
            	<?php echo CHtml::activeFileField($model, 'nombre_archivo'); ?>
                <p class="help-block">
                    Archivos de imagene con la extención (.jpg, .png)
                </p>
            </div>
            <?php 
	            echo CHtml::ajaxButton(
			        'Boton de Envio', array('EstudiosExternos/insertarEstudiosExterno'), array(
				            'type'=>'Post',
				    		'beforeSend' => "function(){
				            	$('#estado').addClass('loadingprogreso');
				            }",
					    		'complete' => "function(){
					            $('#estado').removeClass('loadingprogreso');
				            }",
				    		'success' => "function(data){
				                $('#estado').addClass('loadingok');
				                jQuery('#resultado').html(data);
				            }",
					    		'error' => "function(){
					             $('#estado').addClass('loadingerror');             
				            }",
				        )
				);
             ?>

        <?php $this->endWidget();?>
    </div>

    <?php

// echo CHtml::form();

// echo CHtml::telField('nombre');

// echo CHtml::textArea('direccion');

// echo CHtml::ajaxSubmitButton(
//         'Boton de Envio', array('ejemplo5recibe'), array(
//     //'update' => '#resultado',
//     'beforeSend' => "function(){
//             $('#estado').addClass('loadingprogreso');
//             }",
//     'complete' => "function(){
//             $('#estado').removeClass('loadingprogreso');
//             }",
//     'success' => "function(data){
//                 $('#estado').addClass('loadingok');
//                 jQuery('#resultado').html(data);
//             }",
//     'error' => "function(){
//              $('#estado').addClass('loadingerror');             
//             }",
//         )
// );

// echo CHtml::ajaxButton(
//         'Boton de Envio', array('ejemplo5recibe'), array(
//     //'update' => '#resultado',
//             'type'=>'Post',
//     'beforeSend' => "function(){
//             $('#estado').addClass('loadingprogreso');
//             }",
//     'complete' => "function(){
//             $('#estado').removeClass('loadingprogreso');
//             }",
//     'success' => "function(data){
//                 $('#estado').addClass('loadingok');
//                 jQuery('#resultado').html(data);
//             }",
//     'error' => "function(){
//              $('#estado').addClass('loadingerror');             
//             }",
//         )
// );

// echo CHtml::endForm();
?>

<div id="estado" class="estado"></div>

<div id="resultado">Resultado</div>