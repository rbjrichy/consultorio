<?php
/* @var $this VobservacionpostulanteController */
/* @var $model Vobservacionpostulante */

$this->widget( 'ext.EChosen.EChosen' ); 

$this->breadcrumbs=array(
    'Lista de pacientes registrados',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#vobservacionpostulante-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>


      <?php 

          $criteria = new CDbCriteria();
          //$criteria->condition ='idnumeroconsultorio = 2';
          
          $lista = CHtml::listData(Paciente::model()->findAll($criteria),'id','usuario.nombrecompleto');
              echo CHtml::dropDownList('oidpaciente','descripcion', $lista, array('empty'=>'Seleccione un Paciente', 'class'=>"chzn-select",'style'=>'width:500px;'));
              echo '<br>';
              echo '<br>';
 
      ?>

   <script>
                // creamos un evento onchange para cuando el usuario cambie su seleccion
                // importante:  #combo1 hace referencia al ID indicado arriba con: array('id'=>'combo1')
                //
                $(document).ready(function() 
                {
                  $('#oidpaciente').change();
                });
               $('#oidpaciente').change(function()
                 {
                    var opcionSeleccionada = $(this);                        // el <option> seleccionado
                    var valor = opcionSeleccionada.val(); 

                    if(valor == null || valor == '')
                    {
                        //alert('ingreso');
                        valor = 0;
                    }
                    else
                    {
                        //alert(valor);   
                        $('#consulta').html('<div align="center"><img src="images/loading.gif"/></div>');
                       
                        var action = 'index.php?r=pago/filtrarlista_doctor&idpaciente='+valor;

                        //alert('entro');
                            $('#reportarerror').html("");
                            $.get(action, function(datos) {
                                    $('#consulta').html(datos);        
                            }).error(function(e){ $('#reportarerror').html(e.responseText); });    
                    }             
            });
             
</script>

<div id="consulta">
   
</div>