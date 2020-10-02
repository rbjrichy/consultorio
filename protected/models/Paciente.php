<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $id
 * @property integer $idusuario
 * @property integer $edad
 * @property string $fechanacimiento
 * @property string $fechahoraregistro
 * @property string $observaciones
 */
class Paciente extends CActiveRecord
{

	public $nombres;
	public $apellidopaterno;
	public $direccion;
	public $numerocelular;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idusuario, edad, fechanacimiento', 'required'),
			array('idusuario, edad', 'numerical', 'integerOnly'=>true),
			array('observaciones', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,idusuario,nombres, apellidopaterno,direccion,numerocelular, edad, fechanacimiento, fechahoraregistro, observaciones', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuario'=> array(self::BELONGS_TO,'Usuario','idusuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID', // AQUIIIIII
			'paciente.usuario.nombres'=> 'Nombres',
			'paciente.usuario.apellidopaterno' => 'Apellido Paterno',
			'paciente.usuario.direccion' => 'Direccion',
			'paciente.usuario.numerocelular' => 'Celular',	

			'edad' => 'Edad',
			'fechanacimiento' => 'Fecha de Nacimiento',
			'fechahoraregistro' => 'Fechahoraregistro',
			'observaciones' => 'Observaciones',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->join = 'JOIN usuario gi ON gi.id = t.idusuario';

		//para que se puede buscar por aproximidad en el search del view admin
		$criteria->addSearchCondition('nombres','%'.$this->nombres.'%',false, 'AND','LIKE');
		$criteria->addSearchCondition('apellidopaterno','%'.$this->apellidopaterno.'%',false, 'AND','LIKE');
		$criteria->addSearchCondition('direccion','%'.$this->direccion.'%',false, 'AND','LIKE');
		$criteria->addSearchCondition('numerocelular','%'.$this->numerocelular.'%',false, 'AND','LIKE');


		$criteria->compare('idusuario',$this->idusuario);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('fechanacimiento',$this->fechanacimiento,true);
		$criteria->compare('fechahoraregistro',$this->fechahoraregistro,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		

		$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paciente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
