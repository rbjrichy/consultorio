<?php

class ReservaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array('create','update','admin','Admin_reservapaciente','createreservapaciente','updateestado','selecthorarios','selecthorariosconsultorio','cambiarvalorconsultorio'),
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

		//$fechareserva = $_POST['fechareserva'];

		//$_SESSION["valoridconsultorio"] = 0;

		$model = new Reserva;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['Reserva']))
		{
			$model->attributes = $_POST['Reserva'];
			$model->fechahoraregistro = date('Y-m-d  H:i:s');
			

			if($model->save())
			{
				
				$this->redirect(array('admin'));
			}
			else
			{
				// var_dump($model->errors);
			}
				

		}

		$this->render('create',array('model' => $model));
	}
	public function actionCreatereservapaciente()
	{

		//$_SESSION["valoridconsultorio"] = 0;

		$model = new Reserva;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reserva']))
		{
			$model->attributes = $_POST['Reserva'];
			$model->fechahoraregistro = date('Y-m-d  H:i:s');

			if($model->save())
			{
				$this->redirect(array('admin_reservapaciente'));
			}
			else
			{
				//mostrar pagina de error
			}
				

		}

		$this->render('createreservapaciente',array('model' => $model));
	}

	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reserva']))
		{
			$model->attributes=$_POST['Reserva'];

			$model->fechahoraregistro = date('Y-m-d  H:i:s');

			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionUpdateestado($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reserva']))
		{
			$model->attributes=$_POST['Reserva'];

			$model->fechahoraregistro = date('Y-m-d  H:i:s');

			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('updateestado',array(
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
		$dataProvider=new CActiveDataProvider('Reserva');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reserva('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reserva']))
			$model->attributes=$_GET['Reserva'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
		public function actionAdmin_reservapaciente()
	   {
	
		$model=new Reserva('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reserva']))
			//$criteria = new CDbCriteria();
			//$criteria->condition = ('idusuario = '.Yii::app()->session['idusuario']);
			$model->attributes=$_GET['Reserva'];

		$this->render('admin_reservapaciente',array(
			'model'=>$model,
		));
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reserva the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reserva::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reserva $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reserva-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSelecthorarios()
    {		
    	$fechareserva = $_POST['fechareserva'];
    	// $fechareserva = '2020-10-01';
    	$sql="
          	select *
			from horario
			where id not in 
							(select h.id
							from horario h
							join reserva r on r.idhorario = h.id
							where r.fechareserva = '".$fechareserva."' and 
							      r.idestadoreserva != 3)
          ";
          // echo $sql;
          $connection = Yii::app()->db;
          $command=$connection->createCommand($sql);
          $resultados=$command->queryall();

          echo CHtml::tag('option', array('value' => ''),'Seleccione', true);

			foreach ($resultados as $resultado) {
			    echo CHtml::tag('option',array('value'=>$resultado['id']),CHtml::encode($resultado['descripcion']), true );
			}
       }

    public function actionSelecthorariosconsultorio()
    {	

    	/*$fechareserva = $_POST['fechareserva'];
       	$idnumeroconsultorio = $_POST['idnumeroconsultorio'];
       	//$idpaciente = $_POST['idpaciente'];

       	//var_dump($fechareserva);
    	//var_dump($idnumeroconsultorio);

    	
    	$sql="
          	select *
			from horario
			where id not in 
							(select h.id
							from horario h
							join reserva r on r.idhorario = h.id  
							where   r.idnumeroconsultorio ='".$idnumeroconsultorio."' and 
									r.fechareserva = '".$fechareserva."' and 
									r.idestadoreserva != 3 )

								
          ";


          $connection = Yii::app()->db;
          $command=$connection->createCommand($sql);
          $resultados=$command->queryall();

          echo CHtml::tag('option', array('value' => ''),'Seleccione', true);

			foreach ($resultados as $resultado) {
			    echo CHtml::tag('option',array('value'=>$resultado['id']),CHtml::encode($resultado['descripcion']), true );
			}*/
			
       }

       public function actionCambiarvalorconsultorio()
       {	

          	 // session_start();
  
    	   //  $_SESSION["valoridconsultorio"] = $_POST['id'];
    	      //  $session->close();   
              // destroys all data registered to a session   
              // $session->destroy(); 

       }
      
}
