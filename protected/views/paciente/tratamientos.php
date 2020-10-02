<div id='divtratamiento'>
  <div class="typography mt-5">
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