<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Informe extends CFormModel
{
	public $idtiporeporte;
	public $idformatoreporte;
	public $titulo;

	public $fechainicio;
	public $fechafin;

	public $idpaciente;
	
	    
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('idtiporeporte, idformatoreporte, titulo, fechainicio, fechafin', 'required'),
			
			//array('fechadesde', 'match' ,'pattern'=>'/^[0-9]+$/u','message'=> 'Fecha Desde solo admite números y guión(-)'),
			//array('fechahasta', 'match' ,'pattern'=>'/^[0-9]+$/u','message'=> 'Fecha Hasta solo admite números y guión(-)'),

			//array('webid', 'match' ,'pattern'=>'/^[a-z0-9]+$/u','message'=> 'WebID solo admite números y minúsculas'),
			
			array('idtiporeporte, idformatoreporte, idpaciente', 
				'numerical', 'integerOnly'=>true),			

			array('idtiporeporte, idformatoreporte, titulo, fechainicio, fechafin, 
				idpaciente', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'fechainicio' => 'Fecha Inicio',
			'fechafin' => 'Fecha Fin',
			'idtiporeporte' => 'Tipo Reporte',
			'idpaciente' => 'Paciente',
			'idformatoreporte' => 'Formato Reporte',
			'titulo' => 'Titulo del Reporte',
			
		);
	}
}
