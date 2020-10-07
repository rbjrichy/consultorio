<?php
/* @var $this PacienteAdminController */
$this->breadcrumbs=array(
	'historial Clínico',
);
?>
<div class="typography">
	<h1>Historial Clínico del Paciente</h1>
</div>
<div class="row mb-2 mt-2 ml-1">
	<div>
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
		<div class="typography">
			<h5>Tratamientos Realizados</h5>
		</div>
		<?php
		//grid tratamiento
		if (!is_array($dataProviderTratamiento)) {
		    $this->widget('zii.widgets.grid.CGridView', array(
		        'id'           => 'pacientetratamiento-grid',
		        'dataProvider' => $dataProviderTratamiento,
		        'columns'      => array(
		            'numeroconsultorio.doctorasignado',
		            'tratamiento',
		            'detalle',
			        ),
			    ));
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="typography">
			<h5>Consultas solicitadas</h5>
		</div>
	<?php 
		if (!is_array($dataProviderAnamnesis)) {

			$this->widget('zii.widgets.grid.CGridView', array(
			    'id'           => 'pacienteanamnesis-grid',
			    'dataProvider' => $dataProviderAnamnesis,
			    'columns'      => array(
			        'motivoconsulta',
			        array(
			            'name'  => 'tratamientomedico',
			            'value' => '($data["tratamientomedico"]==0)?"No":"Si"',
			        ),
			        'nombretratamientomedico',
			        'medicamentotratamientomedico',
			        'alergias',
			        array(
			            'name'  => 'diabetes',
			            'value' => '($data["diabetes"]==0)?"No":"Si"',
			        ),
			        array(
			            'name'  => 'hipertension',
			            'value' => '($data["hipertension"]==0)?"No":"Si"',
			        ),
			        array(
			            'name'  => 'cardiaco',
			            'value' => '($data["cardiaco"]==0)?"No":"Si"',
			        ),
			        array(
			            'name'  => 'epilepsia',
			            'value' => '($data["epilepsia"]==0)?"No":"Si"',
			        ),
			        array(
			            'name'  => 'embarazada',
			            'value' => '($data["embarazada"]==0)?"No":"Si"',
			        ),
			        array(
			            'name'  => 'gastritis',
			            'value' => '($data["gastritis"]==0)?"No":"Si"',
			        ),
			        'otros',
			    ),
			));
		}
	?>
	</div>
</div>