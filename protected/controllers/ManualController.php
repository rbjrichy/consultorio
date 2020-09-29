<?php

class ManualController extends Controller
{
    
    	public $layout='//layouts/column1';
        
	public function actionIndex()
	{
            $this->layout='//layouts/consulta2';	
            //$this->render('index');

            $this->redirect(Yii::app()->request->baseUrl.'/pdf/manual.pdf');
	}
        
        
}

?>