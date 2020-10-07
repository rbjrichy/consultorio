<?php

class PacienteAdminController extends Controller
{
	public function actionEditPerfil()
	{
		$this->render('editPerfil');
	}

	public function actionIndex()
	{
		// $user_id = Yii::app()->user->id;
		// $modelPaciente = Paciente::model()->find('idusuario = :id', array('id'=>$user_id));
		$modelUsuario =Usuario::model()->findByPk(Yii::app()->user->id);
		$modelPassword = new PasswordForm;
		$this->render('index', 
			['modelUsuario'=>$modelUsuario, 
			 'modelPassword' => $modelPassword,
		]);
	}

	public function actionSubirFoto()
	{
		$this->render('subirFoto');
	}

	public function actionHistorialEconomico()
	{
		//datos paciente usuario
		$user_id = Yii::app()->user->id;
		$modelPaciente = Paciente::model()->find('idusuario = :id', array('id'=>$user_id));
		// var_dump($modelPaciente->id);
		// Yii::app()->end();
		//critero para pagos
		if (isset($modelPaciente)) {
			$criteria = new CDbCriteria();
	    	$criteria->condition = "idpaciente = ".$modelPaciente->id;
	    	$criteria->order = "fechahoraregistro desc";
	        $dataProviderPagos = new CActiveDataProvider(Pago::model(), 
	        	array('criteria'=>$criteria));
		}
		else $dataProviderPagos=[];

		$this->render('historialEconomico', 
			['modelPaciente'=>$modelPaciente, 
			'dataProviderPagos' => $dataProviderPagos,
		]);
	}

	public function actionHistorialClinico()
	{
		//datos paciente usuario
		$user_id = Yii::app()->user->id;
		$modelPaciente = Paciente::model()->find('idusuario = :id', array('id'=>$user_id));

		if (isset($modelPaciente)) {
			$criteria = new CDbCriteria();
	    	$criteria->condition = "idpaciente = ".$modelPaciente->id;
	    	$criteria->order = "id";
	        $dataProviderAnamnesis = new CActiveDataProvider(Anamnesis::model(), 
	        	array('criteria'=>$criteria));
        }
		else $dataProviderAnamnesis=[];
		if (isset($modelPaciente)) {
	        $criteria = new CDbCriteria();
	    	$criteria->condition = "idpaciente = ".$modelPaciente->id;
	    	$criteria->order = "id";
	        $dataProviderTratamiento = new CActiveDataProvider(Tratamiento::model(), 
	        	array('criteria'=>$criteria));
	    }
		else $dataProviderTratamiento=[];

		$this->render('historialClinico', 
			['modelPaciente'=>$modelPaciente, 
			'dataProviderAnamnesis' => $dataProviderAnamnesis,
			'dataProviderTratamiento' => $dataProviderTratamiento,
		]);
	}

	public function actionsubirAvatar()
	{
		$modelUsuario = Usuario::model()->findByPk(Yii::app()->user->id);
		if(isset($_FILES))
		{
            $arImg = CUploadedFile::getInstance($modelUsuario,'avatar');
            if ($arImg->getExtensionName() == 'jpg' || $arImg->getExtensionName() == 'jpeg' || $arImg->getExtensionName() == 'png') 
            {
            	$ruta = Yii::getPathOfAlias('webroot').'/images/avatar/';
            	$nombre = $modelUsuario->ci.'-'.$modelUsuario->id.'-'.date("Ymdhis").'.'.$arImg->getExtensionName();
				// var_dump($modelUsuario->getMetaData());
				// Yii::app()->end();
            	$modelUsuario->avatar = $nombre;
            }
            else
            {
            	Yii::app()->user->setFlash('error-imagen', 'Imagen no válida');
            }
            if ($modelUsuario->save()) 
            {
            	$arImg->saveAs($ruta.$nombre);
            	Yii::app()->user->setFlash('success-imagen', 'Se guardo correctamente');
			}  
			else
			{
            	Yii::app()->user->setFlash('error-imagen', 'Error al guardar el registro');
			}
		}
		else{
			Yii::app()->user->setFlash('error-imagen', 'Seleccione una imágen');
		}

		$this->redirect(['pacienteAdmin/index']); 
	}

	public function actionActualizarPerfil()
	{
		$modelUsuario = Usuario::model()->findByPk(Yii::app()->user->id);
		if (isset($_POST['Usuario'])) {
            $modelUsuario->attributes = $_POST['Usuario'];
			// var_dump($modelUsuario->attributes);
			// Yii::app()->end();
            if ($modelUsuario->save())
            //$this->redirect(array('view','id'=>$model->id));
            {
                $this->redirect(array('index'));
            }

        }

		$this->render('updatePerfil', [
			'modelUsuario' => $modelUsuario,
		]);
	}
}