<?php
/* @var $this VobservacionpostulanteController */
/* @var $model Vobservacionpostulante */
$this->widget('ext.EChosen.EChosen');
$this->breadcrumbs = array(
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
$lista    = CHtml::listData(Paciente::model()->findAll($criteria), 'id', 'usuario.nombrecompleto');
?>
<div class="typography mb-5">
  <h1>Detalle de Pagos del Paciente</h1>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <?php 
      echo CHtml::dropDownList('oidpaciente', 'descripcion', $lista, array('empty' => 'Seleccione un Paciente', 'class' => "form-control single-input-primary"));
      ?>
    </div>
  </div>
</div>
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
  $('#consulta').html('<div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif"/></div>');
  var action = 'index.php?r=pago/filtrarlista&idpaciente='+valor;
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
