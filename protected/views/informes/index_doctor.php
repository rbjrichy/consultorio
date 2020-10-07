<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'consulta-form',
    'action'=>array('informes/reportes_doctor'),             
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>
    
    <?php 
        //$this->widget( 'ext.EChosen.EChosen' ); 
    ?>

    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="form-group">
                <?php echo $form->labelEx($model,'idtiporeporte'); ?>
                
                <?php  
                    echo $form->dropDownList($model, 'idtiporeporte', 
                    array(
                        '1'=>'Paciente - Pagos Realizados',
                        '2'=>'Paciente - Reporte de Pagos',
                        '3'=>'Comercial - Recaudaciones por Fechas',
                        '5'=>'Comercial - Lista de Pacientes por monto adeudado',
                        '6'=>'Comercial - Lista de Pacientes y sus pagos',
                        // '4'=>'Grafico - Recaudaciones por Paciente',
                        ),
                        array('class'=>'form-control','id'=>'idtiporeporte')); 
                 ?>
            </div>
            <div class="row">
                    <div class="col-sm-3 pl-0">
                        <!-- <div class="form-group"> -->
                            <?php echo $form->labelEx($model,'idformatoreporte'); ?>
                            <?php  echo $form->dropDownList($model, 'idformatoreporte', 
                                    array(
                                        // '1'=>'HTML', 
                                        '2'=>'PDF',
                                        '3'=>'EXCEL',
                                        //'4'=>'GRAFICO', 
                                        ),
                                    array('class'=>'form-control')); ?>
                        <!-- </div> -->
                    </div>
                    <div class="col-sm-9 pr-0">
                        <!-- <div class="form-group"> -->
                            <?php echo $form->labelEx($model,'titulo'); ?>
                             <?php echo $form->textField($model,'titulo',array('class'=>'form-control')); ?>
                        <!-- </div> -->
                    </div> 
            </div>
            <div class="form-group" id="paciente">
                <?php echo $form->labelEx($model,'idpaciente'); ?>
                <?php  
                    $criteria = new CDbCriteria();
                    $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');

                    $static = array(
                        10000 => 'Todos los Pacientes',
                    );
                    echo $form->dropDownList($model, 'idpaciente',[0=>'Seleccione un Paciente']+ $lista + $static ,array('class'=>'form-control')); 
                ?>
            </div>
            <div class="row" id="fechas">
                <div class="col-sm-6 pl-0 pr-0">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'fechainicio'); ?>
                        <?php    
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'fechainicio',
                                'name' => 'fechainicio',
                                'value'=>'2017-01-01',
                                'htmlOptions' => array(
                                'size' => '10',         // textField size
                                'maxlength' => '10',    // textField maxlength
                                'class' => 'form-control',
                                'autocomplete' => 'off',
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
                </div>
                <div class="col-sm-6 pl-0 pr-0">
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'fechafin'); ?>
                        <?php 
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'fechafin',
                                'name' => 'fechafin',
                                'value'=>'2017-01-01',
                                'htmlOptions' => array(
                                'size' => '10',         // textField size
                                'maxlength' => '10',    // textField maxlength
                                'class' => 'form-control',
                                'autocomplete' => 'off',
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
                </div>
            </div>
            <div class="form-group">
                <?php echo CHtml::submitButton('Generar',array(
                        'id'=>'btnconsulta',
                        'name'=>'btnconsulta',
                        'class' => 'genric-btn primary-border radius',
                        "formtarget"=>"_blank",
                        )); 
                ?>
            </div>
        </div>
        
    </div>
    <div class="form-actions">    
    
    </div>
    <?php $this->endWidget(); ?>

<script>
    $(document).ready(function() 
    {
        $('#fechas').slideUp('fast');  
        $('#paciente').slideUp('fast');  
        $('#idtiporeporte').change();
    });

    $('#idtiporeporte').change(function()
    {
        var opcionSeleccionada = $(this);
        var valor = opcionSeleccionada.val(); 
        $('#Informe_titulo').val($('#idtiporeporte option:selected').text());
        if (valor == '1')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideDown('fast'); 
            $('#Informe_idpaciente').val('0'); 
            
        }
        else if(valor == '2')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideDown('fast');  
            $('#Informe_idpaciente').val('0');
        }
        else if (valor == '3')
        {
            $('#fechas').slideDown('fast');  
            $('#paciente').slideUp('fast');  
            $('#Informe_idpaciente').val('0');
        }
        else if (valor == '4')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideUp('fast');  
            $('#Informe_idpaciente').val('0');
        }
        else if (valor == '5')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideUp('fast');  
            $('#Informe_idpaciente').val('0');
        }
        else if (valor == '6')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideUp('fast');  
            $('#Informe_idpaciente').val('0');
        }
        else if (valor == '7')
        {
            $('#fechas').slideUp('fast');  
            $('#paciente').slideUp('fast');  
            $('#Informe_idpaciente').val('0');
        }
            
    });
</script>
 

