<div class="typography mt-5">
  <h1>Historia Clinica</h1>
</div>
<?php
if (Yii::app()->user->isGuest) {
    $this->redirect('index.php');
} else 
{
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/validacion.js');
    $idpaciente = $_GET['idpaciente'];
    ?>
<?php 
// echo var_dump($data);
 ?>
<div class="row ml-1">
    <div class="typography mt-5">
      <h3>Datos Paciente</h3>
    </div>
</div>
<div class="row ml-1">
  <div class="col-sm-6">
    <div class="row mb-2">
            <div class="col-md-4">
              <strong>Nombre: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                echo isset($datosPaciente->usuario->nombres)?$datosPaciente->usuario->nombres:'';
                echo isset($datosPaciente->usuario->apellidopaterno)?$datosPaciente->usuario->apellidopaterno:'';
                echo isset($datosPaciente->usuario->apellidomaterno)?$datosPaciente->usuario->apellidomaterno:''; 
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>CI: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->ci)?$datosPaciente->usuario->ci:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Sexo: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->sexo->descripcion)?$datosPaciente->usuario->sexo->descripcion:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Ocupación: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->ocupacion->descripcion)?$datosPaciente->usuario->ocupacion->descripcion:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Ciudad: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->ciudad->nombreciudad)?$datosPaciente->usuario->ciudad->nombreciudad:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Num. Teléfono: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->numerotelefono)?$datosPaciente->usuario->numerotelefono:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Celular: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->numerocelular)?$datosPaciente->usuario->numerocelular:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>email: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->email)?$datosPaciente->usuario->email:'';
                ?>
              </span>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <strong>Dirección: </strong>
            </div>
            <div class="col-md-8">
              <span>
                <?php 
                  echo isset($datosPaciente->usuario->direccion)?$datosPaciente->usuario->direccion:'';
                ?>
              </span>
            </div>
          </div>
  </div>
  <div class="col-sm-6">
    <div class="text-center">
      <?php 
        $nameAvatar = isset($datosPaciente->usuario->avatar)?$datosPaciente->usuario->avatar:'perfil-avatar-hombre-icono-redondo.jpg';
        $pathAvatar = Yii::app()->request->baseUrl.'/images/avatar/'.$nameAvatar;

      ?>
      <img alt="Vista previa de la imagen de Bootstrap" src="<?php echo $pathAvatar; ?>" class="img-thumbnail" />
    </div>
  </div>
</div>

<!-- INICIO ANAMNESIS -->
<?php include(dirname(__FILE__).'/anamnesis.php'); ?>
<!-- HASTA AQUI ANAMNESIS -->

<!-- INICIO ANTECEDENTES DENTALES -->
<?php include(dirname(__FILE__).'/antecedentesdentales.php'); ?>
<!-- HASTA AQUI ANTECEDENTES DENTALES -->

<!-- INICIO Tratamiento -->
<?php include(dirname(__FILE__).'/tratamientos.php'); ?>
<!-- FIN TRATAMIENTO -->
<!-- INICIO EXAMENES ESTERNOS -->
<?php include(dirname(__FILE__).'/examenesexternos.php'); ?>
<!-- FIN SCRIPT OTROS EXAMENES -->

<?php
} // si no es invitado
?>