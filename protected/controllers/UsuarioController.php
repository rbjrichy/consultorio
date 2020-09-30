<?php

class UsuarioController extends Controller
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

            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('registrar'),
                'users'   => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('update'),
                'users'   => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users'   => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'registraradmin', 'create_adminsecretaria', 'registraradminsecretaria', 'admin_secretaria'),
                'users'   => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users'   => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionRegistrar()
    {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes      = $_POST['Usuario'];
            $model->fecharegistro   = date('Y-m-d  H:i:s');
            $model->nombres         = strtoupper($model->nombres);
            $model->apellidopaterno = strtoupper($model->apellidopaterno);
            $model->apellidomaterno = strtoupper($model->apellidomaterno);
            $model->clave           = md5($model->clave);

            //var_dump($model);

            if ($model->save()) {
                $this->redirect('index.php?r=usuario/admin');
            }

        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionRegistraradmin()
    {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes      = $_POST['Usuario'];
            $model->fecharegistro   = date('Y-m-d  H:i:s');
            $model->nombres         = strtoupper($model->nombres);
            $model->apellidopaterno = strtoupper($model->apellidopaterno);
            $model->apellidomaterno = strtoupper($model->apellidomaterno);
            $model->clave           = md5($model->clave);

            //var_dump($model);

            if ($model->save()) {
                $this->redirect('index.php?r=usuario/admin');
            }

        }

        $this->render('createadmin', array(
            'model' => $model,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            $model->clave      = md5($model->clave);
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }

        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
    /*public function actionCreate_adminsecretaria()
    {
    $model=new Usuario;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Usuario']))
    {
    $model->attributes=$_POST['Usuario'];
    $model->clave = md5($model->clave);
    if($model->save())
    $this->redirect(array('view','id'=>$model->id));
    }

    $this->render('create_adminsecretaria',array(
    'model'=>$model,
    ));
    }*/

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            $model->clave      = md5($model->clave);
            if ($model->save())
            //$this->redirect(array('view','id'=>$model->id));
            {
                $this->redirect(array('admin'));
            }

        }

        $this->render('update', array(
            'model' => $model,
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
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Usuario');
        // print_r($dataProvider);
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        // $url   = Url::to();
        $model = new Usuario('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Usuario'])) {
            $model->attributes = $_GET['Usuario'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function actionAdmin_secretaria()
    {
        $model = new Usuario('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Usuario'])) {
            $model->attributes = $_GET['Usuario'];
        }

        $this->render('admin_secretaria', array(
            'model' => $model,
        ));
    }

    public function actionRegistraradminsecretaria()
    {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Usuario'])) {
            $model->attributes      = $_POST['Usuario'];
            $model->fecharegistro   = date('Y-m-d  H:i:s');
            $model->nombres         = strtoupper($model->nombres);
            $model->apellidopaterno = strtoupper($model->apellidopaterno);
            $model->apellidomaterno = strtoupper($model->apellidomaterno);
            $model->clave           = md5($model->clave);

            //var_dump($model);

            if ($model->save()) {
                $this->redirect('index.php?r=usuario/registraradminsecretaria');
            }

        }

        $this->render('create_adminsecretaria', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Usuario the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Usuario::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Usuario $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
