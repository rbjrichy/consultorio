
<div id='divanamnesis'>
  <div class="typography mt-5">
    <h3>Anamnesis</h3>
  </div>
  <?php
//grid anamnesis
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'           => 'pacienteanamnesis-grid',
        'dataProvider' => $dataProviderAnamnesis,
        'columns'      => array(
            'motivoconsulta',
            array(
                'name'  => 'tratamientomedico',
                'value' => '($data["tratamientomedico"]==0)?"No":"Si"',
            ),
            'nombretratamientomedico',
            'medicamentotratamientomedico',
            'alergias',
            array(
                'name'  => 'diabetes',
                'value' => '($data["diabetes"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'hipertension',
                'value' => '($data["hipertension"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'cardiaco',
                'value' => '($data["cardiaco"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'epilepsia',
                'value' => '($data["epilepsia"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'embarazada',
                'value' => '($data["embarazada"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'gastritis',
                'value' => '($data["gastritis"]==0)?"No":"Si"',
            ),
            'otros',
            array(
                'class'    => 'CButtonColumn',
                //'template'=>'{view}{update}{delete}{examen}',
                'template' => '{update}{delete}',
                'buttons'  => array
                (
                    'update' => array
                    (
                        'label' => 'Actualizar',
                        'url'   => 'Yii::app()->createUrl("paciente/datosanamnesis", array("id"=>$data->id))',
                        'click' => 'function(){ action = $(this).attr("href");
                                      $.get(action, function(datos)
                                      {
                                      $("#datosanamnesis"
                                      ).html(datos);
                                      $("#dialogmodificaranamnesis").dialog("open");
                                      }).error(function(e){ $("#reportarerror").html(e.responseText); });
                                      return false;}',
                    ),
                    'delete' => array
                    (
                        'label' => 'Eliminar',
                        'url'   => 'Yii::app()->createUrl("anamnesis/delete", array("id"=>$data->id))',
                    ),
                ),
            ),
        ),
    ));
    ?>
  <a class="genric-btn success radius small" href="#" onclick="document.getElementById('tbl-ingresaranamnesis-form').reset(); $('#'+'dialoganamnesis').dialog('open');">Nuevo Registro Anamnesis</a>
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogmodificaranamnesis',
// additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Modificar el Registro',
            'autoOpen' => false,
            'width'    => 700,
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
                      }'),
        ),
    ));
    ?>
<div id='datosanamnesis'>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialoganamnesis',
// additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Ingrese los datos de Anamnesis',
            'autoOpen' => false,
            'width'    => 700,
            'height'   => 600,
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
                          }'),
        ),
    ));
    ?>
<?php
$form = $this->beginWidget('CActiveForm', array(
        'id'                   => 'tbl-ingresaranamnesis-form',
        'action'               => array('paciente/insertaranamnesis'),
        'enableAjaxValidation' => false,
    ));
    ?>
<table width="520" class="detail-view">
  <tr class="even" >
    <th>Motivo de la Consulta:</th>
    <td>
      <?php
    echo CHtml::hiddenField('fidpaciente', $_GET['idpaciente']);
    echo CHtml::textField('fmotivoconsulta', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Esta en Tratamiento Medico?:</th>
    <td>
      <?php
      $criteria = new CDbCriteria();
      $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
      echo CHtml::dropDownList('ftratamientomedico', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Cual?:</th>
    <td>
      <?php
echo CHtml::textField('fnombretratamientomedico', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Que Medicamentos Toma Actualmente?:</th>
    <td>
      <?php
echo CHtml::textField('fmedicamentotratamientomedico', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Es alergico (Algodon, Anestesicos, etc):</th>
    <td>
      <?php
echo CHtml::textField('falergias', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Diabetes?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fdiabetes', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Hipertension?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fhipertension', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Cardiaco?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fcardiaco', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Epilepsia?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fepilepsia', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Embarazada?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fembarazada', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Gastritis?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('fgastritis', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Otros:</th>
    <td>
      <?php
echo CHtml::textField('fotros', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>
      <?php 
        echo CHtml::Button('Registrar', array('onclick' => "agregarAnamnesis();")) 
      ?>
    </td>
  </tr>
  <?php $this->endWidget();?>
</table>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<script>
function agregarAnamnesis(){
  var motivoconsulta = $('#fmotivoconsulta').val();
  var tratamientomedico = $('#ftratamientomedico').val();
  var nombretratamientomedico = $('#fnombretratamientomedico').val();
  var medicamentotratamientomedico = $('#fmedicamentotratamientomedico').val();
  var alergias = $('#falergias').val();
  var diabetes = $('#fdiabetes').val();
  var hipertension = $('#fhipertension').val();
  var cardiaco = $('#fcardiaco').val();
  var epilepsia = $('#fepilepsia').val();
  var embarazada = $('#fembarazada').val();
  var gastritis = $('#fgastritis').val();
  var otros = $('#fotros').val();
  var idpaciente = $('#fidpaciente').val();
  var mensaje = '';
  if(!onlyLettersAndNumbers(motivoconsulta))
  {
    mensaje = mensaje + ' Motivo Consulta: Solo se permiten letras y numeros. \n';
  }
  if(isEmpty(tratamientomedico))
  {
    mensaje = mensaje + ' Tratamiento Medico: Usted debe seleccionar una opción. \n';
  }
  if(!onlyLettersAndNumbers(nombretratamientomedico))
  {
    mensaje = mensaje + ' Nombre Tratamiento Medico: Solo se permiten letras y numeros. \n';
  }
  if (!onlyLettersAndNumbers(medicamentotratamientomedico))
  {
   mensaje = mensaje + ' Medicamento Tratamiento Medico: Solo se permiten letras y numeros. \n';
  }
  if (!onlyLettersAndNumbers(alergias))
  {
    mensaje = mensaje + ' Alergias: Solo se permiten letras y numeros. \n';
  }
  if(isEmpty(diabetes))
  {
  mensaje = mensaje + ' Diabetes: Usted debe seleccionar una opción. \n';
  }
  if(isEmpty(hipertension))
  {
  mensaje = mensaje + ' Hipertension: Usted debe seleccionar una opción. \n';
  }
  if(isEmpty(cardiaco))
  {
  mensaje = mensaje + ' Cardiaco: Usted debe seleccionar una opción. \n';
  }
  if(isEmpty(epilepsia))
  {
  mensaje = mensaje + ' Epilepsia: Usted debe seleccionar una opción. \n';
  }
  if(isEmpty(embarazada))
  {
  mensaje = mensaje + ' Embarazada: Usted debe seleccionar una opción. \n';
  }
  if(isEmpty(gastritis))
  {
  mensaje = mensaje + ' Gastritis: Usted debe seleccionar una opción. \n';
  }
  if (!onlyLettersAndNumbers(otros))
  {
  mensaje = mensaje + ' Otros: Solo se permiten letras y numeros. \n';
  }
  if (mensaje != '')
  {
  alert(mensaje);
  }
  else
  {
  jQuery.ajax({
    // The url must be appropriate for your configuration;
    // this works with the default config of 1.1.11
    url: 'index.php?r=paciente/insertaranamnesis&motivoconsulta='+motivoconsulta
    +'&tratamientomedico='+tratamientomedico
    +'&nombretratamientomedico='+nombretratamientomedico
    +'&medicamentotratamientomedico='+medicamentotratamientomedico
    +'&alergias='+alergias
    +'&diabetes='+diabetes
    +'&hipertension='+hipertension
    +'&cardiaco='+cardiaco
    +'&epilepsia='+epilepsia
    +'&embarazada='+embarazada
    +'&gastritis='+gastritis
    +'&otros='+otros
    +'&idpaciente='+idpaciente,
    type: "POST",
    data: {ajaxAnamnesis: ""},
      error: function(xhr,tStatus,e){
        if(!xhr){
          alert(" We have an error ");
          alert(tStatus+"   "+e.message);
        }else{
          alert("else: "+e.message); // the great unknown
        }
      },
      success: function(resp){
        $('#' + 'pacienteanamnesis-grid').yiiGridView('update');
        $('#' + 'dialoganamnesis').fadeOut( "slow", function() {
        // Animation complete.
        $('#' + 'dialoganamnesis').dialog("close");
        });
      }
    }); 
  }
}
</script>