<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'List Paciente', 'url'=>array('index')),
	array('label'=>'Create Paciente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paciente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="typography">
<h1>Registrar Pacientes</h1>
</div>

<a class="genric-btn success radius small"  href="index.php?r=paciente/create" >Activar Paciente</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
    
	//'usuario.nombres',
    //'usuario.apellidopaterno',
    //'usuario.direccion',
    //'usuario.numerocelular',
    
		//'fechanacimiento',
        array(
               'name'=>'nombres',

               'value'=>'$data->usuario->nombres',
            ),
        array(
               'name'=>'apellidopaterno',

               'value'=>'$data->usuario->apellidopaterno',
            ),
        array(
               'name'=>'direccion',

               'value'=>'$data->usuario->direccion',
            ),
        array(
               'name'=>'numerocelular',

               'value'=>'$data->usuario->numerocelular',
            ),
		array(
                'name'=>'fechanacimiento',
                //'header'=>'Date',
                'value'=>'Yii::app()->utiles->formatearFecha($data["fechanacimiento"])'
            ),
		'edad',
		
		
		// array(
  //               'name'=>'fechahoraregistro',
  //               //'header'=>'Date',
  //               'value'=>'Yii::app()->utiles->formatearFechaHora($data["fechahoraregistro"])'
  //           ),
		'observaciones',
 
   
   
    //if (Yii::app()->session['idtipousuario']=='1')
	//	(
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',   
	                       'buttons'=>array
	                      (
	                      	
	                      ),
		),//),
	),
)); ?>

  

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dialogobservaciones',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Observaciones',
        'autoOpen'=>false,
        'width'=>700,
         'height'=>400,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.1'
        ),
        'position'=>array('my'=>'center','at'=>'center'), 
        //'position'=>array('my'=>'center','at'=>'center'),
        'show'=>array(
            'effect'=>'bounce',
            'duration'=>400,
        ),
        'hide'=>array(
            'effect'=>'explode',
            'duration'=>500,
        ),

        'buttons' => array(
        'Cerrar'=>'js:function(){
         $(this).dialog("close")
        }',)
    ),
));
?> 

<div id='datosobservaciones'>
    
</div> 

<?php 
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
