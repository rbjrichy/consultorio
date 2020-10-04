<?php

class EstudiosExternosController extends Controller
{
	public function actionCreate()
	{
		$this->render('create', ['paciente_id' => $_GET['idpaciente']]);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionView()
	{
		$this->render('view');
	}

	public function actionInsertarEstudiosExterno()
	{
		$estExterno = new EstudiosExternos;
		if(isset($_FILES))
		{
	    	$estExterno->nombre = $_POST['nombre'];
            $estExterno->descripcion = $_POST['descripcion'];
            $estExterno->paciente_id = $_POST['paciente_id'];
            $estExterno->create_at = date("Y-m-d H:i:s");
            $arImg = CUploadedFile::getInstance($estExterno,'nombre_archivo');
            if ($arImg->getExtensionName() == 'jpg' || $arImg->getExtensionName() == 'jpeg' || $arImg->getExtensionName() == 'png') 
            {
            	$ruta = Yii::getPathOfAlias('webroot').'/images/Estudios-Externos/';
            	$nombre = 'paciente-'.$estExterno->paciente_id.'-'.date("Ymdhis").'-'.rand(100,999).'.'.$arImg->getExtensionName();
            	$arImg->saveAs($ruta.$nombre);
            	$estExterno->nombre_archivo = $nombre;
            }
            else
            {
            	Yii::app()->user->setFlash('error_imagen', 'Imagen no válida');
            }
            if ($estExterno->save()) 
            {
            	Yii::app()->user->setFlash('success', 'Se guardo correctamente');
			}  
			else
			{
            	Yii::app()->user->setFlash('error', 'Error al guardar el registro');
			}
		}

		$this->redirect(['paciente/formulario','idpaciente'=>$estExterno->paciente_id]); 
		// $this->render('paciente/formulario',['idpaciente'=>$estExterno->paciente_id]);
	}

	public function actionVerImagen()
	{
		$nameImg=$_GET['nameImg']; 
        $this->layout='//layouts/tabla';	
        $pathImg =  Yii::app()->request->baseUrl.'/images/Estudios-Externos/'.$nameImg; 
        $this->render('verImagen',array('pathImg'=>$pathImg));
	}


	public function loadModel($id)
	{
		$model=EstudiosExternos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}