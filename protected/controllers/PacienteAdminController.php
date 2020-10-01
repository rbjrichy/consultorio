<?php

class PacienteAdminController extends Controller
{
	public function actionEditPerfil()
	{
		$this->render('editPerfil');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSubirFoto()
	{
		$this->render('subirFoto');
	}

	public function actionHistorialEconomico()
	{
		$this->render('historialEconomico');
	}

	public function actionHistorialClinico()
	{
		$this->render('historialClinico');
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