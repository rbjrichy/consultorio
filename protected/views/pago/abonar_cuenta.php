<?php
/* @var $this PagoController */
/* @var $model Pago */

$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'abonar',
);
?>
<div class="typography">
	<h1>Abonar a cuenta</h1>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>Nombre</label>
			<span><?php echo $pagoPaciente->paciente->usuario->getNombrecompleto(); ?></span>
		</div>
		<div class="form-group">
			<label>Número Teléfono Celular</label>
			<span><?php echo $pagoPaciente->paciente->usuario->numerocelular; ?></span>
		</div>
		<div class="form-group">
			<label>Correo Electrónico</label>
			<span><?php echo $pagoPaciente->paciente->usuario->email; ?></span>
		</div>
		<div class="form-group">
			<label>Dirección</label>
			<span><?php echo $pagoPaciente->paciente->usuario->direccion; ?></span>
		</div>
	</div>
	<div class="col-sm-6">
		<?php if(Yii::app()->user->hasFlash('success')):?>
            <div class="alert alert-success">
                <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <?php if(Yii::app()->user->hasFlash('error')):?>
            <div class="alert alert-danger">
                <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
        <?php endif; ?>
		<table class="table table-bordered table-sm table-striped">
			<caption>Lista de tratamientos adeudados.</caption>
			<thead>
				<tr>
					<th>Tratamiento</th>
					<th>Costo</th>
					<td>A cuenta</td>
					<td>Saldo</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$totalDeuda = 0;
					$totalAcuenta = 0;
					$totalCosto = 0;
					foreach ($listaPagos as $key => $pago) { 
					$totalDeuda += $pago->saldo; 
					$totalAcuenta += $pago->acuenta; 
					$totalCosto += $pago->costo; 

				?>
				<tr>
					<td><?php echo $pago->tratamiento->tratamiento; ?></td>
					<td><?php echo $pago->costo ?></td>
					<td><?php echo $pago->acuenta ?></td>
					<td><?php echo $pago->saldo ?></td>

				</tr>
				<?php } ?>
				<tr style="border-top: 2px solid #000;">
					<td>Totales</td>
					<td><?php echo $totalCosto ?></td>
					<td><?php echo $totalAcuenta ?></td>
					<td><?php echo $totalDeuda ?></td>

				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<div class="typography">
			<h3>Ingresar pago</h3>
		</div>
		<?php $form = $this->beginWidget('CActiveForm', array(
			'id'                   => 'paciente-form',
			'enableAjaxValidation' => false,
			));
		?>
		<div class="form-group">
			<label for="">Deuda Total</label>
			<span class="h5"><?php echo $totalDeuda.' Bs.'; ?></span>
		</div>
		<div class="form-group">
			<label for="">Monto a abonar en bs.</label>
			<input type="number" name="montoPagado" id="montoPagado" required class="form-control">
		</div>
		<div class="form-group">
			<input type="hidden" name="idpaciente" value="<?php echo $pagoPaciente->paciente->id; ?>">

			<?php echo CHtml::submitButton('Guardar Abono', ['class' => 'genric-btn primary-border radius']); 
			?>
		</div>
		<?php $this->endWidget();?>
	</div>
</div>
