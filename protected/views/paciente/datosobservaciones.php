<?php
  
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/validacion.js');

  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/sweetalert.min.js');
  

if (Yii::app()->request->isAjaxRequest)
{
  Yii::app()->clientscript->scriptMap['jquery.js'] = false;
  Yii::app()->clientscript->scriptMap['jquery-ui.min.js'] = false;
  Yii::app()->clientscript->scriptMap['jquery.yiigridview.js'] = false;

  Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
}

  $form=$this->beginWidget('CActiveForm', array(
    'id'=>'tbl-enviarmensaje-form',
        'action'=>array('grupointegrantes/mensaje'),             
        'enableAjaxValidation'=>false,
    )); 

  ?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl.'/css/sweetalert.css' ?>">
 
<table width="520" class="detail-view">  

<tr class="even" >   
                
     <th>Contenido:</th>  
     <td>
      <?php 
        echo CHtml::hiddenField('emidpaciente',$idpaciente);
        echo CHtml::textArea('emobservaciones','',array('size'=>40)); 
        ?>        
    </td>
</tr>  

<tr><th>&nbsp;</th>
    <td>
    
        <?php echo CHtml::Button('Enviar', array('onclick'=>"EnviarObservaciones();")) ?>
    </td>
</tr>
</DIV>
    <?php $this->endWidget(); ?>
</table>  
 

<script>

        function EnviarObservaciones() {
                
                var idpaciente = $('#emidpaciente').val();

                //var observaciones = $('#emobservaciones').val().toUpperCase();
                var observaciones = $('#emobservaciones').val();

                var mensaje = '';

                
                if(!onlyLettersAndNumbers(observaciones))
                {
                    mensaje = mensaje + ' Observación: Sólo se permiten letras y numeros. \n';
                }
                
                if (mensaje != '')
                {
                    //alert(mensaje);

                    swal("Oops...", mensaje, "error");

                }
                else
                {
                    swal({
                      title: "Está seguro de guardar?",
                      text: "Usted registrara  una observacion",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Si, Registrar!",
                      cancelButtonText: "Cancelar",
                      closeOnConfirm: true,
                      html: false
                    }, function(){
                      
                        jQuery.ajax({
                    // The url must be appropriate for your configuration;
                    // this works with the default config of 1.1.11
                    url: 'index.php?r=paciente/observaciones&observaciones='+observaciones
                    +'&idpaciente='+idpaciente,

                    type: "POST",
                    data: {ajaxObservaciones: ""},  
                    error: function(xhr,tStatus,e){
                        if(!xhr){
                            alert(" We have an error ");
                            alert(tStatus+"   "+e.message);
                        }else{
                            alert("else: "+e.message); // the great unknown
                        }
                        },
                    success: function(resp){
                            //nextThingToDo(resp);  // deal with data returned
                            //alert('Registro realizado.');
                            //$("#results").html(resp);
                            // refresh your grid
         
                                    
                            $('#' + 'paciente-grid').yiiGridView('update');

                            //$('#' + 'solicitud-grid').yiiGridView('update');

                            $('#' + 'dialogobservaciones').fadeOut( "slow", function() {
                                // Animation complete.
                                $('#' + 'dialogobservaciones').dialog("close");
                              });
                        }
                    });
                      
                    });

                    
                }

                
        }
</script>