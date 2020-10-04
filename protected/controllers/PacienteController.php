<?php

class PacienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','adminsecre', 'admin_doctor','rellenardatos', 'observaciones','datosobservaciones','formulario',
					'insertaranamnesis','insertarantecedentesdentales','insertartratamiento'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Paciente;

		$dia_actual = date('Y-m-d');
		$nuevafecha = strtotime('-30 year', strtotime ($dia_actual));
		$model->fechanacimiento = date ('Y-m-d', $nuevafecha);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paciente']))
		{
			
			
			$model->attributes = $_POST['Paciente'];

			//var_dump($model);
			$fecha_nacimiento = $_POST['Paciente']['fechanacimiento'];
			$edad = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
			$model->edad = $edad->y;
			
			$model->fechahoraregistro = date('Y-m-d  H:i:s');

			$model->observaciones = "";


			if($model->save())
			{
				$this->redirect(array('admin'));
			}
			else
			{
				var_dump($model->errors);
			}	
					
		}

		$this->render('create',array(
			'model'=>$model,
		));

		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// var_dump($model->attributes);
		// Yii::app()->end();
		if(isset($_POST['Paciente']))
		{
			$model->attributes=$_POST['Paciente'];
			$fecha_nacimiento = $_POST['Paciente']['fechanacimiento'];
			$dia_actual = date('Y-m-d');
			$edad = date_diff(date_create($fecha_nacimiento), date_create($dia_actual));
			$model->edad = $edad->y;
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Paciente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Paciente('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

		public function actionAdmin_doctor()
	{
		$model=new Paciente('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdminsecre()
	{
		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('adminsecre',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Paciente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Paciente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Paciente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='paciente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
   /* public function actionRellenardatos()
     {		
        	$model = new Paciente;
    	    $sql="
          	select u.*
			from usuario u
			LEFT JOIN paciente p
                 ON p.idusuario= u.id
                WHERE p.id IS NULL and  u.idpaciente = 1
          ";

          $connection = Yii::app()->db;
          $command=$connection->createCommand($sql);
          $resultados=$command->queryall();

          echo CHtml::tag('option', array('value' => ''),'Seleccione', true);

			foreach ($resultados as $resultado) {
			    echo CHtml::tag('option',array('value'=>$resultado['id']),CHtml::encode($resultado['idusuario']), true );
			    
			}
       }*/



	public function actionObservaciones()
	{
		
		if(isset($_GET['idpaciente'])) //verificar si llegaron los datos
		{
			$model = Paciente::model()->findByPk($_GET['idpaciente']);
				
            $model->observaciones = $_GET['observaciones'];
           
            if ($model->validate()) //validar si los datos son coherentes con las rules definidas en el model
            {
				if ($model->save()) 
	            {
					//guardo correctamente	
					
	            	//registrar seguimiento
					$seguimiento = new Seguimientopaciente;
			
	                $seguimiento->idpaciente = $_GET['idpaciente'];
	                $seguimiento->idactividad = 6; //registro de observaciones
	                $seguimiento->fechahoraregistro = date('Y-m-d  H:i:s');
	                $seguimiento->idusuariogestion = Yii::app()->user->id;

	            	if ($seguimiento->save()) 
	            	{

	            	}    

				}	
				else
				{
					// si hay errores mostrarlos
					var_dump($p->getErrors());
				}
			}
			else
			{
				// si hay errores mostrarlos
				var_dump($p->getErrors());
			}
              
		}
		else
		{
			//echo 'no llegaron los datos';
			
		}
	}

	public function actionDatosobservaciones()
	{
        $id=$_GET['idpaciente']; 
        
        $this->layout='//layouts/tabla';	
         
        $this->render('datosobservaciones',array('idpaciente'=>$id));

        
    }

    public function actionFormulario()
    {
    	if (Yii::app()->user->isGuest)
    	{
    		//echo "entro invitado";
		    $this->redirect('index.php'); 
    	}
		else 
		{
	 	
	 	//datos paciente usuario
        $criteria = new CDbCriteria();
        // $criteria->join = 'inner join usuario as u on t.idusuario = u.id ';
    	$criteria->condition = "t.id = ".$_GET["idpaciente"];
    	// $criteria->select = 't.*, u.*';
        $datosPaciente = Paciente::model()->find($criteria);
        // var_dump($datosPaciente);
        // Yii::app()->end();
        //list  just anamnesis
        $criteria = new CDbCriteria();
    	$criteria->condition = "idpaciente = ".$_GET["idpaciente"];
    	$criteria->order = "id";
        $dataProviderAnamnesis = new CActiveDataProvider(Anamnesis::model(), 
        	array('criteria'=>$criteria));

		//list  just antecedentes dentales
		$criteria = new CDbCriteria();
    	$criteria->condition = "idpaciente = ".$_GET["idpaciente"];
    	$criteria->order = "id";
        $dataProviderAntecedentesDentales = new CActiveDataProvider(Antecedentesdentales::model(), 
        	array('criteria'=>$criteria));

        //list  just tratamiento
        $criteria = new CDbCriteria();
    	$criteria->condition = "idpaciente = ".$_GET["idpaciente"];
    	$criteria->order = "id";
        $dataProviderTratamiento = new CActiveDataProvider(Tratamiento::model(), 
        	array('criteria'=>$criteria));

        //List para obtener EstudiosExternos
        $criteria = new CDbCriteria();
    	$criteria->condition = "paciente_id = ".$_GET["idpaciente"];
    	$criteria->order = "id";
        $dataProviderEstExternos = new CActiveDataProvider(EstudiosExternos::model(), 
        	array('criteria'=>$criteria));
        
        $this->render('formulario',array(
        	'dataProviderAnamnesis'=>$dataProviderAnamnesis,
        	'dataProviderAntecedentesDentales'=>$dataProviderAntecedentesDentales,
        	'dataProviderTratamiento'=>$dataProviderTratamiento,
        	'dataProviderEstExternos'=>$dataProviderEstExternos,
        	'idpaciente'=>$_GET["idpaciente"], 
        	'datosPaciente' => $datosPaciente, 
        	// 'paciente' => new Paciente,
        	));

	    }
    }

    public function actionInsertaranamnesis()
	{
	//get strings
		$p = new Anamnesis;

		if(isset($_GET['motivoconsulta']))
		{
			//var_dump($_GET['motivoconsulta']);
		    	$p->motivoconsulta = $_GET['motivoconsulta'];
                $p->tratamientomedico = $_GET['tratamientomedico'];
                $p->nombretratamientomedico = $_GET['nombretratamientomedico'];
                $p->medicamentotratamientomedico = $_GET['medicamentotratamientomedico'];
                $p->alergias = $_GET['alergias'];
                $p->diabetes = $_GET['diabetes'];
                $p->hipertension = $_GET['hipertension'];
                $p->cardiaco = $_GET['cardiaco'];
                $p->epilepsia = $_GET['epilepsia'];
                $p->embarazada = $_GET['embarazada'];
                $p->gastritis = $_GET['gastritis'];
                $p->otros = $_GET['otros'];
                $p->idpaciente = $_GET['idpaciente'];
                       
            if ($p->save()) 
            {
				//se guardo
			}  
		}
		else
		{
			echo 'no llego';
			//var_dump('no llego');
		}
	}
	
	public function actionInsertarantecedentesdentales()
	{
	//get strings
		$p = new Antecedentesdentales;

		if(isset($_GET['numerocepilladas']))
		{
			//var_dump($_GET['motivoconsulta']);
		    	$p->numerocepilladas = $_GET['numerocepilladas'];
                $p->hilodental = $_GET['hilodental'];
                $p->enjuaguebucal = $_GET['enjuaguebucal'];
                $p->fuma = $_GET['fuma'];
                $p->numerofumadas = $_GET['numerofumadas'];
                $p->tienedolor = $_GET['tienedolor'];
                $p->idtipomotivodolor = $_GET['idtipomotivodolor'];
                $p->piezasdentales = $_GET['piezasdentales'];
                $p->idpaciente = $_GET['idpaciente'];
                       
            if ($p->save()) 
            {
				//se guardo
			}  
		}
		else
		{
			echo 'no llego';
			//var_dump('no llego');
		}
	}

	public function actionInsertartratamiento()
	{
	//get strings
		$p = new Tratamiento;

		if(isset($_POST['descripcion']))
		{
			//var_dump('descripcion');
		    	$p->descripcion = $_GET['descripcion'];
                $p->detalle = $_GET['detalle'];
                $p->idpaciente = $_GET['idpaciente'];
                       
            if ($p->save()) 
            {
				//se guardo
				echo 'se guardo';
			}  
		}
		else
		{
			echo 'no llego';
			//var_dump('no llego');
		}
	}
}
