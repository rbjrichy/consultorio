<?php
/* @var $this PacienteAdminController */

$this->breadcrumbs=array(
	'Paciente Admin',
);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="typography mb-5">
				<h3>
					Perfil de Paciente
				</h3>
			</div>
			<div class="row">
				<div class="col-md-5">
					
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Nombre: </strong>
						</div>
						<div class="col-md-8">
							<span>Juan Jose Perez</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>CI: </strong>
						</div>
						<div class="col-md-8">
							<span>5471258</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Sexo: </strong>
						</div>
						<div class="col-md-8">
							<span>Maculino</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Ocupación: </strong>
						</div>
						<div class="col-md-8">
							<span>Independiente</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Ciudad: </strong>
						</div>
						<div class="col-md-8">
							<span>Sucre</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Num. Teléfono: </strong>
						</div>
						<div class="col-md-8">
							<span></span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Celular: </strong>
						</div>
						<div class="col-md-8">
							<span>78647852</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>email: </strong>
						</div>
						<div class="col-md-8">
							<span>juanperz@gamil.com</span>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<strong>Dirección: </strong>
						</div>
						<div class="col-md-8">
							<span>Calle J. Prudencio Bustillos S/N</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							 <button class="genric-btn primary-border radius small" type="button" class="btn btn-primary">
								Editar
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="span12 text-center mb-5">
						<img alt="Vista previa de la imagen de Bootstrap" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" class="rounded-circle" />
					</div>
					<form role="form">
						<div class="form-group">
							<label for="exampleInputFile">
								Cambiar Foto de Perfil
							</label>
							<input type="file" class="form-control-file" id="exampleInputFile" />
						</div>
						<button class="genric-btn primary-border radius small" type="submit" class="btn btn-primary">
							Guardar
						</button>
					</form>
				</div>
				<div class="col-md-3">
					<div class="typography">
						<h5>Cambiar Contraseña</h5>
					</div>
					<form role="form">
						<div class="form-group">
							<label for="exampleInputFile">
								Contraseña Antual
							</label>
							<input type="password" class="form-control" id="passwordold" />
						</div>
						<div class="form-group">
							<label for="exampleInputFile">
								Contraseña Nueva
							</label>
							<input type="password" class="form-control" id="password1" />
						</div>
						<div class="form-group">
							<label for="exampleInputFile">
								Confirme Contraseña
								</label>
							<input type="password" class="form-control" id="password2" />
						</div>
						<button class="genric-btn primary-border radius small" type="submit" class="btn btn-primary">
							Guardar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="mb-5">
		
	</div>
</div>