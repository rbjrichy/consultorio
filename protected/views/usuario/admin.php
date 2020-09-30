<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
$this->breadcrumbs = array(
    'Usuarios' => array('admin'),
    'Registrar',
);
$this->menu = array(
    array('label' => 'Crear Usuario', 'url' => array('create')),
);
?>
<div class="typography">
    <h1>Registrar Usuarios</h1>
</div>
<a class="genric-btn success radius small" href="index.php?r=usuario/registraradmin" >Crear Usuario</a>
<br>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'           => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => array(
//'id',
        'nombres',
        'apellidopaterno',
        'apellidomaterno',
        'nombreusuario',
//'clave',
        'ci',
//'sexo.descripcion',
        //'ciudad.nombreciudad',
        //'ocupacion.descripcion',
        'numerotelefono',
        'numerocelular',
        'direccion',
        array(
            'name'  => 'fecharegistro',
//'header'=>'Date',
            'value' => 'Yii::app()->utiles->formatearFechaHora($data["fecharegistro"])',
        ),
        'tipousuario.rol',
        array(
            'class'    => 'CButtonColumn',
            'template' => '{update}{delete}',
            'buttons'  => array
            (
            ),
        ),
    ),
));?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'      => 'dialogmensaje',
// additional javascript options for the dialog plugin
    'options' => array(
        'title'    => 'Mensaje',
        'autoOpen' => false,
        'width'    => 700,
        'height'   => 400,
        'modal'    => true,
        'overlay'  => array(
            'backgroundColor' => '#000',
            'opacity'         => '0.1',
        ),
        'position' => array('my' => 'center', 'at' => 'center'),
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
<div id='datosmensaje'>
</div>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>