<?php

class PagoController extends Controller
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
				'actions'=>array('create', 'create_pago_doctor','admin_pagos_doctor','registrarpagodoctor','update','registrarpago','error', 'lista', 'filtrarLista', 'lista_doctor', 'filtrarLista_doctor'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','administrador'),
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
		$model=new Pago;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreate_pago_doctor()
	{
		$model=new Pago;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_pago_doctor',array(
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pago']))
		{
			$model->attributes=$_POST['Pago'];
			$model->fechahoraregistro = date('Y-m-d  H:i:s');

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
		$dataProvider=new CActiveDataProvider('Pago');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pago('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pago']))
			$model->attributes=$_GET['Pago'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionAdmin_pagos_doctor()
	{

		$model=new Pago('search');
		$model->unsetAttributes();  

		$criteria = new CDbCriteria();
            $criteria->condition = 'idnumeroconsultorio = 2';// clear any default values
		if(isset($_GET['Pago']))
			
			$model->attributes=$_GET['Pago'];

		$this->render('admin_pagos_doctor',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pago the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pago::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pago $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pago-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionRegistrarpago()
    {
		$model = new Pago;

		if(isset($_POST['Pago']))
		{
			//verificar
			$model->attributes = $_POST['Pago'];

						
			// if(count($lista) > 0)
			// {
			// 	$this->redirect('index.php?r=pagos/error');	
			// }
			if(0 > 0)
			{}
			else
			{
				$model->fechahoraregistro = date('Y-m-d  H:i:s');

				$model->saldo = round($model->costo-$model->acuenta, 1);
				
				if($model->save())
				{
					$modelseguimiento = new Seguimientopaciente;

					$modelseguimiento->idpaciente = $model->idpaciente;
					$modelseguimiento->idactividad = 3;//registro de pago
					$modelseguimiento->fechahoraregistro = date('Y-m-d  H:i:s');
					$modelseguimiento->idusuariogestion = Yii::app()->user->id;

					if($modelseguimiento->save())
					{
						$this->redirect('index.php?r=pago/admin');	
					}
				}	
			}
		}

		$this->render('createpago',array(
			'model'=>$model,
		));
	}
   public function actionRegistrarpagodoctor()
    {
		$model = new Pago;

		if(isset($_POST['Pago']))
		{
			//verificar
			$model->attributes = $_POST['Pago'];

						
			// if(count($lista) > 0)
			// {
			// 	$this->redirect('index.php?r=pagos/error');	
			// }
			if(0 > 0)
			{}
			else
			{
				$model->fechahoraregistro = date('Y-m-d  H:i:s');

				$model->saldo = round($model->costo-$model->acuenta, 1);
				
				if($model->save())
				{
					$modelseguimiento = new Seguimientopaciente;

					$modelseguimiento->idpaciente = $model->idpaciente;
					$modelseguimiento->idactividad = 3;//registro de pago
					$modelseguimiento->fechahoraregistro = date('Y-m-d  H:i:s');
					$modelseguimiento->idusuariogestion = Yii::app()->user->id;

					if($modelseguimiento->save())
					{
						$this->redirect('index.php?r=pago/admin_pagos_doctor');	
					}
				}	
			}
		}

		$this->render('create_pago_doctor',array(
			'model'=>$model,
		));
	}


	public function actionError()
	{
		$this->render('error');	
	}


	public function actionLista()
	{
		$this->render('lista');
	}

	public function actionFiltrarlista()
	{
		if (isset($_GET['idpaciente'])) 
		{
			
            $criteria = new CDbCriteria();
		    $criteria->condition = "idpaciente = ".$_GET['idpaciente'];

		    $criteria->order = 'id desc';
	        $model = new CActiveDataProvider(Pago::model(), array('pagination' => array('pageSize' => 50),
	        	'criteria'=>$criteria));
           
            $this->layout='//layouts/tabla';    
            $this->render('listafiltrada', array('modelpagos'=>$model));
			
		}
		
	}
	public function actionLista_doctor()
	{
		$this->render('lista_doctor');
	}

	public function actionFiltrarlista_doctor()
	{
		if (isset($_GET['idpaciente'])) 
		{
			$criteria = new CDbCriteria();
		    $criteria->condition = "idpaciente = ".$_GET['idpaciente'];
		    $criteria->addCondition('idnumeroconsultorio = 2');
		    $criteria->order = 'id desc';
	        $model = new CActiveDataProvider(Pago::model(), array('pagination' => array('pageSize' => 50),
	        	'criteria'=>$criteria));
           
            $this->layout='//layouts/tabla';    
            $this->render('listafiltrada_doctor', array('modelpagos_doctor'=>$model));
			
		}
		
	}
}
