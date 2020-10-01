<div class="typography">
  <h1>Historia Clinica</h1>
</div>
<?php
if (Yii::app()->user->isGuest) {
    $this->redirect('index.php');
} else {
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/validacion.js');
    $idpaciente = $_GET['idpaciente'];
    ?>

<div class="row ml-1">
    <div class="typography">
      <h3>Datos Paciente</h3>
    </div>
</div>
<div class="row ml-1">
  <div class="col-sm-6">
    <div class="row mb-2">
            <div class="col-md-4">
              <strong>Nombre: </strong>
            </div>
            <div class="col-md-8">
              <span>Juan Jose Perez</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>CI: </strong>
            </div>
            <div class="col-md-8">
              <span>5471258</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Sexo: </strong>
            </div>
            <div class="col-md-8">
              <span>Maculino</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Ocupación: </strong>
            </div>
            <div class="col-md-8">
              <span>Independiente</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Ciudad: </strong>
            </div>
            <div class="col-md-8">
              <span>Sucre</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Num. Teléfono: </strong>
            </div>
            <div class="col-md-8">
              <span></span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Celular: </strong>
            </div>
            <div class="col-md-8">
              <span>78647852</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>email: </strong>
            </div>
            <div class="col-md-8">
              <span>juanperz@gamil.com</span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Dirección: </strong>
            </div>
            <div class="col-md-8">
              <span>Calle J. Prudencio Bustillos S/N</span>
            </div>
          </div>
  </div>
  <div class="col-sm-6">
    <div class="text-center">
      <img alt="Vista previa de la imagen de Bootstrap" src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatar/perfil-avatar-hombre-icono-redondo.jpg" class="img-thumbnail" />
    </div>
  </div>
</div>

<!-- INICIO ANAMNESIS -->
</br>
<div id='divanamnesis'>
  <div class="typography">
    <h3>Anamnesis</h3>
  </div>
  <?php
//grid anamnesis
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'           => 'pacienteanamnesis-grid',
        'dataProvider' => $dataProviderAnamnesis,
        'columns'      => array(
            //'id',
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
      <?php echo CHtml::Button('Registrar', array('onclick' => "agregarAnamnesis();")) ?>
    </td>
  </tr>
  <?php $this->endWidget();?>
</table>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<script>
function agregarAnamnesis() {
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
<!-- HASTA AQUI ANAMNESIS -->
<!-- INICIO ANTECEDENTES DENTALES -->
</br>
</br>
<div id='divantecedentesdentales'>
  <div class="typography">
    <h3>Diagnostico</h3>
  </div>
  <?php
//grid antecedentesdentales
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'           => 'pacienteantecedentesdentales-grid',
        'dataProvider' => $dataProviderAntecedentesDentales,
        'columns'      => array(
            //'id',
            'numerocepilladas',
            array(
                'name'  => 'hilodental',
                'value' => '($data["hilodental"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'enjuaguebucal',
                'value' => '($data["enjuaguebucal"]==0)?"No":"Si"',
            ),
            array(
                'name'  => 'fuma',
                'value' => '($data["fuma"]==0)?"No":"Si"',
            ),
            'numerofumadas',
            array(
                'name'  => 'tienedolor',
                'value' => '($data["tienedolor"]==0)?"No":"Si"',
            ),
            'tipomotivodolor.descripcion',
            'piezasdentales',
            array(
                'class'    => 'CButtonColumn',
                //'template'=>'{view}{update}{delete}{examen}',
                'template' => '{update}{delete}',
                'buttons'  => array
                (
                    'update' => array
                    (
                        'label' => 'Actualizar',
                        'url'   => 'Yii::app()->createUrl("paciente/datosantecedentesdentales", array("id"=>$data->id))',
                        'click' => 'function(){ action = $(this).attr("href");
  $.get(action, function(datos)
  {
  $("#datosantecedentesdentales"
  ).html(datos);
  $("#dialogmodificarantecedentesdentales").dialog("open");
  }).error(function(e){ $("#reportarerror").html(e.responseText); });
  return false;}',
                    ),
                    'delete' => array
                    (
                        'label' => 'Eliminar',
                        'url'   => 'Yii::app()->createUrl("antecedentesdentales/delete", array("id"=>$data->id))',
                    ),
                ),
            ),
        ),
    ));
    ?>
  <a class="genric-btn success radius small" href="#" onclick="document.getElementById('tbl-ingresarantecedentesdentales-form').reset(); $('#'+'dialogantecedentesdentales').dialog('open');">Nuevo Registro Antecedentes Dentales</a>
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogmodificarantecedentesdentales',
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
<div id='datosantecedentesdentales'>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
    ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogantecedentesdentales',
// additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Ingrese los datos de Antecedentes Dentales',
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
        'id'                   => 'tbl-ingresarantecedentesdentales-form',
        'action'               => array('paciente/insertarantecedentesdentales'),
        'enableAjaxValidation' => false,
    ));
    ?>
<table width="520" class="detail-view">
  <tr class="even" >
    <th>Cuantas veces al dia se cepilla los dientes?:</th>
    <td>
      <?php
echo CHtml::hiddenField('aidpaciente', $_GET['idpaciente']);
    echo CHtml::textField('anumerocepilladas', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Usa Hilo Dental?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('ahilodental', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Usa Enjuague Bucal?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('aenjuaguebucal', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Fuma?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('afuma', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Cuantas veces al dia?:</th>
    <td>
      <?php
echo CHtml::textField('anumerofumadas', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Actualmente presenta dolor o molestia en alguna pieza dental?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Opciones::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('atienedolor', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Cuando aumenta el dolor?:</th>
    <td>
      <?php
$criteria = new CDbCriteria();
    $lista    = CHtml::listData(Tipomotivodolor::model()->findAll($criteria), 'id', 'descripcion');
    echo CHtml::dropDownList('aidtipomotivodolor', 'descripcion', $lista, array('empty' => 'Seleccione', 'class' => "chzn-select", 'style' => 'width:350px;'));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Piezas Dentales:</th>
    <td>
      <?php
echo CHtml::textField('apiezasdentales', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>
      <?php echo CHtml::Button('Registrar', array('onclick' => "agregarAntecedentesDentales();")) ?>
    </td>
  </tr>
  <?php $this->endWidget();?>
</table>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<script>
function agregarAntecedentesDentales() {
var numerocepilladas = $('#anumerocepilladas').val();
var hilodental = $('#ahilodental').val();
var enjuaguebucal = $('#aenjuaguebucal').val();
var fuma = $('#afuma').val();
var numerofumadas = $('#anumerofumadas').val();
var tienedolor = $('#atienedolor').val();
var idtipomotivodolor = $('#aidtipomotivodolor').val();
var piezasdentales = $('#apiezasdentales').val();
var idpaciente = $('#aidpaciente').val();
var mensaje = '';
if(!onlyNumbers(numerocepilladas))
{
mensaje = mensaje + ' Numero Cepilladas: Solo se permiten letras y numeros. \n';
}
if(isEmpty(hilodental))
{
mensaje = mensaje + ' Hilo Dental: Usted debe seleccionar una opción. \n';
}
if(isEmpty(enjuaguebucal))
{
mensaje = mensaje + ' Enjuague Bucal: Usted debe seleccionar una opción. \n';
}
if (isEmpty(fuma))
{
mensaje = mensaje + ' Fuma: Solo se permiten letras y numeros. \n';
}
if(!onlyNumbers(numerofumadas))
{
mensaje = mensaje + ' Numero Fumadas: Solo se permiten letras y numeros. \n';
}
if(isEmpty(tienedolor))
{
mensaje = mensaje + ' Tiene Dolor: Usted debe seleccionar una opción. \n';
}
if(isEmpty(idtipomotivodolor))
{
mensaje = mensaje + ' Motivo Dolor: Usted debe seleccionar una opción. \n';
}
if(!onlyLettersAndNumbers(piezasdentales))
{
mensaje = mensaje + ' Piezas Dentales: Solo se permiten letras y numeros. \n';
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
url: 'index.php?r=paciente/insertarantecedentesdentales&numerocepilladas='+numerocepilladas
+'&hilodental='+hilodental
+'&enjuaguebucal='+enjuaguebucal
+'&fuma='+fuma
+'&numerofumadas='+numerofumadas
+'&tienedolor='+tienedolor
+'&idtipomotivodolor='+idtipomotivodolor
+'&piezasdentales='+piezasdentales
+'&idpaciente='+idpaciente,
type: "POST",
data: {ajaxAntecedentesDentales: ""},
error: function(xhr,tStatus,e){
if(!xhr){
alert(" We have an error ");
alert(tStatus+"   "+e.message);
}else{
alert("else: "+e.message); // the great unknown
}
},
success: function(resp){
$('#' + 'pacienteantecedentesdentales-grid').yiiGridView('update');
$('#' + 'dialogantecedentesdentales').fadeOut( "slow", function() {
// Animation complete.
$('#' + 'dialogantecedentesdentales').dialog("close");
});
}
});
}
}
</script>
<!-- HASTA AQUI ANTECEDENTES DENTALES -->
<!-- INICIO Tratamiento -->
</br>
</br>
<div id='divtratamiento'>
  <div class="typography">
    <h3>Tratamiento</h3>
  </div>
  <?php
//grid tratamiento
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'           => 'pacientetratamiento-grid',
        'dataProvider' => $dataProviderTratamiento,
        'columns'      => array(
            'descripcion',
            'detalle',
            array(
                'class'    => 'CButtonColumn',
                'template' => '{update}{delete}',
                'buttons'  => array
                (
                    'update' => array
                    (
                        'label' => 'Actualizar',
                        'url'   => 'Yii::app()->createUrl("paciente/datostratamiento", array("id"=>$data->id))',
                        'click' => 'function(){ action = $(this).attr("href");
  $.get(action, function(datos)
  {
  $("#datostratamiento"
  ).html(datos);
  $("#dialogmodificartratamiento").dialog("open");
  }).error(function(e){ $("#reportarerror").html(e.responseText); });
  return false;}',
                    ),
                    'delete' => array
                    (
                        'label' => 'Eliminar',
                        'url'   => 'Yii::app()->createUrl("tratamiento/delete", array("id"=>$data->id))',
                    ),
                ),
            ),
        ),
    ));
    ?>
  <a class="genric-btn success radius small" href="#" onclick="document.getElementById('tbl-ingresartratamiento-form').reset(); $('#'+'dialogtratamiento').dialog('open');">Nuevo Registro Tratamiento</a>
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogmodificartratamiento',
// additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Modificar el Registro',
            'autoOpen' => false,
            'width'    => 700,
            'height'   => 400,
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
<div id='datostratamiento'>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
    ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id'      => 'dialogtratamiento',
// additional javascript options for the dialog plugin
        'options' => array(
            'title'    => 'Ingrese los datos del Tratamiento',
            'autoOpen' => false,
            'width'    => 700,
            'height'   => 400,
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
        'id'                   => 'tbl-ingresartratamiento-form',
        'action'               => array('paciente/insertartratamiento'),
        'enableAjaxValidation' => false,
    ));
    ?>
<table width="520" class="detail-view">
  <tr class="even" >
    <th>Descripcion:</th>
    <td>
      <?php
echo CHtml::hiddenField('tidpaciente', $_GET['idpaciente']);
    echo CHtml::textField('tdescripcion', 'Tratamiento Nro ', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr class="even" >
    <th>Detalle:</th>
    <td>
      <?php
echo CHtml::textArea('tdetalle', '', array('size' => 50));
    ?>
    </td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>
      <?php echo CHtml::Button('Registrar', array('onclick' => "agregarTratamiento();")) ?>
    </td>
  </tr>
  <?php $this->endWidget();?>
</table>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<script>
function agregarTratamiento() {
var descripcion = $('#tdescripcion').val();
var detalle = $('#tdetalle').val();
var idpaciente = $('#tidpaciente').val();
var mensaje = '';
if(!onlyLettersAndNumbers(descripcion))
{
mensaje = mensaje + ' Descripcion: Solo se permiten letras y numeros. \n';
}
if(!onlyLettersAndNumbers(detalle))
{
mensaje = mensaje + ' Detalle: Solo se permiten letras y numeros. \n';
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
url: 'index.php?r=paciente/insertartratamiento&descripcion='+descripcion
+'&detalle='+detalle
+'&idpaciente='+idpaciente,
type: "POST",
data: {ajaxtratamiento: ""},
error: function(xhr,tStatus,e){
if(!xhr){
alert(" We have an error ");
alert(tStatus+"   "+e.message);
}else{
alert("else: "+e.message); // the great unknown
}
},
success: function(resp){
$('#' + 'pacientetratamiento-grid').yiiGridView('update');
$('#' + 'dialogtratamiento').fadeOut( "slow", function() {
// Animation complete.
$('#' + 'dialogtratamiento').dialog("close");
});
}
});
}
}
</script>
<!-- HASTA AQUI TRATAMIENTO -->
<?php
} // si no es invitado
?>