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
            'numeroconsultorio.doctorasignado',
            'tratamiento',
            'detalle',
            'numpieza',
            'costo',
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
  <a class="genric-btn info radius small" href="<?php echo Yii::app()->createUrl("pago/abonarACuenta", array("id_paciente"=>$datosPaciente->id)) ?>" >Registrar Pagos</a>
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
        'id'                   => 'tbl-ingresartratamiento-form',
        'action'               => array('paciente/insertartratamiento'),
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <?php 
                // var_dump(Numeroconsultorio::model()->findAll());
                echo CHtml::dropDownList('tidnumeroconsultorio', 0, CHtml::listData (Numeroconsultorio::model()->findAll(),'id','doctorasignado')
                    , array('class'=>"form-control single-input-primary"));
                ?>
            </div>
            <div class="form-group">
                <label for="ttratamiento">Tipo de tratamiento</label>
                <?php
                    echo CHtml::hiddenField('tidpaciente', $_GET['idpaciente']);
                    echo CHtml::textField('ttratamiento', '', array('class' => 'form-control single-input-primary'));
                ?>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="tnumpieza">Número de pieza</label>
                    <?php
                        echo CHtml::textField('tnumpieza', '', array('class' => 'form-control single-input-primary'));
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="tcosto">Costo del tratamiento</label>
                    <?php
                        echo CHtml::textField('tcosto', '', array('class' => 'form-control single-input-primary'));
                    ?>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="tdetalle">Obeservaciones / detalles</label>
                <?php
                    echo CHtml::textArea('tdetalle', '', array('class' => 'form-control single-input-primary'));
                ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::Button('Registrar', array('onclick' => "agregarTratamiento();",'class' => 'genric-btn primary-border radius')) ?>
            </div>
            <?php $this->endWidget();?>
        </div>
    </div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<script>
function agregarTratamiento() {
var tratamiento = $('#ttratamiento').val();
var detalle = $('#tdetalle').val();
var idpaciente = $('#tidpaciente').val();
var numpieza = $('#tnumpieza').val();
var costo = $('#tcosto').val();
var idnumeroconsultorio = $('#tidnumeroconsultorio').val();

var mensaje = '';
if(!onlyLettersAndNumbers(tratamiento))
{
mensaje = mensaje + ' tratamiento: Solo se permiten letras y numeros. \n';
}
if(!onlyLettersAndNumbers(detalle))
{
mensaje = mensaje + ' Detalle: Solo se permiten letras y numeros. \n';
}
if(!onlyNumbers(numpieza))
{
mensaje = mensaje + ' Numero Pieza: Solo se permiten numeros. \n';
}
if(!onlyNumbers(costo))
{
mensaje = mensaje + ' Costo: Solo se permiten numeros. \n';
}
if (mensaje != '')
{
alert(mensaje);
}
    else
    {
        jQuery.ajax({
        url: 'index.php?r=paciente/insertartratamiento&tratamiento='+tratamiento
        +'&detalle='+detalle
        +'&numpieza='+numpieza
        +'&idnumeroconsultorio='+idnumeroconsultorio
        +'&costo='+costo
        +'&idpaciente='+idpaciente,
        type: "POST",
        data: {ajaxtratamiento: ""},
            error: function(data){
                console.log(data);
            },
            success: function(data){
                console.log('success');
                console.log(data);
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