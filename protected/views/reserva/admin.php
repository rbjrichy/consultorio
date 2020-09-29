<?php
/* @var $this ReservaController */
/* @var $model Reserva */

$this->breadcrumbs=array(
	'Reservas'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'List Reserva', 'url'=>array('index')),
	array('label'=>'Create Reserva', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reserva-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Reservar Citas</h1>

<a href="index.php?r=reserva/create" ><font  color = 'blue'>Crear Reserva</font></a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reserva-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
array(

           'name'=>'nombrecompleto',

           'value'=>'$data->paciente->usuario->nombrecompleto',
           ),

       
		array(
                'name'=>'fechareserva',
                'value'=>'Yii::app()->utiles->formatearFecha($data["fechareserva"])'
            ),

      array(

       'name'=>'estadoreserva',

       'value'=>'$data->estadoreserva->descripcion',

    ),



		//'id',
		//'paciente.usuario.nombrecompleto',
		//'numeroconsultorio.descripcion',
		array(
                'name'=>'fechareserva',
                'value'=>'Yii::app()->utiles->formatearFecha($data["fechareserva"])'
            ),
		
		
		//'horario.descripcion',
		'motivo',
		//'estadoreserva.descripcion', 
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}{cambiarestado}',   
	                       'buttons'=>array
	                      (

	                      	'cambiarestado'=> array
                             (
                              'label'=>'Cambiar Estado',
                              'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
                              //'visible'=>'$data->docformatocarta != ""',
                              'url'=>'Yii::app()->createUrl("reserva/updateestado", array("id"=>$data->id))',                                
                             ),
	                      ),
		),
	),
)); ?>
