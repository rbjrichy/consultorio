<div id='divExamExterno'>
    <div class="typography mt-5">
        <h3>Estudios Externos</h3>
    </div>
    <?php
//grid tratamiento
$this->widget('zii.widgets.grid.CGridView', array(
    'id'           => 'pacienteExamExternos-grid',
    'dataProvider' => $dataProviderEstExternos,
    'columns'      => array(
        'nombre',
        'descripcion',
        array(
            'name'  => 'Fecha',
            'value' => 'Yii::app()->utiles->formatearFecha($data["create_at"])',
        ),
        array(
            'class'    => 'CButtonColumn',
            'template' => '{link}',
            'buttons'  => array
            (
                'link' => array
                (
                    'label'=>'Ver Imagen',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/verpdf.png',
                    'url'=>'Yii::app()->createUrl("estudiosExternos/verImagen", array("nameImg"=>$data->nombre_archivo))',
                    'click'=>'function(){ 
                                action = $(this).attr("href"); 
                                $.get(action, function(datos) 
                                {
                                    $("#datosImg").html(datos);
                                    $("#dialogoVerImagen").dialog("open");
                                }).error(function(e){ $("#reportarerror").html(e.responseText); });
                               return false;
                            }',
                ),
            ),
        ),
        array(
            'class'    => 'CButtonColumn',
            'template' => '{delete}',
            'buttons'  => array
            (
                'delete' => array
                (
                    'label' => 'Eliminar',
                    'url'   => 'Yii::app()->createUrl("EstudiosExternos/delete", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
    <a class="genric-btn success radius small" href="#" onclick="document.getElementById('tbl-ingresarExamExterno-form').reset(); $('#'+'dialogExamExterno').dialog('open');">Nuevo Estudio Externo</a>

    <?php 

    ?>
</div>

<!-- DIAGLO PARA VER IMAGNES -->

<?php
/** dialogo para actualizar datos de la grilla Estudios Externos*/
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'      => 'dialogoVerImagen',
// additional javascript options for the dialog plugin
    'options' => array(
        'title'    => 'Ver imagen del examen exteno realizado',
        'autoOpen' => false,
        'width'    => 800,
        'height'   => 600,
        'modal'    => true,
        'overlay'  => array(
            'backgroundColor' => '#000',
            'opacity'         => '0.1',
        ),
        'position' => array('my' => 'top', 'at' => 'top'),
        'show'     => array(
            'effect'   => 'bounce',
            'duration' => 400,
        ),
        'hide'     => array(
            'effect'   => 'explode',
            'duration' => 500,
        ),
        'buttons'  => array(
            'Cerrar' => 'js:function(){
                            $(this).dialog("close")
                            }', ),
    ),
));
?>
<div id='datosImg'>

</div>
<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<!-- FIN DIALOGO PARA VER IMAGENES -->



    <?php
    /*** Codigo para muestra dialogo para ingresar un nuevo registro Estudios Externos */
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogExamExterno',
    // additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Registrar Examen Externo',
            'autoOpen' => false,
            'width'    => 700,
            'height'   => 500,
            'modal'    => true,
            'overlay'  => array(
                'backgroundColor' => '#000',
                'opacity'         => '0.1',
            ),
            'position' => array('my' => 'top', 'at' => 'top'),
    //'position'=>array('my'=>'center','at'=>'center'),
            'show'     => array(
                'effect'   => 'bounce',
                'duration' => 400,
            ),
            'hide'     => array(
                'effect'   => 'explode',
                'duration' => 500,
            ),
            'buttons'  => array(
                'Cerrar' => 'js:function(){
                        $(this).dialog("close")
                        }', ),
        ),
    ));
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
            <div class="form-group">
                <button type="submit">Enviar</button>
            </div>
        <?php $this->endWidget();?>
    </div>



<?php 
//cierra diagolo ExamExterno

    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
