<?php
/* @var $this PacienteAdminController */

$this->breadcrumbs=array(
	'historial Económico',
);
?>
<div class="typography">
	<h1>Historial Económico del Paciente</h1>
</div>
<a class="genric-btn success radius small" href="index.php?r=pacienteAdmin/historialClinico" >Ver Historial Clinico</a>
<div class="row ml-1">
		<div class="m-1">
			<label for="">Nombre Paciente:</label>
			<span>Juan Carlos Peñaranda</span>
		</div>
		<div class="m-1">
			<label for="">Total Pagado:</label>
			<span>5000</span>
		</div>
		<div class="m-1">
			<label for="">Total Deuda:</label>
			<span>1500</span>
		</div>
		<div class="m-1">
			<label for="">Saldo:</label>
			<span>5048</span>
		</div>
</div>
<div class="row">
	
	<div class="col-md-12">
		<table class="table table-striped table-hover table-sm">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Consultorio
						</th>
						<th>
							Fecha Pago
						</th>
						<th>
							Nro. Pieza
						</th>
						<th>Costo</th>
						<th>A cuenta</th>
						<th>Saldo</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Consultorio 1</td>
						<td>16/08/2020 01:06</td>
						<td>51</td>
						<td>400</td>
						<td>150</td>
						<td>250</td>
					</tr> 	
					<tr>
						<td>1</td>
						<td>Consultorio 1</td>
						<td>16/08/2020 10:59</td>
						<td>21</td>
						<td>400</td>
						<td>150</td>
						<td>250</td>
					</tr> 
					<tr>
						<td>1</td>
						<td>Consultorio 1</td>
						<td>17/08/2020 01:26</td>
						<td>53</td>
						<td>400</td>
						<td>150</td>
						<td>250</td>
					</tr> 
					<tr>
						<td>1</td>
						<td>Consultorio 1</td>
						<td>18/08/2020 11:36</td>
						<td>58</td>
						<td>400</td>
						<td>150</td>
						<td>250</td>
					</tr> 
					<tr>
						<td>1</td>
						<td>Consultorio 1</td>
						<td>19/08/2020 12:00</td>
						<td>66</td>
						<td>400</td>
						<td>150</td>
						<td>250</td>
					</tr> 
				</tbody>
		</table>
	</div>
</div>				
