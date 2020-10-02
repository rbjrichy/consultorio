<div id='divantecedentesdentales'>
  <div class="typography mt-5">
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