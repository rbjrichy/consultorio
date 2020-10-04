<?php

/**
 * This is the model class for table "reserva".
 *
 * The followings are the available columns in table 'reserva':
 * @property integer $id
 * @property integer $idpaciente
  * @property integer $idnumeroconsultorio
 * @property integer $idhorario
 * @property string $fechareserva
 * @property string $fechahoraregistro
 */
class Reserva extends CActiveRecord
{	
	public $nombrecompleto;
	public $Numeroconsultorio;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpaciente, idnumeroconsultorio, idhorario, fechareserva, fechahoraregistro, motivo, idestadoreserva', 'required'),
			array('idpaciente, idnumeroconsultorio, idhorario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idpaciente, nombrecompleto, numeroconsultorio, idhorario, fechareserva, fechahoraregistro, motivo, idestadoreserva, numeroconsultorio.descripcion,estadoreserva.descripcion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Reserva Id',
			'idpaciente' => 'Paciente Id',
			'paciente.usuario.nombrecompleto' =>'Nombre Completo',
			'numeroconsultorio.descripcion'=> 'Consultorio',
			'horario.descripcion' => 'Horario',
			'estadoreserva' =>'Estado Reserva',
			'fechareserva' => 'Fecha Reserva',
			'fechahoraregistro' => 'Fecha/Hora Registro',
			'horario.descripcion' => 'Horario',
			'paciente.usuario.nombrecompleto' => 'Paciente',
			'numeroconsultorio.descripcion' => 'Consultorio',
			'motivo' => 'Motivo Consulta',
			'estadoreserva.descripcion' => 'Estado',
			'idestadoreserva' => 'Estado',
		);
	}

	 
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'paciente'=> array(self::BELONGS_TO,'Paciente','idpaciente'),
			'horario'=> array(self::BELONGS_TO,'Horario','idhorario'),
			'estadoreserva'=> array(self::BELONGS_TO,'Estadoreserva','idestadoreserva'),
			'numeroconsultorio'=> array(self::BELONGS_TO,'Numeroconsultorio','idnumeroconsultorio'),
			

		);
	}
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		// $where = "";
		// si es tu modelo, asignas el GET a los atributos en lugar de
		// recoger directamente el campo y listo.
		// if(isset($_GET['nombre del dato por el que filtras']))
		// {
		//     $where.="AND UPPER(nombreTabla.campo) LIKE '%".strtoupper($_GET['nombre del dato por el que filtras'])."%'";
		// }
		// var_dump($_GET);
		// Yii::app()->end();

		$criteria=new CDbCriteria;


		// $criteria->join = 'JOIN paciente p ON p.id = t.idpaciente';
		// $criteria->join = 'JOIN usuario u ON u.id = p.idusuario';

		//para que se puede buscar por aproximidad en el search del view admin
		$criteria->addSearchCondition('nombrecompleto','%'.$this->nombrecompleto.'%',true, 'AND','LIKE');
		$criteria->addSearchCondition('numeroconsultorio','%'.$this->numeroconsultorio.'%',false, 'AND','LIKE');

		$criteria->compare('id',$this->id);
		$criteria->compare('idpaciente',$this->idpaciente);

		$criteria->compare('idnumeroconsultorio',$this->idnumeroconsultorio);
		$criteria->compare('idhorario',$this->idhorario);

		$criteria->compare('idnumeroconsultorio',$this->idnumeroconsultorio);
		$criteria->compare('idhorario',$this->idhorario);
	
		$criteria->compare('fechareserva',$this->fechareserva,true);
		$criteria->compare('fechahoraregistro',$this->fechahoraregistro,true);

		$criteria->compare('motivo',$this->motivo,true);
		// $criteria->compare('estadoreserva.descripcion',$this->estadoreserva->descripcion,true);
		$criteria->order = 'idnumeroconsultorio, fechareserva, idhorario';

		$criteria->compare('idestadoreserva',$this->idestadoreserva);

		$criteria->condition = 'fechareserva >= "'. date('y-m-d').'"';		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reserva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
