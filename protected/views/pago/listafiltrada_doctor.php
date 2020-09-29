

<h4>Detalle de Pagos del Paciente</h4>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pagos-grid',
	'dataProvider'=>$modelpagos_doctor,

	//'filter'=>$modelpagos,
	'columns'=>array(
		'paciente.usuario.nombrecompleto',
		array(
                'name'=>'fechahoraregistro',
                //'header'=>'Date',
                'value'=>'Yii::app()->utiles->formatearFechaHora($data["fechahoraregistro"])'
            ),
		'numeropieza',
		'costo',
		'acuenta',
		'saldo',
		'numeroconsultorio.descripcion',
		
		/*
		array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>

