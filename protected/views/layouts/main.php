<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />


	 <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/icono.png" type="image/x-icon" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<!-- <div class="container" id="page" style="width:99%;"> -->
<div class="container" id="page">

	<div id="header">
            <div style="background: url(images/imagen.png) no-repeat; height: 136px;">
		
                <div style="margin-left:250px; top: 30px; position: absolute; z-index: 10; font-size: x-large; "> <?php echo CHtml::encode(Yii::app()->name); ?> <br/></div>
                    
        <div style="margin-left:0px" align="center">  <br/>
    </div>
    </div>

	<div id="mainmenu">
				<?php
                if(Yii::app()->user->isGuest) //visitante
                     $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
			
					array('label'=>'Inicio', 'url'=>array('/site/index')),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				  
					),
					));
                 
                elseif (Yii::app()->session['idtipousuario']=='1') //adminstrador
                  	$this->widget('zii.widgets.CMenu',array(
   
					'items'=>array(

					array('label'=>'Inicio', 'url'=>array('/site/index')),
					array('label'=>'Usuarios', 'url'=>array('/usuario/admin')),
					array('label'=>'Paciente', 'url'=>array('/paciente/admin')),
					array('label'=>'Reserva', 'url'=>array('/reserva/admin')),
					array('label'=>'Pago', 'url'=>array('/pago/admin')),
					array('label'=>'Pago Detalle', 'url'=>array('/pago/lista')),
					array('label'=>'Reportes', 'url'=>array('/informes/index')),
					array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				  
					),
					));

				elseif (Yii::app()->session['idtipousuario']=='2') //Doctor
                  $this->widget('zii.widgets.CMenu',array(
                  'items'=>array(

					array('label'=>'Inicio', 'url'=>array('/site/index')),
					array('label'=>'Datos Paciente', 'url'=>array('/usuario/registraradminsecretaria')),
					array('label'=>'Paciente', 'url'=>array('/paciente/admin_doctor')),
					array('label'=>'Reserva', 'url'=>array('/reserva/admin')),
					array('label'=>'Pago', 'url'=>array('/pago/admin_pagos_doctor')),
					//array('label'=>'Pago Detalle', 'url'=>array('/pago/lista_doctor')),
					array('label'=>'Reportes', 'url'=>array('/informes/index_doctor')),
					array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				  
					),
					)); 
                elseif (Yii::app()->session['idtipousuario']=='3') //secretaria
                  $this->widget('zii.widgets.CMenu',array(
                  'items'=>array(

					array('label'=>'Inicio', 'url'=>array('/site/index')),
					array('label'=>'Datos Paciente', 'url'=>array('/usuario/registraradminsecretaria')),
					array('label'=>'Activar Paciente Historial', 'url'=>array('/paciente/adminsecre')),
					array('label'=>'Reserva', 'url'=>array('/reserva/admin')),
					array('label'=>'Reportes', 'url'=>array('/informes/index_secre')),
					array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				  
				),
				)); 
                elseif (Yii::app()->session['idtipousuario']=='4') //paciente
                  $this->widget('zii.widgets.CMenu',array(
                  'items'=>array(

					array('label'=>'Inicio', 'url'=>array('/site/index')),
					
					array('label'=>'Reserva', 'url'=>array('/reserva/admin_reservapaciente')),
					array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				  
				  
				),
              )); 
                 
                else
                  $this->widget('zii.widgets.CMenu',array(
   
			       'items'=>array(
				    
				    array('label'=>'Inicio', 'url'=>array('/site/index','visible'=>!Yii::app()->user->isGuest)),
				    array('label'=>'Contact', 'url'=>array('/site/contact')),
                    array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            ),
		));   
       ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
			<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> desarrollado por Marce.<br/>
		Todos los Derechos Reservados.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
