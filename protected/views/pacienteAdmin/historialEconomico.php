<?php
/* @var $this PacienteAdminController */

$this->breadcrumbs = array(
    'historial Económico',
);
?>
<div class="typography">
	<h1>Historial Económico del Paciente</h1>
</div>
<a class="genric-btn success radius small" href="index.php?r=pacienteAdmin/historialClinico" >Ver Historial Clinico</a>
<div class="row ml-1 mt-2">
		<div class="m-1">
			<label for="">Nombre Paciente:</label>
			<span>
				<?php
				echo isset($modelPaciente->usuario->nombres) ? $modelPaciente->usuario->nombres . ' ' : '';
				echo isset($modelPaciente->usuario->apellidopaterno) ? $modelPaciente->usuario->apellidopaterno . ' ' : '';
				echo isset($modelPaciente->usuario->apellidomaterno) ? $modelPaciente->usuario->apellidomaterno : '';
				?>
			</span>
		</div>
</div>
<div class="row">

	<div class="col-md-12">
	<?php 
	if (!is_array($dataProviderPagos)) {
		$this->widget('zii.widgets.grid.CGridView', array(
		    'id'           => 'pago-grid',
		    'dataProvider' => $dataProviderPagos,
		    'columns'      => array(
		        'numeroconsultorio.doctorasignado',
		        array(
		            'name'  => 'fechahoraregistro',
		            //'header'=>'Date',
		            'value' => 'Yii::app()->utiles->formatearFechaHora($data["fechahoraregistro"])',
		        ),
		        'tratamiento.tratamiento',
		        'numeropieza',
		        'costo',
		        'acuenta',
		        'saldo',
		    	)
			));	
	}
	?>
	</div>
</div>
