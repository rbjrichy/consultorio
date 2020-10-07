<?php
/* @var $this PagoController */
/* @var $model Pago */

$this->breadcrumbs=array(
	'Pagos'=>array('admin'),
	'Registrar',
);

// $this->menu=array(
// 	array('label'=>'List Pago', 'url'=>array('index')),
// 	array('label'=>'Create Pago', 'url'=>array('create')),
// );

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
<h1>Registrar Pagos por Tratamiento</h1>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pago-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	     // 'paciente.usuario.nombrecompleto',
	        array(
	           'name'=>'doctorasignado',
	           'value'=>'$data->numeroconsultorio->doctorasignado',
	        ),
			array(
	           'name'=>'nombres',
	           'value'=>'$data->paciente->usuario->nombres',
	           ),
		    array(
                'name'=>'fechahoraregistro',
                'value'=>'Yii::app()->utiles->formatearFechaHora($data["fechahoraregistro"])'
            ),
            array(
	           'name'=>'tratamiento',
	           'value'=>'$data->tratamiento->tratamiento',
	        ),
		'numeropieza',
		'costo',
		'acuenta',
		'saldo',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{abonar}{delete}',   
	                       'buttons'=>array
	                      (
	                      	'update' => array(
							    // 'label'=>'miLabel',     // text label of the button
							    'visible'=>'(Yii::app()->utiles->now()== Yii::app()->utiles->formatearFecha($data["fechahoraregistro"]))', 
							),
							'abonar' => array(
							    'label'=>'Abonar a cuenta', 
							    'url'=>'Yii::app()->createUrl("pago/abonarACuenta", array("idpago"=>$data->id))',      
							    'imageUrl'=>Yii::app()->request->baseUrl . '/images/desembolsado.png'
							),

	                      ),
		),
	),
)); 
?>
