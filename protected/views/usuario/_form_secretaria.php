<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */

// Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl . '/js/scriptwebcam.js', CClientScript::POS_END);
// echo Yii::app()->baseUrl;

?>
<!-- <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/vendor/jquery-1.12.4.min.js"></script> -->
<!-- <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script> -->

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="font-italic small">Campos con <span class="text-danger">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'nombreusuario'); ?>
				<?php echo $form->textField($model,'nombreusuario',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'nombreusuario'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'clave'); ?>
				<?php echo $form->passwordField($model,'clave',array('maxlength'=>50,'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'clave'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'nombres'); ?>
				<?php echo $form->textField($model,'nombres',array('maxlength'=>10, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'nombres'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'apellidopaterno'); ?>
				<?php echo $form->textField($model,'apellidopaterno',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'apellidopaterno'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'apellidomaterno'); ?>
				<?php echo $form->textField($model,'apellidomaterno',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'apellidomaterno'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'ci'); ?>
				<?php echo $form->textField($model,'ci',array('maxlength'=>10, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'ci'); ?>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<?php echo $form->labelEx($model,'idsexo'); ?>
				<?php echo $form->dropDownList($model,'idsexo', CHtml::listData (Sexo::model()->findAll(),'id','descripcion')
					, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'idsexo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'idocupacion'); ?>
				<?php echo $form->dropDownList($model,'idocupacion', CHtml::listData (Ocupacion::model()->findAll(),'id','descripcion')
					, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'idocupacion'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'idciudad'); ?>
				<?php echo $form->dropDownList($model,'idciudad', CHtml::listData (Ciudad::model()->findAll(),'id','nombreciudad')
					, array('empty'=>'Seleccione', 'class'=>"form-control single-input-primary")); ?>
				<?php echo $form->error($model,'idciudad'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'numerotelefono'); ?>
				<?php echo $form->textField($model,'numerotelefono',array('maxlength'=>10, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'numerotelefono'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'numerocelular'); ?>
				<?php echo $form->textField($model,'numerocelular',array('maxlength'=>10, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'numerocelular'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'direccion'); ?>
				<?php echo $form->textField($model,'direccion',array('maxlength'=>50, 'class' => 'form-control single-input-primary')); ?>
				<?php echo $form->error($model,'direccion'); ?>
			</div>	
		</div>
		<?php 
			//mandamos por hidden porque siempre creamos usuario tipo2 (investigador), solo el administrador crea otro tipo de usuarios
			echo $form->hiddenField($model,'idtipousuario',array('value' => 4)); 
		?>
		<div class="col-sm-4">
			<div>
				<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
				<button type="button" id="boton">Capturar foto</button>
				<p class="small" id="estado"></p>
			</div>
			<br>
			<video width="200" muted="muted" id="video"></video>
			<canvas id="canvas" style="display: none;"></canvas>
			<div class="mt-5">
				<div class="typography">
					<h5>Vista Previa</h5>
				</div>
				<?php
			        $nameAvatar = isset($model->avatar) ? $model->avatar : 'perfil-avatar-hombre-icono-redondo.jpg';
			        $pathAvatar = Yii::app()->request->baseUrl . '/images/avatar/' . $nameAvatar;
		        ?>
				<img id="imagen-avatar" width="200" alt="Vista previa de la imagen de Bootstrap" src="<?php echo $pathAvatar; ?>" class="rounded mx-auto d-block" />
			</div>
			<div class="form-group">
				<?php 
                    // var_dump($model->attributes);
                    // Yii::app()->end();
                    echo $form->textField($model,'avatar',array('class' => 'form-control single-input-primary', 'readonly'=>'readonly')); 
                ?>
				<?php echo $form->error($model,'avatar'); ?>
			</div>
		</div>
	</div>
<div class="row">
	<div class="col-sm-12 form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => 'genric-btn primary-border radius pull-right']); ?>
	</div>
</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->
<script>
	/*
    Tomar una fotografía y guardarla en un archivo v3
    @date 2018-10-22
    @author parzibyte
    @web parzibyte.me/blog
*/
const tieneSoporteUserMedia = () =>
    !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)
const _getUserMedia = (...arguments) =>
    (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);

// Declaramos elementos del DOM
const $video = document.querySelector("#video"),
    $canvas = document.querySelector("#canvas"),
    $estado = document.querySelector("#estado"),
    $boton = document.querySelector("#boton"),
    $listaDeDispositivos = document.querySelector("#listaDeDispositivos");

const limpiarSelect = () => {
    for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--)
        $listaDeDispositivos.remove(x);
};
const obtenerDispositivos = () => navigator
    .mediaDevices
    .enumerateDevices();

// La función que es llamada después de que ya se dieron los permisos
// Lo que hace es llenar el select con los dispositivos obtenidos
const llenarSelectConDispositivosDisponibles = () => {

    limpiarSelect();
    obtenerDispositivos()
        .then(dispositivos => {
            const dispositivosDeVideo = [];
            dispositivos.forEach(dispositivo => {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            if (dispositivosDeVideo.length > 0) {
                // Llenar el select
                dispositivosDeVideo.forEach(dispositivo => {
                    const option = document.createElement('option');
                    option.value = dispositivo.deviceId;
                    option.text = dispositivo.label;
                    $listaDeDispositivos.appendChild(option);
                });
            }
        });
}

(function() {
    // Comenzamos viendo si tiene soporte, si no, nos detenemos
    if (!tieneSoporteUserMedia()) {
        alert("Lo siento. Tu navegador no soporta esta característica");
        $estado.innerHTML = "Parece que tu navegador no soporta esta característica. Intenta actualizarlo.";
        return;
    }
    //Aquí guardaremos el stream globalmente
    let stream;


    // Comenzamos pidiendo los dispositivos
    obtenerDispositivos()
        .then(dispositivos => {
            // Vamos a filtrarlos y guardar aquí los de vídeo
            const dispositivosDeVideo = [];

            // Recorrer y filtrar
            dispositivos.forEach(function(dispositivo) {
                const tipo = dispositivo.kind;
                if (tipo === "videoinput") {
                    dispositivosDeVideo.push(dispositivo);
                }
            });

            // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
            // y le pasamos el id de dispositivo
            if (dispositivosDeVideo.length > 0) {
                // Mostrar stream con el ID del primer dispositivo, luego el usuario puede cambiar
                mostrarStream(dispositivosDeVideo[0].deviceId);
            }
        });



    const mostrarStream = idDeDispositivo => {
        _getUserMedia({
                video: {
                    // Justo aquí indicamos cuál dispositivo usar
                    deviceId: idDeDispositivo,
                }
            },
            (streamObtenido) => {
                // Aquí ya tenemos permisos, ahora sí llenamos el select,
                // pues si no, no nos daría el nombre de los dispositivos
                llenarSelectConDispositivosDisponibles();

                // Escuchar cuando seleccionen otra opción y entonces llamar a esta función
                $listaDeDispositivos.onchange = () => {
                    // Detener el stream
                    if (stream) {
                        stream.getTracks().forEach(function(track) {
                            track.stop();
                        });
                    }
                    // Mostrar el nuevo stream con el dispositivo seleccionado
                    mostrarStream($listaDeDispositivos.value);
                }

                // Simple asignación
                stream = streamObtenido;

                // Mandamos el stream de la cámara al elemento de vídeo
                $video.srcObject = stream;
                $video.play();

                //Escuchar el click del botón para tomar la foto
                //Escuchar el click del botón para tomar la foto
                $boton.addEventListener("click", function() {

                    //Pausar reproducción
                    $video.pause();

                    //Obtener contexto del canvas y dibujar sobre él
                    let contexto = $canvas.getContext("2d");
                    $canvas.width = $video.videoWidth;
                    $canvas.height = $video.videoHeight;
                    contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);

                    let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                    $estado.innerHTML = "Enviando foto. Por favor, espera...";
                    //./guardar_foto.php
                    fetch("index.php?r=usuario/capturarfoto", {
                            method: "POST",
                            body: encodeURIComponent(foto),
                            headers: {
                                "Content-type": "application/x-www-form-urlencoded",
                            }
                        })
                        .then(resultado => {
                            // A los datos los decodificamos como texto plano
                            return resultado.text()
                        })
                        .then(nombreDeLaFoto => {
                            // nombreDeLaFoto trae el nombre de la imagen que le dio PHP
                        $estado.innerHTML = `Foto guardada con éxito.`;
             			var loc = window.location;
					    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
					    var rutaAbsoluta = loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
					    	rutaAbsoluta += '/images/avatar/'; 
                            document.getElementById("imagen-avatar").src=`${rutaAbsoluta}${nombreDeLaFoto}`;

                            //Usuario_avatar id input text avatar
                            document.getElementById("Usuario_avatar").value = `${nombreDeLaFoto}`;
                            console.log("La foto fue enviada correctamente");
                        })

                    //Reanudar reproducción
                    $video.play();
                });
            }, (error) => {
                console.log("Permiso denegado o error: ", error);
                $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
            });
    }
})();
</script>