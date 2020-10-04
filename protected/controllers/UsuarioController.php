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
                'actions' => array('index', 'view', 'registroExterno'),
                'users'   => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'registraradmin', 'create_adminsecretaria', 'registraradminsecretaria', 'admin_secretaria', 'cambiarPassword', 'ChangePassword', 'capturarfoto'),
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
            $model->avatar      = $_POST['Usuario']['avatar'];
                // var_dump($model->attributes);
                // Yii::app()->end();
            if ($model->save()) {
                //crear paciente automaticamente
                $this->registroAutomaticoPaciente($model);

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

    public function actionRegistroExterno()
    {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        // var_dump($_POST);
        // Yii::app()->end();

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            $model->clave      = md5($model->clave);
            // var_dump($_POST);
            // Yii::app()->end();
            // se esta harcodeando, lo recomendable es obtener los datos segun se requiera con consultas
            $model->ci = '0';
            $model->idsexo = '1';
            $model->idocupacion = '3';
            $model->idciudad = '1';
            $model->numerotelefono = '0';
            $model->fecharegistro = date('Y-m-d H:i:s');
            $model->idtipousuario = '4';
            // $model->idpaciente = '0'; //no corresponde error en el diseño de la bd

            if ($model->save()) {
            //Si se guarda exitosamente se crea un registro paciente, luego se manda a login
                $this->registroAutomaticoPaciente($model);
                Yii::app()->user->setFlash('success', "Usuario creado correctamente!");
                $this->redirect(array('site/login'));
            }

        }

        $this->render('registroExterno', array(
            'model' => $model,
        ));
    }

    private function registroAutomaticoPaciente($model)
    {
        $modelPaciente = new Paciente;
        $modelPaciente->idusuario = $model->id;
        $modelPaciente->edad = '0';
        $modelPaciente->fechanacimiento = '1980-01-01';
        $modelPaciente->fechahoraregistro = date('Y-m-d H:i:s');
        $modelPaciente->save();
    }

    public function actionCambiarPassword()
    {
        $passwordForm = new PasswordForm;
        if (isset($_POST['PasswordForm'])){
            $passwordForm->setScenario('changePwd');
            $passwordForm->old_password = $_POST["PasswordForm"]['old_password'];
            $passwordForm->new_password = $_POST["PasswordForm"]['new_password'];
            $passwordForm->repeat_password = $_POST["PasswordForm"]['repeat_password'];
            if($passwordForm->validate())
            {
                $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
                $usuario->clave = md5($passwordForm->new_password);
                if ($usuario->save()) 
                {
                    Yii::app()->user->setFlash('success', 'Password actualizado');
                }  
                else
                {
                    Yii::app()->user->setFlash('error', 'Error al actualizar el password');
                }
            }
            else
            {
                Yii::app()->user->setFlash('error', 'Datos incorrectos');
            }
        }
        $this->redirect(['pacienteAdmin/index']); 
    }

     public function actioncapturarfoto()
     {
        $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
        if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
        //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
        //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
        //todo el contenido lo guardamos en un archivo
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
        //Calcular un nombre único
        $nombreImagenGuardada = "foto_" . uniqid() . ".png";
        //Escribir el archivo
        $ruta = Yii::getPathOfAlias('webroot').'/images/avatar/';
        file_put_contents($ruta.$nombreImagenGuardada, $imagenDecodificada);
        //Terminar y regresar el nombre de la foto
        exit($nombreImagenGuardada);
     }
}
