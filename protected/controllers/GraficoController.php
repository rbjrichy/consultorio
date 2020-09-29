<?php

class GraficoController extends Controller
{
    
    	public $layout='//layouts/column1';
        
	public function actionIndex()
	{
            $this->layout='//layouts/informes';	
            $this->render('index');
	}
        
        
}

?>