<?php
/* @var $this PagoController */
/* @var $model Pago */

$this->breadcrumbs=array(
	'Pagos'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'List Pago', 'url'=>array('index')),
	array('label'=>'Create Pago', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pago-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="typography">
	<h1>Registrar Pagos</h1>
</div>


<a class="genric-btn success radius small" href="index.php?r=pago/registrarpago" >Crear Pago</a>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pago-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	     // 'paciente.usuario.nombrecompleto',
		
	        array(

           'name'=>'descripcion',

           'value'=>'$data->numeroconsultorio->descripcion',
           ),

				array(

           'name'=>'nombres',

           'value'=>'$data->paciente->usuario->nombres',
           ),
		//'id',
		//'id',
		
		       array(
                'name'=>'fechahoraregistro',
                //'header'=>'Date',
                'value'=>'Yii::app()->utiles->formatearFechaHora($data["fechahoraregistro"])'
              ),
		'numeropieza',
		'costo',
		'acuenta',
		'saldo',

		/*
		'idpaciente',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',   
	                       'buttons'=>array
	                      (
	                      	
	                      ),
		),
	),
)); ?>

