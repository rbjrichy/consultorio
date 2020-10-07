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

<a class="genric-btn primary-border radius small" href="index.php?r=reserva/createreservapaciente" >Crear Reserva</a>

<?php 
$modelUsuario = Usuario::model()->findByPk(Yii::app()->user->id);
if ($modelUsuario->tipousuario->rol == 'Paciente') {
// var_dump($modelUsuario->paciente->reserva);
// Yii::app()->end();
	// $rawData = $modelUsuario->paciente->reserva;
$dataProvider=new CActiveDataProvider('Reserva', array(
	    'criteria'=>array(
	        'condition'=>'idpaciente='.$modelUsuario->paciente->id . ' AND fechareserva >= "'. date('y-m-d').'"',
	        'order'=>'fechareserva, idhorario ASC',
	        // 'with'=>array('author'), 'fechareserva >= "'. date('y-m-d').'"'
	    ),
	    'countCriteria'=>array(
	        'condition'=>'idpaciente='.$modelUsuario->paciente->id,
	        // 'order' and 'with' clauses have no meaning for the count query
	    ),
	    'pagination'=>array(
	        'pageSize'=>10,
	    ),
	));
}
// $modelReservaPaciente = 

?>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'reserva-grid',
		'dataProvider'=>$dataProvider,
		// 'filter'=>$model,
		'columns'=>array(
			'paciente.usuario.nombrecompleto',
			'numeroconsultorio.doctorasignado',
			'horario.descripcion',
			array(
			   'name'=>'Fecha Reserva',
			   'value'=>'Yii::app()->utiles->formatearFecha($data["fechareserva"])',
			),
			'motivo',
			'fechahoraregistro',
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
	)); 
?>
