<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'consulta-form',
    'action'=>array('informes/reportes'),             
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    
    <?php $this->widget( 'ext.EChosen.EChosen' ); ?>

    <div class="form-actions">    
    <table>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'idtiporeporte'); ?>
                <?php  

                
                echo $form->dropDownList($model, 'idtiporeporte', 
                    array(
                        '1'=>'Paciente - Pagos Realizados',
                        '2'=>'Paciente - Reporte de Pagos',
                        '3'=>'Comercial - Recaudaciones por Fechas',
                        '5'=>'Comercial - Lista de Pacientes por monto adeudado',
                        '6'=>'Comercial - Lista de Pacientes y sus pagos',
                        '7'=>'Comercial - Lista de Pacientes',
                        '4'=>'Grafico - Recaudaciones por Paciente',

                        ),
                        array('class'=>'chzn-select','id'=>'idtiporeporte','style'=>'width:300px;')); 
                
                 ?>

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
                                           
                        if (valor == '1')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideDown('fast');  
                            
                        }
                        else if(valor == '2')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideDown('fast');  
                            
                        }
                        else if (valor == '3')
                        {
                            $('#fechas').slideDown('fast');  
                            $('#paciente').slideUp('fast');  
                            
                        }
                        else if (valor == '4')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideUp('fast');  
                            
                        }
                        else if (valor == '5')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideUp('fast');  
                            
                        }
                        else if (valor == '6')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideUp('fast');  
                            
                        }
                        else if (valor == '7')
                        {
                            $('#fechas').slideUp('fast');  
                            $('#paciente').slideUp('fast');  
                         
                        }
                            
                    });
                </script>
            </td>

            <td>
                <?php echo $form->labelEx($model,'idformatoreporte'); ?>
                <?php  echo $form->dropDownList($model, 'idformatoreporte', 
                    array('1'=>'HTML', 
                        '2'=>'PDF',
                        '3'=>'EXCEL',
                        //'4'=>'GRAFICO',
                        ) ,array('class'=>'chzn-select','style'=>'width:200px;')); ?>
            </td>
            
            <td>
                <?php echo $form->labelEx($model,'titulo'); ?>
                <?php echo $form->textField($model,'titulo',array('size'=>30,'maxlength'=>100)); ?>
            </td>
            
            
            
        </tr>

        <tr id="fechas">
            <td>
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
            </td>
            <td>
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
            </td>
        </tr>
    
        <tr id="paciente">
            <td>
                <?php echo $form->labelEx($model,'idpaciente'); ?>
                <?php  

                    $criteria = new CDbCriteria();
                    $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');

                    $static = array(
                        10000 => 'Todos los Pacientes',
                    );

                    echo $form->dropDownList($model, 'idpaciente', $lista + $static ,array('class'=>'chzn-select','style'=>'width:300px;')); ?>
            </td>
        </tr>
        
        <tr>
            <td>
                
                    <?php echo CHtml::submitButton('Generar',array(
                        'id'=>'btnconsulta',
                        'name'=>'btnconsulta',
                        'class' => 'genric-btn primary-border radius small'
                        )); 
                    ?>

                    
                
            </td>
        </tr>
    </table>
    </div>
    <div class="mb-5 pb-5">
        
    </div>
    <?php 

    $this->endWidget();

     ?>

<script>
        // creamos un evento onchange para cuando el usuario cambie su seleccion
        // importante:  #combo1 hace referencia al ID indicado arriba con: array('id'=>'combo1')
        //
        $('#btnconsulta').click(function()
        {
            //$('#consulta').html('<div align="center"><img src="images/loading.gif"/></div>');
            $('#consulta').html('<div class="progress progress-success progress-striped active" style="margin-bottom: 9px;"><div class="bar" style="width: 100%"></div>');
                        
            /* 
            var action = 'index.php?r=consulta/buscarexpedientesirej';

            $('#reportarerror').html("");
            $.get(action, function(datos) 
            {
                $('#consulta').html(datos);        
            }).error(function(e){ $('#reportarerror').html(e.responseText); });
            */    
        });
        ;
    
</script> 
<div id="consulta">
   
</div>

