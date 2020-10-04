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
<div class="typography">
<h1>Reservar Citas</h1>
</div>

<a class="genric-btn success ratius small" href="index.php?r=reserva/create" >Crear Reserva</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reserva-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'paciente.usuario.nombrecompleto',
			'numeroconsultorio.descripcion',
			'horario.descripcion',
			array(
			   'name'=>'fechareserva',
			   'value'=>'Yii::app()->utiles->formatearFecha($data["fechareserva"])',
			),
			'motivo',
			'fechahoraregistro',
			// array(
			//    'name'=>'estadoreserva.descripcion',
			//    'value'=>'$data["estadoreserva"]["descripcion"]',
			// ),
			'estadoreserva.descripcion', 
			array(
				'class'=>'CButtonColumn',
				'template'=>'{cambiarestado}{delete}',   
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
